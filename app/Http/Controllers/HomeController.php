<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Book;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {

                $data = Food::all();

                return view('home.index', compact('data'));
            } else {
                return view('admin.index');
            }
        }
    }


    public function my_home()
    {
        $data = Food::all();
        return view('home.index', compact('data'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $food = Food::find($id);

            $cart_title = $food->title;
            $cart_details = $food->details;
            $cart_image = $food->image;
            $cart_price = Str::remove('$', $food->price);

            $data = new Cart;
            $data->title = $cart_title;
            $data->details = $cart_details;
            $data->price = $cart_price * $request->qty;
            $data->image = $cart_image;
            $data->quantity = $request->qty;
            $data->userid = Auth::user()->id;

            $data->save();

            return redirect()->back();
        } else {
            return redirect("login");
        }
    }

    public function my_cart()
    {
        $user_id = Auth::user()->id;

        $data = Cart::Where('userid', '=', $user_id)->get();

        return view('home.my_cart', compact('data'));
    }

    public function remove_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $user_id = Auth::user()->id;

        $cart = Cart::Where('userid', '=', $user_id)->get();

        foreach ($cart as $cart) {
            $order = new Order;

            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;

            $order->title = $cart->title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;

            $order->image = $cart->image;

            $order->save();

            $data = Cart::find($cart->id);

            $data->delete();
        }

        return redirect()->back();
    }

    public function book_table(Request $request)
    {
        $book = new Book;

        $book->phone = $request->phone;
        $book->guest = $request->n_guest;
        $book->date = $request->date;
        $book->time = $request->time;

        $book->save();

        return redirect()->back();
    }
}
