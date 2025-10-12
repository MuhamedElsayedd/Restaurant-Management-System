<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.food');
    }

    public function add_food()
    {
        return view('admin.add_food');
    }

    public function upload_food(Request $request)
    {
        // Here We just saved The data "Without Validation"
        $data = new Food;

        $data->title = $request->title;
        $data->details = $request->details;
        $data->price = $request->price;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('food_img'), $filename);
            $data->image = $filename;
        } else {
            $data->image = null;
        }

        $data->save();

        return redirect()->back()->with('status-message', 'New Dish Added Successfully');
    }

    public function view_food()
    {
        $data = Food::all();
        return view('admin.show_food', compact('data'));
    }
    public function delete_food($id)
    {
        $data = Food::find($id);

        $data->delete();

        return redirect()->back()->with('status-message', 'Food Deleted Successfully');
    }

    public function update_food($id)
    {
        $food = Food::find($id);

        return view('admin.update_food', compact('food'));
    }

    public function edit_food(Request $request, $id)
    {
        $data = Food::find($id);

        $data->title = $request->title;
        $data->details = $request->details;
        $data->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('food_img', $filename);
            $data->image = $filename;
        }

        $data->save();

        return redirect('view_food');
    }

    public function orders()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }


    public function on_the_way($id)
    {
        $data = Order::find($id);
        $data->delivery_status = "On The Way";

        $data->save();

        return redirect()->back();
    }

    public function deliver_order($id)
    {
        $data = Order::find($id);
        $data->delivery_status = "Delivered";

        $data->save();

        return redirect()->back();
    }

    public function cancel_order($id)
    {
        $data = Order::find($id);
        $data->delivery_status = "Canceled";

        $data->save();

        return redirect()->back();
    }


    public function reservations()
    {
        $reservations = Book::all();
        return view('admin.reservation', compact('reservations'));
    }
}
