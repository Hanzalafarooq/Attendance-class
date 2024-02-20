@extends('main')
@section('main-section')

    <head>
        <style>
            #bgvid {
                opacity: 0.2;
                position: fixed;
                top: 0;
                left: 0;
                min-width: 100%;
                min-height: 100%;
                z-index: -1;


            }
        </style>

    </head>
    <main>


        <video autoplay muted loop id="bgvid">
            <source src="./desk.mp4" type="video/mp4">
            <source src="video.webm" type="video/webm">
        </video>

        <div class="login-box">
            <form action="{{route('attendence')}}" method="POST">
                @csrf
                <div class="container">
                    <h2>Attendence</h2>

                    <div class="col-md-12">


                        <div class="mb-3">
                            <label for="" class="form-label text text-white">Classes</label>

                            <select class="form-select form-select-lg" name="class" id="">

                                    <option selected>Select one</option>
                                    @foreach ($clist as $clis)
                                    <option  value={{$clis->id}}>{{$clis->name}}</option>
                                    @endforeach

                            </select>
                        </div>

                    </div>
                </div>
                <input type="submit" value="submit" name="sub">
        </div>
        </form>
    </main>
@endsection
