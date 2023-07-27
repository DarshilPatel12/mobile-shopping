<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function show_category(){
        $category = Category::all();
        return view('admin.category', compact('category'));
    }

    public function add_form(){
        return view('admin.category.add');
    }

    public function add_category(Request $request){
        $data = new Category;
        $data->title=$request->title;
        $data->save();
        Alert::success('Category Added Successfully');
        return redirect()->back();
    }

    public function edit_form($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function edit_category(Request $request, $id){
        $category = Category::find($id);
        $category->title = $request->title;
        $category->save();
        Alert::success('Category Edit Successfully');
        return redirect()->back();
    }

    public function delete_category($id){
        $category = Category::find($id);
        $product = Product::where('category_id','=',$id);
        $product->delete();
        $category->delete();
        Alert::warning('Category Remove Successfully');
        return redirect()->back();
    }
}
