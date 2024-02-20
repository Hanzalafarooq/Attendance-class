

@extends('main')
@section('main-section')
@php
$id=0;
@endphp

    <h3 class="text-white text-center text-uppercase mt-4" style="font-family: fantasy; opacity: 0.7">Students Attendance</h3>
    {{-- <form action="{{ url('/update-attendance') }}" method="post"> --}}
    <div class="container">
        <div class="row pt-4">
            <div class="col-md-6 text-white" style="padding-left: 19pc;">Date: {{ $date }}</div>
            <div class="col-md-6 text-white float-right" style="padding-left: 11pc;"> Class {{ $classDetailss->name }}</div>
            <div class="offset-3 col-md-6">
                <div class="table-responsive">
                    <table class="table text-light text-center">
                        <thead class="bg-dark">
                            <tr>
                                <th scope="col">Student Name</th>
                                <th scope="col">Class Name</th>
                                <th scope="col">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendanceDetails as $row)
                                <tr>
                                    <td scope="row">{{ $row->first_name }} {{ $row->last_name }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->attendence }}</td>
                                </tr>
                                @php

    $id=$row->class_id;
@endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="{{url('update_attendance')}}?class={{$id}}&date={{$date}}" style="margin-left:49pc;color:whitesmoke;">Edit</a>
    {{-- </form> --}}
    </div>
@endsection
