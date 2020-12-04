<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use App\course;
use App\branch;

class StudentController extends Controller
{
    public function create(){
        $courses = course::all();
        $branches = branch::all();
    	return view('studentregister',compact(['courses','branches']));
    }

    public function store(Request $request){
    	$students = new student;
    	$students->sname = $request->sname;
    	$students->fname = $request->fname;
    	$students->class = $request->class;
    	$students->phone = $request->phone;
    	$students->email = $request->email;
        $students->course_id = $request->course_id;
        $students->branch_id = $request->branch_id;
        $students->image = $request->file('image')->getClientOriginalName();
    	$students->save();
        $request->image->move(public_path('images'),$students->image);
    	return redirect('/studentregister');
    }

    public function show(){
    	$students = student::paginate(5);
    	return view('studendetails',compact('students'));
    }

    public function ajax_show(Request $request){
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $search = $request->get('search');
            $search = str_replace(" ", "%", $search);
            $students = student::where('sname','like','%'.$search.'%')
                        ->orwhere('fname','like','%'.search.'%')
                        ->order_by($sort_by, $sort_type)
                        ->paginate(3);
            return view('studentdetails_ajax',compact('students'));
        }
    }

    public function edit($id){
    	$students = student::find($id);
    	return view('studentedit',compact('students'));
    }

    public function update(Request $request, $id){
    	$student = student::find($id);
    	$student->sname = $request->sname;
    	$student->fname = $request->fname;
    	$student->class = $request->class;
    	$student->phone = $request->phone;
    	$student->email = $request->email;
    	$student->save();
    	return redirect('/studentdetails');
    }

    public function delete($id){
    	$student = student::find($id)->delete();
    	return redirect('/studentdetails');
    }

    public function courses(Request $request){
        $id = $request->id;
        $data['courses'] = course::where('branch_id',$id)->get();
        echo json_encode($data);
    }
}
