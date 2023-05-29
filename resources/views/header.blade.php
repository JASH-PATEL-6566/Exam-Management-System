<?php
  use Illuminate\Support\Facades\URL;
?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Exam-Management-System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @if(\Request::getRequestUri() == "/" && Session::has("admin"))
            <li class="nav-item">
              
            </li>
            @elseif(\Request::getRequestUri() == "/admin_login" && Session::has("user"))
            <li class="nav-item">
              
            </li>
            @elseif(\Request::getRequestUri() == "/register")
            <li class="nav-item">
              
            </li>
            @elseif(\Request::getRequestUri() == "/user" && Session::has("admin") && Session::has("user"))
            <li class="nav-item">
              <a class="nav-link mx-3" aria-current="page" href="#">Exams</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-3" href="#">Results</a>
            </li>
            @elseif(Session::has("admin"))
            <li class="nav-item mx-3">
              <a class="nav-link" aria-current="page" href="#">Exams</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="#">Users</a>
            </li>
            @elseif(Session::has("user"))
            <li class="nav-item">
              <a class="nav-link mx-3" aria-current="page" href="#">Exams</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-3" href="#">Results</a>
            </li>
          @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(\Request::getRequestUri() == "/" && !Session::has("user"))
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../">Login</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../register">Register</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../admin_login">Admin Login</a>
            </li>
            @elseif(\Request::getRequestUri() == "/admin_login" && !Session::has("admin"))
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../">Login</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../register">Register</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../admin_login">Admin Login</a>
            </li>
            @elseif(\Request::getRequestUri() == "/register")
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../">Login</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../register">Register</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../admin_login">Admin Login</a>
            </li>
            @elseif (Session::has("user"))    
            <li class="nav-item dropdown" style="margin-right: 80px">
              <a class="nav-link dropdown-toggle" style="text-transform: uppercase;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Session::get("user")->first_name}}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" style="color: red;" href="../logout">Logout</a></li> 
              </ul>
            </li>
            @elseif(Session::has("admin"))
            <li class="nav-item dropdown" style="margin-right: 80px">
              <a class="nav-link dropdown-toggle" style="text-transform: uppercase;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Session::get("admin")->name}}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" style="color: red;" href="../logoutAdmin">Logout</a></li> 
              </ul>
            </li>
            @endif
            </ul>
      </div>
    </div>
  </nav>