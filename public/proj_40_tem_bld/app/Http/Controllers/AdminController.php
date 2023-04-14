<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('Layouts.master');
    }
    public function dashboard(){
        return view('Layouts.dashboard');
    }
}
