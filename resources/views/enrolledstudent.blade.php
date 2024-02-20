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
    <video autoplay muted loop id="bgvid">
        <source src="./desk.mp4" type="video/mp4">
        <source src="video.webm" type="video/webm">
    </video>



    <h3 class="text-white text-center  text-uppercase mt-4" style="font-family:fantasy;opacity:0.7">All enroled studets</h3>
    <div class="container">
        <div class="row pt-5">
            <div class="offset-3 col-md-6">
                <div class="table-responsive">
                    <table class="table text-light text-center">
                        <thead class="bg-dark ">

                            <tr>
                                <th scope="col">FirstName</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Class Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>




                      @foreach ($enrstudent as $enr )


                                <tr class="">
                                    <td scope="row">{{$enr->first_name}}</td>
                                    <td scope="row">{{$enr->last_name}}</td>
                                    <td scope="row">{{$enr->name}}</td>
                                    <td class='edit'><a href={{url('update_enrolled',$enr->csid)}}><i class='fa fa-edit'></i></a></td>
                                    <td><a href=''><i class="fas fa-trash-alt"></i></a> </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</main>
@endsection
