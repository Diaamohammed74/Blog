<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function loginrequest(Request $request)
    {
        if(Auth::attempt($request->except("_token"))){
            $users=User::all();
            $articles=Article::all();
            $categories=Category::all();
            // return view('admin.index',compact(['users','articles','categories']));
            return redirect('admin/home');
            
        }
        return redirect('login');
    }
    public function logout()
    {
        Auth::logout();
        return view("login");
    }

public function index(){
    
    $users=User::orderBy('created_at', 'desc')
    ->with(['articles'=>function($sort)
    {
        $sort->orderBy('created_at','desc'); // sorting articles 
    }])
    ->get();
    return view('admin.users.users-index',compact('users'));
}

public function show($id){
    $user=User::with('articles')->findOrFail($id);
    // dd($user);
    return view('admin.users.users-show',compact('user'));
    
}
public function create(){
    return view('admin.users.users-create');
}
public function store(Request $request){
    $request->validate([
        'name'=>'required|string|max:25|min:3',
        'email'=>'required|email|unique:users,email|max:25|min:3',
        'password'=>'required|min:8',
        'confirm_password'=>'required|same:password'
    ]);
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);
    return back()->with('success','User Added Successfuly');
}

public function edit($id){
    $user=User::findOrFail($id);
    return view('admin.users.users-edit',compact('user'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:25|min:3',
        'email' => 'required|email|max:25|min:3',
        'current_password' => 'required|confirmed',
        'password' => 'required|min:8'
    ]);
    
    if ($request->has('password') && $request->has('current_password'))
    {
        $user = User::findOrFail($id);
                    /*
                    param1->password that has been entered on the form
                    param2->old hashed password stored in DB
                    */
        if (Hash::check($request->current_password, $user->password)) {
            DB::table('users')->where('id', '=', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }
    }
    else
    {
        DB::table('users')->where('id', '=', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
    }
    return redirect('admin/users')->with('success', 'User data updated successfully.');

}


public function destroy($id){
    $user=User::findOrFail($id);
    $user->delete();
    return back()->with('deleted'," User : $user->name Deleted Successfuly");
}


}