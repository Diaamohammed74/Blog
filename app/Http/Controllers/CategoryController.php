<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::orderBy('name','asc')->get();
        return view('admin.categories.categories-index',compact('category'));
    }

    public function create()
    {
        return view('admin.categories.categories-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>"required|max:15|min:3|unique:categories,name"
        ]);
        $category=Category::create($request->except(['_token']));
        return back()->with("success"," $category->name Category Added Successfully");
    }

    public function show(Category $category)
    {
        //
    }



    public function edit(Request $request,$id)
    {

        $category = Category::find($id);

            return view('admin.categories.categories-edit',compact('category'));


    }

    public function update($id,Request $request)
    {
        // $category = Category::find($request->id);
        // $category->update($request->name);
        $request->validate([
            'name'=>"required|max:15|min:3|unique:categories,name"
        ]);
        DB::table('categories')
        ->where('id','=',$id)
        ->update([
            'name'=>$request->name
        ]);
                return redirect('admin/categories')->with('success','Category updated Successfuly');

    }
    public function destroy($id)
    {
        $category= Category::find($id);
        $category->delete();
        return back()->with("deleted","$category->name Category Deleted Successfully");
    }
}