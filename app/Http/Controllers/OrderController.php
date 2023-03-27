<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
    $data=Order::all();
    return view('order.index',compact('data'));
}
}
