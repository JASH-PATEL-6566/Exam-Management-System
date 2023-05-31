@extends('master')
@section('content')     
<div class="container mt-4">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Mobile</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($enrolData as $item)    
            <tr>
                <th class="align-middle" scope="row">{{$item->id}}</th>
                <td class="align-middle text-capitalize">{{$item->first_name}}</td>
                <td class="align-middle">{{$item->email}}</td>
                <td class="align-middle text-capitalize">{{$item->gender}}</td>
                <td class="align-middle">{{$item->mobile}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection