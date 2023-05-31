@extends('master')
@section('content')   
<div class="container pt-4">
<form action="../edit_user/{{$userDetail->id}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$userDetail->id}}">
    <div class="mb-3">
        <label for="firstName" class="fw-medium fw-medium form-label">First Name</label>
        <input type="text" id="firstName" name="firstName" value="{{$userDetail->first_name}}" class="form-control" aria-describedby="emailHelp">
    </div>  
    <div class="mb-3">
        <label for="lastName" class="fw-medium fw-medium form-label">Last Name</label>
        <input type="text" id="lastName" name="lastName" value="{{$userDetail->last_name}}" class="form-control" aria-describedby="emailHelp">
    </div>  
    <div class="mb-3">
        <label for="email" class="fw-medium fw-medium form-label">Email</label>
        <input type="email" id="email" name="email" value="{{$userDetail->email}}" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="gender" class="fw-medium form-label">Gender</label>
        <select id="gender" name="gender" class="form-select" value="{{$userDetail->gender}}" >
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
    </div>    
    <div class="mb-3">
        <label for="phone" class="fw-medium fw-medium form-label">Phone Number</label>
        <input type="text" id="phone" name="phone" value="{{$userDetail->mobile}}" class="form-control" aria-describedby="emailHelp">
    </div>  
    <div class="mb-3">
        <label for="address" class="fw-medium fw-medium form-label">Address</label>
        <input type="text" id="address" name="address" value="{{$userDetail->address}}" class="form-control" aria-describedby="emailHelp">
    </div>  
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
</div>
@endsection