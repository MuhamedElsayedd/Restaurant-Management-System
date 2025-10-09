<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;


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
            echo "This is Your Cart";
        } else {
            return redirect("login");
        }
    }
}
