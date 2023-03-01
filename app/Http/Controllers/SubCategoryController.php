<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategories=SubCategory::with('category','article')->paginate(5);
        // dd($subcategories);
        // $articles=Article::with('subcategory')->get();
        return view('admin.sub_category.sub_category-index',compact('subcategories'));
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
        $subcategory=SubCategory::findOrFail($id);
        $categories=Category::all();
        
        return view('admin.sub_category.sub_category-edit',compact('subcategory','categories'));
    }
    public function update(Request $request){
        $request->validate([
            'sub_name'=>'required|min:3|max:10',
            'category'=>'required'
        ]);
        $subcategory=SubCategory::find($request->id);
        $subcategory->update([
            'name'=>$request->sub_name,
            'category_id'=>$request->category
        ]);
        return redirect('admin/categories/sub_categories')->with('success','SubCateory updated Successfuly');
    }
    public function destroy($id){
        $subcategory=SubCategory::findOrFail($id);
        $subcategory->delete();
        return back()->with('deleted',"Sub Category $subcategory->name Deletd Successfuly");
    }
}
