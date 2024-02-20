<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class studentregisterr extends Controller
{
    public function registerPage()
{
// echo '<pre>';
// print_r($students);exit;
    return view("studentRegister");
}
public function editstudent($id)
{

    // print_r('sdfsdf');

 $students=DB::table('student')->find($id);

return view("updatestudent",compact('students'));
}
public function submitupdatestudent(Request $request,$id)
{
    //$students=DB::table('student')->find($id);
    // for without model
    $data =[
        'first_name'=>$request->firstname,
        'last_name'=>$request->lastname
    ];
    DB::table('student')->where('id',$id)->update($data);
return redirect('list');

}


public function deletestudent($id)
{
//   print_r('sdfsdf');
    $tableName = 'student';
    DB::table('attendence')->where('student_id', $id)->delete();
    DB::table('class_student')->where('student_id', $id)->delete();
    DB::table('student')->where('id', $id)->delete();
return redirect()->back();
}

public function register(Request $request){
    // echo '<pre>';print_r($request->all());echo'</pre>';die;
    $data =[
        'first_name'=>$request->firstname,
        'last_name'=>$request->lastname
    ];



    DB::table('student')->insert($data);

    return redirect('/list');
    // print_r($data);

}
public function show()
{
    $list=DB::table('student')->get();
    return view('studentlist',compact('list'));
}
public function classreg(Request $request)
{
    return view('classRegister');
}
public function classregister(Request $request){
    // echo '<pre>';print_r($request->all());echo'</pre>';die;
    $data =[
        'name'=>$request->name

    ];



    DB::table('class')->insert($data);
    return back();
    // print_r($data);

}
public function classlis()
{
    $clist=DB::table('class')->get();
    return view('classlist',compact('clist'));
}


public function addstu()
{
    $stu=DB::table('student')->get();

    $class=DB::table('class')->get();
    return view('addstudent',compact('stu','class'));
}
public function enrolled()
{
    $enrstudent=DB::table('class_student')
    ->join('student','student.id', "=" ,'class_student.student_id')
    ->join('class','class.id', "=" ,'class_student.class_id')
    ->get();
    return view('enrolledstudent',compact('enrstudent'));
}
}
