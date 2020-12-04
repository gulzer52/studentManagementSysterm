<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Session;

class AdminController extends Controller
{
    public function login(){
    	return view('adminlogin');
    }

    public function adminloged(Request $request){
    	$admin = admin::where('username',$request->username)->where('password',$request->password)->get()->toArray();
    	if ($admin) {
    		$request->Session()->put('admin_session',$admin[0]['id']);
    		return redirect('dashboard/');
    	}else{
    		Session::flash('coc','Email and password not match');
    		return redirect('/login/')->withInput();
    	}
    }

    public function dashboard(){
        return view('dashboard');
    }
}
