<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Admin Routes
Route::get('/login','AdminController@login');
Route::post('/islogin','AdminController@adminloged');
Route::get('dashboard','AdminController@dashboard');
//Student Routes
Route::get('/studentregister','StudentController@create');
Route::post('/studentstore','StudentController@store');
Route::get('/studentdetails','StudentController@show');
Route::get('/studentdetails-ajax','StudentController@ajax_show');

Route::get('/student_edit/{id}',['as'=>'student.edit','uses'=>'StudentController@edit']);
Route::post('/student_update/{id}',['as'=>'student.update','uses'=>'StudentController@update']);
Route::get('/student_delete/{id}',['as'=>'student.delete','uses'=>'StudentController@delete']);
//Branch Routes
Route::post('/student/courses','StudentController@courses');
Route::get('addbranch','BranchController@create');
Route::post('branchstore','BranchController@store');
Route::get('/branchview','BranchController@show');
Route::get('/branch_edit/{id}',['as'=>'branch.edit','uses'=>'BranchController@edit']);
Route::post('/branch_update/{id}',['as'=>'branch.update','uses'=>'BranchController@update']);
Route::get('/branch_delete/{id}',['as'=>'branch.delete','uses'=>'BranchController@delete']);
//Course Routes
Route::get('addcourse','CourseController@create');
Route::post('coursestore','CourseController@store');
Route::get('showcourse','CourseController@show');