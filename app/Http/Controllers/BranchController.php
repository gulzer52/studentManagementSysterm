<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\branch;

class BranchController extends Controller
{
    public function create(){
    	return view('addbranch');
    }

    public function store(Request $request){
    	$branch = new branch;
    	$branch->bsort = $request->bsort;
    	$branch->bfull = $request->bfull;
    	$branch->save();
    	return redirect('addbranch');
    }

    public function show(){
    	$branches = branch::all();
    	return view('viewbranch',compact('branches'));
    }

    public function edit($id){
    	$branches = branch::find($id);
    	return view('branchedit',compact('branches'));
    }

    public function update(Request $request, $id){
    	$branch = branch::find($id);
    	$branch->bsort = $request->bsort;
    	$branch->bfull = $request->bfull;
    	$branch->save();
    	return redirect('/branchview');
    }

    public function delete($id){
    	$branch = branch::find($id)->delete();
    	return redirect('/branchview');
    }
}
