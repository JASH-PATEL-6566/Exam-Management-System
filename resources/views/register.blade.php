@extends('master')
@section('content')     
<div class="container pt-3">
    <div class="row">
        <div class="col-6 align-self-center">
            <form action="/registerUser" method="post">
              @csrf
                <div class="mb-3">
                  <label for="firstName" class="fw-medium form-label">First Name</label>
                  <input required type="text" name="f_name" class="form-control" id="firstName" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="lastName" class="fw-medium form-label">Last Name</label>
                  <input required type="text" name="l_name" class="form-control" id="lastName" aria-describedby="emailHelp">
                </div>
                <label class="fw-medium form-label">Gender</label>
                <div class="form-check">
                    <input value="male" class="form-check-input" type="radio" name="gender" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Male
                    </label>
                  </div>
                  <div class="form-check mb-3">
                    <input value="female" class="form-check-input" type="radio" name="gender" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                      Female
                    </label>
                  </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="fw-medium form-label">Email address</label>
                  <input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="fw-medium form-label">Password</label>
                  <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="phone" class="fw-medium form-label">Mobile Number</label>
                  <input required type="text" name="phone" class="form-control" id="phone">
                </div>
                <div class="mb-3">
                  <label for="address" class="fw-medium form-label">Address</label>
                  <input required type="text" name="address" class="form-control" id="address">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <div id="emailHelp" class="form-text">You don't have an account? <a href="/login">Login</a></div>
              </form>
        </div>
    </div>
</div>
@endsection