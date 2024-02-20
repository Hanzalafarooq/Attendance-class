
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
            opacity: 0.4;
        }
    </style>
</head>
<main>
    <video autoplay muted loop id="bgvid">
        <source src="./desk.mp4" type="video/mp4">
        <source src="video.webm" type="video/webm">
    </video>





        <h3 class="text-white text-center mt-5 text-uppercase" style="font-family:fantasy;opacity:0.7">All students</h3>
        <div class="container">
            <div class="row pt-5">
                <div class="offset-3 col-md-6">
                    <div class="table-responsive">
                        <table class="table text-light text-center">
                            <thead class="bg-dark ">
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $lis)
                                <tr class="">
                                    <td scope="row">{{$lis->first_name}}</td>
                                    <td> {{$lis->last_name}}</td>
                                    <td class='edit'><a href={{url('editregister',$lis->id)}}><i class='fa fa-edit'></i></a></td>
                                    <td><a href='{{url('deleteregister', ['id' => $lis->id])}}'><i class="fas fa-trash-alt"></i></a> </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


</main>
</form>
@endsection
