<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\welcome;
use App\Models\Product;
class WelcomeController extends Controller
{
    public function index(){

        $products=Product::all();

        // dd($products);
        return view('welcome',compact('products'));

    }

    public function contact(){
        return view('e-comerce.contact');
    }
    public function about(){
        return view('e-comerce.about');
    }


}
