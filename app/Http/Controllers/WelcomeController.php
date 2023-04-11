<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\welcome;
use App\Models\Product;
use App\Models\Category;
class WelcomeController extends Controller
{
    public function index(){

        $products=Product::all();
        $category = Category::all();
        $img=Product::get()->first();


        // dd($products);
        return view('welcome',compact('products','img', 'category' ));

    }

    public function contact(){
        return view('e-comerce.contact');
    }
    public function about(){
        return view('e-comerce.about');
    }

    public function shop(){
        return view('e-comerce.shop');
    }
    public function home(){
        return view('home');
    }
}
