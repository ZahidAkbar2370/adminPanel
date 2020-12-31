<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index()
    {
    	return view('admin_login');
    }
    public function show_dashboard()
    {
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
    	$admin_email=$request->input('admin_email');
    	$admin_password=$request->input('admin_password');

    	$result=DB::select("SELECT * from tbl_admin WHERE admin_email='$admin_email' and admin_password='$admin_password'");
    	// $result=DB::table('tbl_admin')
    	// 				->where('admin_email',$admin_email)
    	// 				->where('admin_password',$admin_password)
    	// 				->first();
    	// 				Exit();
    	if($result)
    	{
    		// Session::put('admin_name',$result->admin_name);
    		// Session::put('admin_id',$result->admin_id);
    		return redirect('/dashboard');
    	}
    	else
    	{
    		// Session::put('message','Email or Password Invalid');
    		return redirect('/admin');
    	}

    }
}

