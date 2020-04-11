<?php

namespace App\Http\Controllers;

use App\Orders;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth::user();
        $orders = auth::user()->orders()->orderBy('created_at', 'desc')->get();

        if (Auth::user()->role == 0) {
            return view('home')
                ->with('orders', $orders);
        } elseif (Auth::user()->role == 1) {
           return redirect('/supplier');
        }elseif (Auth::user()->role == 10) {
            return redirect('/admin');
        }

    }
}
