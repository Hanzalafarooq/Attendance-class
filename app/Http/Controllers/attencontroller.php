<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class attencontroller extends Controller
{
    public function attendlist()
{
    $clist=DB::table('class')->get();
    // dd($clist);

    $cslist = DB::select('SELECT * FROM attendence
    JOIN student ON student.id = attendence.student_id
    JOIN class ON class.id = attendence.class_id');

   return view('attendancelist',compact('cslist','clist'));



    // $cslist=DB::table('attendence')
    // ->join('student','student.id', "=" ,'attendence.student_id')
    // ->join('class','class.id', "=" ,'attendence.class_id')
    // ->get();


}
public function attend()
{
    $clist=DB::table('class')->get();
    return view('attendance',compact('clist'));

}
public function addatten(Request $request)
{
    // echo $request->class;exit;
   $class_id= $request->class;
    $attend=DB::table('attendence')->first();

$class=DB::table('class')->where('id',$class_id);
    // dd($class);
// $students=DB::table('class_student')->where('class_id',$class_id)->first();
// $id=DB::table('student')->where('id', $students->student_id)->get('first_name');
$csslist = DB::table('class_student')
->join('class', 'class.id', '=', 'class_student.class_id')
->join('student', 'student.id', '=', 'class_student.student_id')
->where('class_student.class_id', '=', $class_id)
->get();
;
// echo $id;
// dd($cslist);exit;
    // $atten=DB::table('attendence')->get();
    // echo '<pre>';
    // print_r($attend->all());
    // echo'</pre>';
    return view('add_attendence',compact('class_id','csslist','class'));
}
public function store(Request $request)
{
    $studentIds = $request->input('student_id');
    $classId = $request->input('class_id');
    $date = date('Y-m-d');
    // dd($request->all());
    foreach ($studentIds as $studentId) {
        $attendance = $request->input('flexRadioDefault'.$studentId);

        DB::table('attendence')->insert([
            'student_id' => $studentId,
            'class_id' => $classId,
            'date' => $date,
            'attendence' => $attendance,
        ]);
    }

    return redirect('attenlist');
}

public function show(Request $request)
{
    // dd($request->all());
    $a=$request->all();
    // echo '<pre>';
    // print_r($a);
    // exit;

    $newDate = date("d-m-Y", strtotime($request->dte));

    $classDetails = DB::table('attendence')
    ->where('class_id', $request->class)
    ->where('date', $request->dte)
    ->get();
    // echo '<pre>';
    // print_r($classDetails);
    // exit;
    $classDetailss = DB::table('class')
    ->select('name')
    ->where('id', $request->class)
    ->first();
    // dd($classDetails);
    // echo $request->class .'<br>';
    // echo $newDate;
    $attendanceDetails = DB::table('attendence')
        ->join('class', 'class.id', '=', 'attendence.class_id')
        ->join('student', 'student.id', '=', 'attendence.student_id')
        ->where('attendence.class_id', $request->class)
        ->where('attendence.date',  $request->dte)
        ->get();
// dd($attendanceDetails);
    return view('attendenceEdit', [

        'attendenceDetails' => $attendanceDetails,
        'date' =>$request->dte,
    ])->with(compact('attendanceDetails','classDetailss','classDetailss'));
}
public function edit($class, $date)
{
    return view('attendenceEdit', [
        'class' => $class,
        'date' => $date,
    ]);
}


 public function updateAttendance(Request $request)
    {
//  dd($request->all());
        $id = $request->input('class');
        $user = $request->input('date');
        // echo $user;
        // echo $id;
        // die;
        $newDate = date("d-m-Y", strtotime($user));

        $class = DB::table('class')->select('name')->where('id', $id)->first();

        $attendance = DB::table('attendence')
            ->join('student', 'attendence.student_id', '=', 'student.id')
            ->join('class', 'class.id', '=', 'attendence.class_id')
            ->select('attendence.student_id', 'student.first_name', 'student.last_name', 'attendence.attendence')
            ->where('class_id', $id)
            ->where('date', $user)
            ->get();
// dd($attendance);
        return view('update_attendence', [
            'user' => $user,
            'class' => $class,
            'attendance' => $attendance
        ]);
    }

    public function submitAttendance(Request $request)
    {
        //  dd($request->all());
        $studentIds = $request->input('student_id');
        $dates = $request->input('dates');

        foreach ($studentIds as $studentId) {
            $attendance = $request->input('flexRadioDefault' . $studentId);

            DB::table('attendence')
                ->where('student_id', $studentId)
                ->update(['attendence' => $attendance]);
        }

        return redirect()->back();
    }

    public function insertClassStudent(Request $request)
    {

            //  dd($request->all());
        $class = $request->input('class');
        $student = $request->input('student');

        // Insert data into the database
        DB::table('class_student')->insert([
            'class_id' => $class,
            'student_id' => $student
        ]);

        // Return a response
        // return "Data inserted successfully.";
         return redirect('/enrol');
    }

    public function updateEnrolled($id)
    {
        // Get the class_student record
        $record = DB::table('class_student')->where('csid', $id)->first();

        // Retrieve the student and class information
        $student = DB::table('student')->where('id', $record->student_id)->first();
        $classes = DB::table('class')->get();

        return view('update_enrolledstudent', [
            'student' => $student,
            'classes' => $classes,
            'recordId' => $id
        ],compact('record','student','classes'));
    }
    public function submitUpdate(Request $request, $id)
    {
        // Get input data from the form
        $student = $request->input('student');
        $class = $request->input('class');

        // Update the class_student record
        DB::table('class_student')
            ->where('csid', $id)
            ->update(['student_id' => $student, 'class_id' => $class]);

        return redirect('/enrol');
    }
}




