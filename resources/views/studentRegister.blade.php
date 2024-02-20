
@extends('main')
@section('main-section')



<style>
/* #bgvid {
  position: fixed;
  top: 0;
  left: 0;
  min-width: 100%;
  min-height: 100%;
  z-index: -1;
  opacity:0.5;
} */



</style>


<main>

<video autoplay muted loop id="bgvid">
  <source src="./ocean.mp4" type="video/mp4">
  <source src="./ocean.mp4" type="video/webm">
</video>


<div class="login-box">

    <h2>Student Registration</h2>
    <form method="post" action="{{url('register')}}">
        @csrf
      <div class="user-box">
        <input type="text" name="firstname" required="">
        <label>First name</label>
      </div>
      <div class="user-box">
        <input type="text" name="lastname" required="">
        <label>Last name</label>
      </div>
      <input type="submit" value="submit" name="sub">
    </form>
  </div>
  </main>



@endsection
