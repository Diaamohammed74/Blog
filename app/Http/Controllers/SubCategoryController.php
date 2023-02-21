<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        //
    }
    public function show($id){
        //
    }
    public function create(){
        $categories=Category::paginate();
        return view('admin.sub_category.sub_category-create',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'sub_name'=>'required|min:3|max:10',
            'category'=>'required'
        ]);
        SubCategory::create([
            'name'=>$request->sub_name,
            'category_id'=>$request->category
        ]);
        return back()->with('success','Sub Category Added Successfuly');
    }
    public function edit($id){
        //
    }
    public function update(Request $request,$id){
        //
    }
    public function destroy($id){
        //
    }
}
