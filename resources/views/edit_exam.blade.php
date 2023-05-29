@extends('master')
@section('content')   
<div class="container pt-4">
<form action="../edit_exam" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$exam->id}}">
    <div class="mb-3">
        <label for="title" class="fw-medium fw-medium form-label">Exam Title</label>
        <input type="text" value="{{$exam->exam_title}}" placeholder="Exam title" class="form-control" name="title" id="title" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="time" class="fw-medium form-label">Duration</label>
        <select id="time" name="duration" class="form-select" value="{{$exam->duration}}">
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
        <select id="questions" name="questions" class="form-select" value="{{$exam->total_question}}">
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
        <select id="right_mark" name="right_mark" class="form-select" value="{{$exam->marks_per_right_answer}}">
          <option value="1">+1 Mark</option>
          <option value="2">+2 Mark</option>
          <option value="3">+3 Mark</option>
          <option value="4">+4 Mark</option>
          <option value="5">+5 Mark</option>
        </select>
    </div>  
    <div class="mb-3">
        <label for="wrong_mark" class="fw-medium form-label">Marks For Wrong Answer</label>
        <select id="wrong_mark" name="wrong_mark" class="form-select" value="{{$exam->marks_per_wrong_answer}}">
          <option value="0">-0 Mark</option>
          <option value="1">-1 Mark</option>
          <option value="1.25">-1.25 Mark</option>
          <option value="1.50">-1.50 Mark</option>
          <option value="2">-2 Mark</option>
        </select>
    </div>  
    <div class="mb-3">
        <label for="status" class="fw-medium form-label">Status</label>
        <select id="status" name="status" class="form-select" value="{{$exam->status}}" >
          <option value="Created">Created</option>
          <option value="Pending">Pending</option>
          <option value="Started">Started</option>
          <option value="Completed">Completed</option>
        </select>
    </div>  
    <div class="gap-2 d-flex w-100 justify-content-end mb-3">
        <a class="btn btn-secondary" href="../admin">Back</a>
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>
</form>
</div>
@endsection