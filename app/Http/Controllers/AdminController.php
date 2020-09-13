<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index(){
        
        return view('admin.login');
    }
    public function login(){
        if($_POST['username'] == 'admin' && $_POST['password'] == '123456'){
            \Session::put('admin','Admin');
        }else{
            return redirect()->back()->with('message','Invalid username or password !');
        }
        return redirect('admin');
    }
    
    public function logout(){
    \Session::forget('admin');
    return redirect('admin/login');
    }
    
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function owners()
    {
    	$title = 'Owners';
    	$category = 'owners';
    	$users = User::whereIn('role', ['owner','broker'])->get();
    	return view('admin.users.index',compact('users','title','category'));
    }

    public function ownersbystatus($status)
    {
    	$title = 'Owners/'.$status;
    	$category = 'owners';
    	$users = User::where('status',$status)->whereIn('role', ['owner','broker'])->get();
    	return view('admin.users.index',compact('users','title','category'));
    }

    public function ownerdetails($id)
    {
    	$title = 'Owner';
    	$category = 'owners';
    	$user = User::where('id',$id)->first();
    	return view('admin.users.show',compact('user','title','category'));
    }

    public function users()
    {
    	$title = 'Users';
    	$category = 'users';
    	$users = User::where('role','user')->get();
    	return view('admin.users.index',compact('users','title','category'));
    }

    public function usersbystatus($status)
    {
    	$title = 'Users/'.$status;
    	$category = 'users';
    	$users = User::where('status',$status)->where('role','user')->get();
    	return view('admin.users.index',compact('users','title','category'));
    }

    public function userdetails()
    {
    	$title = 'User';
    	$user = User::where('id',$id)->first();
    	$category = 'owners';
    	return view('admin.users.show','title','category');
    }


}
