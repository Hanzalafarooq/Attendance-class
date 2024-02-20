<?php

use App\Http\Controllers\classregister;
use App\Http\Controllers\studentregister;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentregisterr;
use App\Http\Controllers\attencontroller;
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
Route::get('head',function()
{
    return view('main');
});
Route::get('/reg',[studentregisterr::class,'registerPage']);
Route::post('/register',[studentregisterr::class,'register']);
Route::get('/editregister/{id}',[studentregisterr::class,'editstudent'])->name('update.student');
Route::get('/editregistermm/{id}',[classregister::class,'editclass'])->name('update.class');
Route::post('/submiteditregister/{id}',[classregister::class,'sumbiteditclass'])->name('sumbitupdate.class');
Route::post('/submitupdate/{id}',[studentregisterr::class,'submitupdatestudent'])->name('submitupdate.student');
Route::get('/deleteregister/{id}',[studentregisterr::class,'deletestudent'])->name('delete_student');
Route::get('/deleteregistermm/{id}',[classregister::class,'deleteclass'])->name('delete.class');
Route::get('/list',[studentregisterr::class,'show'])->name('list');
Route::get('/classregi',[studentregisterr::class,'classreg']);
Route::post('/classregister',[studentregisterr::class,'classregister'])->name('register.class');
Route::get('/classlist',[studentregisterr::class,'classlis']);
Route::get('/atten',[attencontroller::class,'attend']);
Route::post('/attend',[attencontroller::class,'addatten'])->name('attendence');
Route::get('/attenlist',[attencontroller::class,'attendlist']);
Route::get('/add',[studentregisterr::class,'addstu']);
Route::get('/enrol',[studentregisterr::class,'enrolled']);
Route::post('/attendance/store', [attencontroller::class, 'store'])->name('attendance.store');
Route::get('/attendance/', [attencontroller::class, 'show'])->name('attendance.show');
Route::get('/update_attendance', [attencontroller::class,'updateAttendance'])->name('attendance.edit');
Route::post('/update_attendance', [attencontroller::class,'submitAttendance'])->name('attendance.submit');
Route::post('/insert_class_student', [attencontroller::class, 'insertClassStudent'])->name('insert.students');
Route::get('/update_enrolled/{id}', [attencontroller::class,'updateEnrolled']);
Route::post('/update_enrolled/{id}',[attencontroller::class,'submitUpdate'])->name('update.enroll');

Route::get('/', function () {
    return view('welcome');
});
