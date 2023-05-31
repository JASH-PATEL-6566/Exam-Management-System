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
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($allUsersData as $item)    
            <tr>
                <th class="align-middle" scope="row">{{$item->id}}</th>
                <td class="align-middle text-capitalize">{{$item->first_name}}</td>
                <td class="align-middle">{{$item->email}}</td>
                <td class="align-middle text-capitalize">{{$item->gender}}</td>
                <td class="align-middle">{{$item->mobile}}</td>
                <td class="align-middle m-auto">
                    <a href="../edit_user/{{$item->id}}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="/delete_user/{{$item->id}}" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection