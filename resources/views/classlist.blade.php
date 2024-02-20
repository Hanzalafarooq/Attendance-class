

@extends('main')
@section('main-section')
<head>

<style>
#bgvid {
  opacity:0.6;
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
  <source src="./blur.mp4" type="video/mp4">
  <source src="video.webm" type="video/webm">
</video>
<table class="table caption-top text-white "  >
  <caption class="text-white mt-3">List of All Classes</caption>
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col"> Name</th>

      <th>Edit</th>
     <th>Delete</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($clist as $key => $clis )
   <tr>
      {{-- <th scope="row"></th> --}}
      <td scope="row">{{$key+1}}</td>
      <td> {{$clis->name}}</td>
      <td class='edit'><a href="{{route('update.class', ['id' => $clis->id])}}">
        <i class='fa fa-edit'></i></a>
      <td><a href={{route('delete.class', ['id' => $clis->id])}}><i class='fa  fa-trash-alt'></i></a></td>
    </tr>
    @endforeach

  </tbody>
</table>
</main>


@endsection
