<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function show_home(){
        $home = Home::all();
        $product = Product::inRandomOrder()->limit(6)->get();
        return view('home', compact('product', 'home'));
    }
}
