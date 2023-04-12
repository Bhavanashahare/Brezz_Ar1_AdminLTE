<?php


namespace App\Http\Controllers\Front;
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
        return view('front.frontInterface.contact');
    }
    public function about(){
        return view('front.frontInterface.about');
    }

    public function shop(){
        return view('front.frontInterface.shop');
    }

    public function shopsingle(){
        return view('front.frontInterface.shop-single');
    }
    public function checkout(){
        return view('front.frontInterface.checkout');
    }

    public function thankyou(){
        return view('front.frontInterface.thankyou');
    }

    public function cart(){
        return view('front.frontInterface.cart');
    }


}
