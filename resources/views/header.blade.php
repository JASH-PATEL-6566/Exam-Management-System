<?php 
    use Illuminate\Support\Facades\Session;
    $total = 0;
    if(Session::has("user")){
    //   $total = ProductController::cartItem();

    }
?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Exam-Management-System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @if (Session::has("user"))
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
          @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if (Session::has("user"))    
            <li class="nav-item dropdown" style="margin-right: 80px">
              <a class="nav-link dropdown-toggle" style="text-transform: uppercase;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Session::get("user")->first_name}}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" style="color: red;" href="../logout">Logout</a></li> 
              </ul>
            </li>
            @else
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../">Login</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../register">Register</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="../admin_login">Admin Login</a>
            </li>
            @endif
            </ul>
      </div>
    </div>
  </nav>