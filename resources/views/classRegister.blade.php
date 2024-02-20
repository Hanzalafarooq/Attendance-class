


@extends('main')
@section('main-section')
<style>
#bgvid {
  position: fixed;
  top: 0;
  left: 0;
  min-width: 100%;
  min-height: 100%;
  z-index: -1;
  opacity:0.5;
}
</style>

</head>
<main>

<video autoplay muted loop id="bgvid">
  <source src="./blur.mp4" type="video/mp4">
  <source src="./blur.mp4" type="video/webm">
</video>


<div class="login-box">
    <h2>Class Registration</h2>
    <form method="post" action="{{route('register.class')}}">
        @csrf
      <div class="user-box">
        <input type="text" name="name" required="">
        <label>Class name</label>
      </div>

      <input type="submit" value="submit" name="sub">

    </form>

  </div>
  </main>
@endsection
