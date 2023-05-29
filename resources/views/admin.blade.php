@extends('master')
@section('content')     
<div class="container mt-4">
    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Create Exam
    </button>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Exam</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="create_new_exam" method="POST">
                @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="fw-medium fw-medium form-label">Exam Title</label>
                    <input type="text" placeholder="Exam title" class="form-control" name="title" id="title" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="time" class="fw-medium form-label">Duration</label>
                    <select id="time" name="duration" class="form-select">
                      <option selected>Select</option>
                      <option value="1">1 Minute</option>
                      <option value="2">2 Minute</option>
                      <option value="3">3 Minute</option>
                      <option value="4">4 Minute</option>
                      <option value="5">5 Minute</option>
                      <option value="30">30 Minute</option>
                      <option value="60">1 Hour</option>
                      <option value="120">2 Hour</option>
                      <option value="180">3 Hour</option>
                    </select>
                </div>  
                <div class="mb-3">
                    <label for="questions" class="fw-medium form-label">Total Question</label>
                    <select id="questions" name="questions" class="form-select">
                      <option selected>Select</option>
                      <option value="1">1 Question</option>
                      <option value="2">2 Question</option>
                      <option value="3">3 Question</option>
                      <option value="4">4 Question</option>
                      <option value="5">5 Question</option>
                      <option value="10">10 Question</option>
                      <option value="25">25 Question</option>
                      <option value="50">50 Question</option>
                      <option value="100">100 Question</option>
                      <option value="200">200 Question</option>
                      <option value="300">300 Question</option>
                    </select>
                </div>  
                <div class="mb-3">
                    <label for="right_mark" class="fw-medium form-label">Marks For Right Answer</label>
                    <select id="right_mark" name="right_mark" class="form-select">
                      <option selected>Select</option>
                      <option value="1">+1 Mark</option>
                      <option value="2">+2 Mark</option>
                      <option value="3">+3 Mark</option>
                      <option value="4">+4 Mark</option>
                      <option value="5">+5 Mark</option>
                    </select>
                </div>  
                <div class="mb-3">
                    <label for="wrong_mark" class="fw-medium form-label">Marks For Wrong Answer</label>
                    <select id="wrong_mark" name="wrong_mark" class="form-select">
                      <option selected>Select</option>
                      <option value="0">-0 Mark</option>
                      <option value="1">-1 Mark</option>
                      <option value="1.25">-1.25 Mark</option>
                      <option value="1.50">-1.50 Mark</option>
                      <option value="2">-2 Mark</option>
                    </select>
                </div>  
                <div class="mb-3">
                    <label for="status" class="fw-medium form-label">Status</label>
                    <select id="status" name="status" class="form-select">
                      <option selected>Select</option>
                      <option value="Created">Created</option>
                      <option value="Pending">Pending</option>
                      <option value="Started">Started</option>
                      <option value="Completed">Completed</option>
                    </select>
                </div>  
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      @if (count($exams) > 0)
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Exam Title</th>
            <th scope="col">Duration(Minute)</th>
            <th scope="col">Total Question</th>
            <th scope="col">R/Q Mark</th>
            <th scope="col">W/Q Mark</th>
            <th scope="col">Status</th>
            <th scope="col">Questions</th>
            <th scope="col">Enroll Users</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($exams as $item)    
            <tr>
                <th class="align-middle" scope="row">{{$item->id}}</th>
                <td class="align-middle">{{$item->exam_title}}</td>
                <td class="align-middle">{{$item->duration}}</td>
                <td class="align-middle">{{$item->total_question}}</td>
                <td class="align-middle">{{$item->marks_per_right_answer}}</td>
                <td class="align-middle">{{$item->marks_per_wrong_answer}}</td>
                <td class="align-middle">{{$item->status}}</td>
                <td class="align-middle">
                    <a href="/questions/{{$item->id}}" class="btn btn-success">
                        Questions
                    </a>
                </td>
                <td class="align-middle d-flex justify-content-center">
                    <a href="/enrolls/{{$item->id}}" class="btn btn-primary">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </td>
                <td class="align-middle m-auto">
                    <a href="/edit_exam/{{$item->id}}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="/delete_exam/{{$item->id}}" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      @else
        <h3>You didn't create any exam yet.</h3>
      @endif
</div>
@endsection