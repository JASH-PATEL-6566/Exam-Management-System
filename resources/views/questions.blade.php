@extends('master')
@section('content')     
<div class="container mt-4">
    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#create_exam">
        Add Question
    </button>
    <div class="modal fade" id="create_exam" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Question</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../addQuestion" method="POST">
                @csrf
                <input type="hidden" name="exam_id" value="{{$id}}">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="fw-medium fw-medium form-label">Question Title</label>
                    <input type="text" placeholder="Question Title" class="form-control" name="title" id="title" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="option1" class="fw-medium fw-medium form-label">Option 1 Title</label>
                    <input type="text" placeholder="Option 1" class="form-control" name="option1" id="option1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="option2" class="fw-medium fw-medium form-label">Option 2 Title</label>
                    <input type="text" placeholder="Option 2" class="form-control" name="option2" id="option2" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="option3" class="fw-medium fw-medium form-label">Option 3 Title</label>
                    <input type="text" placeholder="Option 3" class="form-control" name="option3" id="option3" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="option4" class="fw-medium fw-medium form-label">Option 4 Title</label>
                    <input type="text" placeholder="Option 4" class="form-control" name="option4" id="option4" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="right" class="fw-medium form-label">Right Options</label>
                    <select id="right" name="right" class="form-select">
                      <option selected>Select</option>
                      <option value="1">1 Option</option>
                      <option value="2">2 Option</option>
                      <option value="3">3 Option</option>
                      <option value="4">4 Option</option>   
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
      @if (count($questions) > 0)
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Question</th>
            <th scope="col">Right Option</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($questions as $item)    
            <tr>
                <th class="align-middle" scope="row">{{$item->id}}</th>
                <td class="align-middle">{{$item->question}}</td>
                <td class="align-middle">{{$item->answer}}</td>
                <td class="align-middle m-auto">
                    <a href="../edit_question/{{$item->id}}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="/delete_question/{{$item->id}}_{{$id}}" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      @else
        <h3>You didn't create any question yet.</h3>
      @endif
</div>
@endsection