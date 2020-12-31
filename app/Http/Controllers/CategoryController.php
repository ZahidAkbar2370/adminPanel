<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
    	return view('admin.add_category');
    }
    public function all_category()
    {
    	$category=DB::Select('SELECT * from tbl_category');
    	return view('admin.all_category')->with('all_categorys',$category);
    }
    public function save_category(Request $request)
    {
    	$category_name=$request->input('category_name');
    	$category_description=$request->input('category_description');
    	$publication_status=$request->input('publication_status');

    	$result=DB::insert("INSERT into tbl_category values(?,?,?,?,?,?)",[null,$category_name,$category_description,$publication_status,null,null]);

    	if($result)
    	{
    		return redirect('/all-category');
    	}
    	else
    	{

    		return view('/all-category');
    	}
    }
    public function delete_category($id)
    {
    	$delete=DB::Delete("DELETE From tbl_category WHERE category_id='$id'");

    	return redirect('/all-category');
    }
}
