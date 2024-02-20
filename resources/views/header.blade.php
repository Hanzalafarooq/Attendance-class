<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="../css/font-awesome.css">
<link rel="stylesheet" href="Acids/css/headere.css">
<link rel="stylesheet" href="Acids/css/reg.css">
{{-- @include('header') --}}

<body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav"style="opacity:.7">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">

        <li class="nav-item">
            @php
            if(isset($_GET['name'])){
                $name = $_GET['name'];
                if($name =='student'){
                    $active = 'active';
                }
            }
            else{
                $active = '';
            }

         @endphp
          <a class="nav-link <?= $active;?>" href="{{url('reg')}}">Student Register</a>
        </li>

        <li class="nav-item">

        <?php
            if(isset($_GET['name'])){
                $name = $_GET['name'];
                if($name =='student_list'){
                    $sactive = 'active';
                }
            }
            else{
                $sactive = '';
            }

            ?>
          <a class="nav-link <?= $sactive;?>"  href="{{url('list')}}">Student List</a>
        </li>

        <?php
            if(isset($_GET['name'])){
                $name = $_GET['name'];
                if($name =='classl'){
                    $classl_active = 'active';
                }
            }
            else{
              $classl_active = '';
            }

            ?>

        <li class="nav-item">
          <a class="nav-link  <?= $classl_active;?>" href="{{url('classregi')}}">Class Register</a>

          <?php
            if(isset($_GET['name'])){
                $name = $_GET['name'];
                if($name =='class'){
                    $class_active = 'active';
                }
            }
            else{
              $class_active = '';
            }

            ?>

        </li>
        <li class="nav-item">
          <a class="nav-link <?= $class_active;?>" href="{{url('classlist')}}">Class List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('atten')}}">Attendence</a>
        </li>

        <li class="nav-item">
        <?php
            if(isset($_GET['name'])){
                $name = $_GET['name'];
                if($name =='staff'){
                    $staff_active = 'active';
                }
            }
            else{
                $staff_active = '';
            }

            ?>
          <a class="nav-link <?= $staff_active;?>" href="{{url('attenlist')}}">Attendance List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('add')}}">Add students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('enrol')}}">Enrolled students</a>
        </li>

      </ul>
      <form class="d-flex">
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
      </form>
    </div>
  </div>
</nav>
  </header>

