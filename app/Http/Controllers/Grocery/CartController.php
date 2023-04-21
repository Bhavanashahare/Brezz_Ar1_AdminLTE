<?php

namespace App\Http\Controllers\grocery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Cart;
class CartController extends Controller
{
    	//Add to Wishlist
	public function addToWishlist($id){

		$res = array();
		$datalist = Product::where('id', $id)->first();

		$user = User::where('id', $datalist['user_id'])->first();

		$data = array();
		$data['id'] = $datalist['id'];
		$data['name'] = $datalist['title'];
		$data['qty'] = 1;
		$data['price'] = $datalist['sale_price'];


		$response = Cart::instance('wishlist')->add($data);
		if($response){
			$res['msgType'] = 'success';
			$res['msg'] = __('New Data Added Successfully');
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Added product to wishlist failed.');
		}

		return response()->json($res);
	}

}
