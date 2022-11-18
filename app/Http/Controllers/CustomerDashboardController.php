<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerDashboardController extends Controller
{
    private $orders;

    public function index()
    {
        $this->orders = Order::where('customer_id', Session::get('customer_id'))->orderBy('id', 'desc')->simplePaginate(2);
        // return view('customer.dashboard.home', ['orders' => $this->orders]);
        return view('customer.home.home', ['orders' => $this->orders]);
    }
}
