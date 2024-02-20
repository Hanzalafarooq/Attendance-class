
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
    <!-- <source src="video.webm" type="video/webm"> -->
  </video>



  <h3 class="text-white text-center  text-uppercase mt-4" style="font-family:fantasy;opacity:0.7">Students Attendance</h3>

  <form action="{{route('attendance.show')}}" method="get">
    @csrf
    <div class="container">
      <div class="row">
        <div class="col-md-6" style="  color: white; margin-top: 37px">

          <label for="birthday" class="pt-4" style="font-size: larger;margin-left:53px">Date:</label>
          <input type="date" name="dte">



        </div>
        <div class="col-md-6" style="width:20pc;">
          <div class="mb-3">
            <label for="" class="form-label text text-white pt-4">Classes</label>
            <select class="form-select form-select-lg" name="class" id="">

              <option selected>Select one</option>
              @foreach ($clist as $clis)
              <option  value={{$clis->id}}>{{$clis->name}}</option>
              @endforeach

            </select>
          </div>
        </div>
      </div>
      <input type="submit">
    </div>
    </div>
  </form>
  <div class="container">
    <div class="row pt-5">

      <div class="offset-3 col-md-6">
        <div class="table-responsive">
          <table class="table text-light text-center">
            <thead class="bg-dark ">

              <tr>
                <th scope="col">Student Name</th>
                <th scope="col">Class Name</th>
                <th scope="col">Attendance</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cslist as $clssis)
                <tr class="">
                  <td scope="row">{{$clssis->first_name}}{{$clssis->last_name}}</td>
                  <td>{{$clssis->name}}</td>
                  <td scope="row">{{$clssis->attendence}}</td>

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
