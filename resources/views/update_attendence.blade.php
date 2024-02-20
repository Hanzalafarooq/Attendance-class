


@extends('main')
@section('main-section')
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
    </style>
</head>
<main>


    <h3 class="text-white text-center  text-uppercase mt-4" style="font-family:fantasy;opacity:0.7">Update Attendance</h3>
    <form action="{{route('attendance.submit')}}" method="post">
        @csrf
        <div class="container">
            <div class="row pt-4">
                <div class="col-md-6 text-white " style="padding-left: 19pc;">Date: {{ $user }}</div>
                {{-- <div class="col-md-6 text-white float-right" style="padding-left: 11pc;"> Class {{ $class->name }}</div> --}}
                <div class="offset-3 col-md-6">
                    <div class="table-responsive">
                        <table class="table text-light text-center">
                            <thead class="bg-dark">
                                <tr>
                                    <th scope="col">Student Name</th>
                                    <th colspan="2">Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attendance as $row)
                                <tr>
                                    <input type="hidden" name="student_id[]" value="{{ $row->student_id }}">
                                    <td scope="row">{{ $row->first_name }} {{ $row->last_name }}</td>
                                    @if($row->attendence == 'present')
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label" for="flexRadioDefault{{ $row->student_id }}">Absent</label>
                                            <input class="form-check-input" value="absent" type="radio" name="flexRadioDefault{{ $row->student_id }}" id="flexRadioDefault{{ $row->student_id }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label" for="flexRadioDefault{{ $row->student_id }}">Present</label>
                                            <input class="form-check-input" value="present" type="radio" name="flexRadioDefault{{ $row->student_id }}" id="flexRadioDefault{{ $row->student_id }}" checked>
                                        </div>
                                    </td>
                                    @else
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label" for="flexRadioDefault{{ $row->student_id }}">Absent</label>
                                            <input class="form-check-input" value="absent" type="radio" name="flexRadioDefault{{ $row->student_id }}" id="flexRadioDefault{{ $row->student_id }}" checked>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label" for="flexRadioDefault{{ $row->student_id }}">Present</label>
                                            <input class="form-check-input" value="present" type="radio" name="flexRadioDefault{{ $row->student_id }}" id="flexRadioDefault{{ $row->student_id }}">
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="dates" value="{{ $user }}">
        <input type="submit" value="Submit" style="margin-left: 49pc">
    </form>
</main>
@endsection
