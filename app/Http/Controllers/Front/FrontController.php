<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function master(){
        return view('frontend.layouts.master');
    }


    public function home(){
        return view('frontend.layouts.home');
    }
}
