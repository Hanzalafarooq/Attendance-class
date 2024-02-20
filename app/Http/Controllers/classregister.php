<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class classregister extends Controller
{
    public function editclass($id)
    {
        $class=DB::table('class')->find($id);
        // dd($class);
        //  echo "<pre>";
        //  print_r($class);
        //  echo "</pre>";
        //  exit;
        return view("editclass",compact('class'));
    }
    public function sumbiteditclass(Request $request,$id)
    {
        {
            //$students=DB::table('student')->find($id);
            // for without model
            $data =[
                'name'=>$request->name,

            ];
            DB::table('class')->where('id',$id)->update($data);
        return redirect('classlist');

    }
}
public function deleteclass($id)
{
    $tableName = 'class';
    DB::table('attendence')->where('class_id', $id)->delete();
    DB::table('class_student')->where('class_id', $id)->delete();
    DB::table('class')->where('id', $id)->delete();
return redirect()->back();
}
}
