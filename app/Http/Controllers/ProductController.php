<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show_product_user(Request $request){
        $select_category = $request->category;
        $product = Product::inRandomOrder()->limit(9)->get();
        $category = Category::all();
        
        return view('product', compact('product', 'category', 'select_category'));
    }

    public function select_category(Request $request){
        $select_category = $request->category;
        $category = Category::all();

        if($select_category == 0){
            $product = Product::inRandomOrder()->limit(9)->get();
        }
        else{
            $product = Product::whereHas('category', function($query) use ($select_category){
                $query->where('id', $select_category);
            })->get();
        }
       
        return view('product', compact('product', 'category', 'select_category'));
    }

    public function view_product($id){
        $product = Product::find($id);

        return view('view_product', compact('product'));
    }
}
