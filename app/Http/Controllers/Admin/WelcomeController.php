<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

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
        return view('frontend.e-comerce.contact');
    }
    public function about(){
        return view('frontend.e-comerce.about');
    }

    public function shop(){
        return view('frontend.e-comerce.shop');
    }

    public function shopsingle(){
        return view('frontend.e-comerce.shop-single');
    }
    public function checkout(){
        return view('frontend.e-comerce.checkout');
    }

    public function thankyou(){
        return view('frontend.e-comerce.thankyou');
    }

    public function cart(){
        return view('frontend.e-comerce.cart');
    }


}
