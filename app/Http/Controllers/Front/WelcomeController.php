<?php


namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Auth;

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
$product=Product::get()->last();
        return view('front.frontInterface.about',compact('product'));
    }

    public function shop(){
        $products=Product::paginate(3);
        $categories = Category::all();

        return view('front.frontInterface.shop',compact('products','categories'));
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

    public function user_profile(){
        return view('front.frontInterface.user_profile');
    }



    public function dashboard(){
        $user = Auth::User();
// dd($user);
        return view('layouts.test',compact('user'));
    }

}
