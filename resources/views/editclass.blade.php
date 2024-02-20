


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









    nav {
        background-color: #2c3e50;
        height: 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 50px;
        }

        nav ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        }

        nav ul li {
        margin: 0 10px;
        }

        nav ul li a {
        color: #fff;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: bold;
        position: relative;
        }

        nav ul li a:before {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: -5px;
        left: 0;
        background-color: #fff;
        visibility: hidden;
        transform: scaleX(0);
        transition: all 0.3s ease-in-out 0s;
        }

        nav ul li a:hover:before {
        visibility: visible;
        transform: scaleX(1);
        }

        nav ul li a:after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -5px;
        left: 0;
        background-color: #fff;
        visibility: hidden;
        transition: all 0.3s ease-in-out 0s;
        }

        nav ul li a:hover:after {
        visibility: visible;
        width: 100%;
        }

        nav ul li.active a:before,
        nav ul li.active a:after {
        visibility: visible;
        transform: scaleX(1);
        }

        nav ul li.active a:after {
        width: 100%;
        }











        html {
        height: 100%;
        }
        body {
        margin:0;
        padding:0;
        font-family: sans-serif;
        background: linear-gradient(#141e30, #243b55);
        }

        .login-box {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        transform: translate(-50%, -50%);
        background: rgba(0,0,0,.5);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0,0,0,.6);
        border-radius: 10px;
        }

        .login-box h2 {
        margin: 0 0 30px;
        padding: 0;
        color: #fff;
        text-align: center;
        }

        .login-box .user-box {
        position: relative;
        }

        .login-box .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
        }
        .login-box .user-box label {
        position: absolute;
        top:0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
        transition: .5s;
        }

        .login-box .user-box input:focus ~ label,
        .login-box .user-box input:valid ~ label {
        top: -20px;
        left: 0;
        color: #03e9f4;
        font-size: 12px;
        }

        .login-box form a {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #03e9f4;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: .5s;
        margin-top: 40px;
        letter-spacing: 4px
        }

        .login-box a:hover {
        background: #03e9f4;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 5px #03e9f4,
                  0 0 25px #03e9f4,
                  0 0 50px #03e9f4,
                  0 0 100px #03e9f4;
        }

        .login-box a span {
        position: absolute;
        display: block;
        }

        .login-box a span:nth-child(1) {
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #03e9f4);
        animation: btn-anim1 1s linear infinite;
        }

        @keyframes btn-anim1 {
        0% {
        left: -100%;
        }
        50%,100% {
        left: 100%;
        }
        }

        .login-box a span:nth-child(2) {
        top: -100%;
        right: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #03e9f4);
        animation: btn-anim2 1s linear infinite;
        animation-delay: .25s
        }

        @keyframes btn-anim2 {
        0% {
        top: -100%;
        }
        50%,100% {
        top: 100%;
        }
        }

        .login-box a span:nth-child(3) {
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent, #03e9f4);
        animation: btn-anim3 1s linear infinite;
        animation-delay: .5s
        }

        @keyframes btn-anim3 {
        0% {
        right: -100%;
        }
        50%,100% {
        right: 100%;
        }
        }

        .login-box a span:nth-child(4) {
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg, transparent, #03e9f4);
        animation: btn-anim4 1s linear infinite;
        animation-delay: .75s
        }

        @keyframes btn-anim4 {
        0% {
        bottom: -100%;
        }
        50%,100% {
        bottom: 100%;
        }
        }





    </style>

</head>
<main>

<video autoplay muted loop id="bgvid">
  <source src="./blur.mp4" type="video/mp4">
  <source src="./blur.mp4" type="video/webm">
</video>


<div class="login-box">
    <h2>Class update</h2>
    <form method="post" action="{{url('submiteditregister/'.$class->id)}}" enctype="multipart/form-data">
        @csrf
      <div class="user-box">
        <input type="text" name="name" required="" value="{{$class->name}}">
        <label>Class name</label>
      </div>

      <input type="submit" value="update" name="sub">

    </form>

  </div>
  </main>
@endsection
