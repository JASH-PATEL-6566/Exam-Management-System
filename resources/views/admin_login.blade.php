@extends('master')
@section('content')     
<div class="container custom-login">
    <div class="row">
        <div class="col-4 align-self-center">
            <form action="/loginAdmin" method="post">
              @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="fw-medium form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="fw-medium form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
        </div>
    </div>
</div>
@endsection