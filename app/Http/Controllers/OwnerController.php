<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;
use Auth;

class OwnerController extends Controller
{
    public function login()
    {
    	return view('owner.login');
    }

    public function register()
    {
    	return view('owner.register');
    }

    public function dashboard()
    {
    	return view('owner.dashboard');
    }


}
