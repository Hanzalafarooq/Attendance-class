{{--

// echo $cid;
// exit;
$q = "SELECT * FROM class_student where class_id=$cid";
$result3 = mysqli_query($conn, $q);


$record = mysqli_fetch_assoc($result3);

// $s = $record['student_id'];
$c = $record['class_id'];

// $std = "SELECT * From student JOIN class_student on student.id = class_student.student_id JOIN class on class.id =$c where student.id = $s ";
$std = "SELECT * From class_student JOIN  student on student.id = class_student.student_id  where class_id = $c";
$result2 = mysqli_query($conn, $std);



$w="SELECT * from class where id=$cid" ;
$result4 = mysqli_query($conn, $w);
$row2=mysqli_fetch_assoc($result4);

// while(mysqli_fetch_array($result2));

// while (mysqli_fetch_assoc($result2));

?> --}}
{{--
<head>
    <style>
        #bgvid {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            opacity: 0.3;
        }

        <style>
    /* Form styling */
    .container {
        margin-top: 30px;
    }

    .table {
        color: #fff;
    }

    th {
        color: #fff;
    }

    /* Radio button styling */
    .form-check-input {
        margin-top: 7px;
    }

    /* Submit button styling */
    input[type="submit"] {
        margin-top: 20px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Text styling */
    .text-white {
        color: #fff;
    }

    .text-center {
        text-align: center;
    }

    .text-uppercase {
        text-transform: uppercase;
    }

    .mt-4 {
        margin-top: 4px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .offset-3 {
        margin-left: 25%;
    }

    /* Background styling */
    body {
        background-color: #14141a;
    }

    .bg-dark {
        background-color: #343a40;
    }
</style>





    </style>
</head> --}}
@extends('main')
@section('main-section')
    {{-- <video autoplay muted loop id="bgvid">
        <source src="./desk.mp4" type="video/mp4">
        <source src="video.webm" type="video/webm">
    </video> --}}

    {{-- {{url('submiteditregister/'.$class->id)}}" enctype="multipart/form-data" --}}

    <form action="{{ route('attendance.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <h3 class="text-white text-center  text-uppercase mt-4" style="font-family:fantasy;opacity:0.7">All enroled studets</h3>
        <div class="container">
            <div class="row pt-5 " style="">
                <div class="offset-3 col-md-6">
                    <div class="table-responsive">
                        <table class="table text-light text-center">
                            <thead class="bg-dark ">

                                <tr>
                                    <th scope="col"colspan="" >Student</th>
                                    <th scope="col" colspan="4">Attendance</th>

                                </tr>
                                <span style="color: whitesmoke;">Date:{{ now()->format('Y-m-d') }} </span>
                                {{-- @foreach ($results as $row) --}}
                               {{-- <span style="color:whitesmoke; margin-left: 8pc;"> class:{{$row --}}
                               {{-- ->name}} </span> --}}
{{-- @endforeach --}}
                            </thead>
                            @foreach ($csslist as $names )
                                    <tbody>

                                    <tr class="">
                                        <input type="hidden" name="class_id" value={{$names->class_id}}>
                                        <input type="hidden" name="student_id[]" value={{$names->student_id}}>
                                              <td scope="row">{{$names->first_name}}  {{$names->last_name}}</td>

                                        <td>
                                            <div class="form-check" >
                                                <input class="form-check-input" value="absent" type="radio" name="flexRadioDefault{{ $names->student_id }}" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault{{ $names->student_id }}">
                                                    Absent
                                                </label>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input"  value="present" type="radio" name="flexRadioDefault{{ $names->student_id   }}" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault{{ $names->student_id }}">
                                                    Present
                                                </label>

                                        </td>
                                    </tr>
                                    @endforeach

                            </tbody>

                        </table>

                        <input type="submit" value="submit" name="sub">

                    </div>
                </div>
            </div>
    </form>
    </div>
    @endsection




