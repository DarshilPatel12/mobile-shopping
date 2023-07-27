<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class AboutController extends Controller
{
    public function show_about(){
        $about = About::all();
        return view('about', compact('about'));
    }
}
