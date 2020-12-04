<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\branch;
use App\course;


class CourseController extends Controller
{
    public function create(){
    	$branches = branch::all();
    	return view('addcourse',compact('branches'));
    }

    public function store(Request $request){
    	$course = new course;
    	$course->branch_id = $request->branch_id;
    	$course->cname = $request->cname;
    	$course->save();
    	return redirect('addcourse');
    }

    public function show(){
    	$courses = course::select('branches.bfull','courses.cname')
    			->join('branches','courses.branch_id','branches.id')->get();
    	return view('showcourse',compact('courses'));
    }
}
