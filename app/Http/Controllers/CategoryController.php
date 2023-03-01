<?php

namespace App\Http\Controllers;

use App\Models\Category;
// use App\Models\SubCategory;
use Illuminate\Http\Request;
// use App\Repository\CategoryRepository;
use Illuminate\Support\Facades\DB;
use App\Repository\CategoryInterface;
use App\Repository\CategoryIntreface;
// use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('name','asc')->withCount('subcategory')->paginate(5);
        // dd($categories);
        return view('admin.categories.categories-index',compact('categories'));
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





    //api


    // private CategoryInterface $categoryRepository;

    // public function __construct(CategoryInterface $categoryRepository) 
    // {
    //     $this->categoryRepository = $categoryRepository;
    // }
    // public function index(){
    //     return response()->json(['data'=>$this->categoryRepository->index(),'status'=>200]);
    // }

    // public function show($id){
    //     $category=Category::findOrFail($id);
    //     return response()->json(['data'=>$category,'status'=>'200']);
    // }
    // public function store(Request $request){
    // Category::create($request->all());
    // return response()->json(['status'=>'200','message'=>'Category Created']);
    // }
    // public function delete($id){

    //     $category=Category::findOrFail($id);
    //     $category->delete();
    //     return response()->json(['status'=>'201','message'=>'Category deleted']);
    // }
    // public function update($id,Request $request){
    //     DB::table('categories')
    //     ->where('id','=',$id)
    //     ->update([
    //         'name'=>$request->name
    //     ]);
    // return response()->json(['status'=>'200','message'=>'Category updated']);   
    // }

}