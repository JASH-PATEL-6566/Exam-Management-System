@extends('master')
@section('content')     
<div class="container mt-4">
    <h3>Enrolled Exam List</h3>
      @if (count($enrolExams) > 0)
    <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Exam Title</th>
            <th scope="col">Duration(Minute)</th>
            <th scope="col">Total Question</th>
            <th scope="col">R/Q Mark</th>
            <th scope="col">W/Q Mark</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($enrolExams as $item)    
            <tr>
                <th class="align-middle" scope="row">{{$item->id}}</th>
                <td class="align-middle">{{$item->exam_title}}</td>
                <td class="align-middle">{{$item->duration}}</td>
                <td class="align-middle">{{$item->total_question}}</td>
                <td class="align-middle">{{$item->marks_per_right_answer}}</td>
                <td class="align-middle">{{$item->marks_per_wrong_answer}}</td>
                <td class="align-middle">{{$item->status}}</td>
                <td class="align-middle m-auto">
                    <a href="../exam/{{$item->id}}" class="btn btn-success">
                        Start Exam
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      @else
        <h3>You didn't enroll any exam yet.</h3>
      @endif
</div>
@endsection