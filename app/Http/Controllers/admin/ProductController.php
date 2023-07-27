<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function show_product(){
        $products = Product::with('category')->paginate(10);
        
        return view('admin.product', compact('products'));
    }

    public function add_form(){
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function add_product(Request $request){
        $data = new Product;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('images', $imagename);
        $data->image = $imagename;
        
        $data->category_id=$request->category;
        $data->name=$request->name;
        $data->storage=$request->storage;
        $data->ram=$request->ram;
        $data->processor=$request->processor;
        $data->launch_date=$request->launch_date;
        $data->price=$request->price;
        $data->save();

        Alert::success('Product Added Successfully');
        return redirect()->back();
    }

    public function edit_form($id){
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit', compact('category','product'));
    }

    public function edit_product(Request $request, $id){
        $product = Product::find($id);

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images', $imagename);
            $product->image = $imagename;
        }

        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->storage = $request->storage;
        $product->ram = $request->ram;
        $product->processor = $request->processor;
        $product->launch_date = $request->launch_date;
        $product->price = $request->price;
        $product->save();

        Alert::success('Product Edit Successfully');
        return redirect()->back();
    }

    public function delete_product($id){
        $data = Product::find($id);
        $data->delete();

        Alert::warning('Product Remove Successfully');
        return redirect()->back();
    }
}
