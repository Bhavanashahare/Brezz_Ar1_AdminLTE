<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
class ReviewController extends Controller
{
    public function index(){
        $data=Review::all();
        return view('review.index',compact('data'));
}
}
