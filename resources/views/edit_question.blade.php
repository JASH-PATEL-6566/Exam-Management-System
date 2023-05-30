@extends('master')
@section('content')
<div class="container pt-3">
    <form action="../edit_question" method="POST">
        @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{$question->id}}">
        <input type="hidden" name="exam_id" value="{{$question->exam_id}}">
        <div class="mb-3">
            <label for="title" class="fw-medium fw-medium form-label">Question Title</label>
            <input type="text" placeholder="Question Title" value="{{$question->question}}" class="form-control" name="title" id="title" aria-describedby="emailHelp">
        </div>
        <div class="d-flex flex-column-reverse">
        @foreach ($options as $item)
        <div class="mb-3">
            <label for="option{{$item->option}}" class="fw-medium fw-medium form-label">Option {{$item->option}} Title</label>
            <input value="{{$item->title}}" type="text" placeholder="Option {{$item->option}}" class="form-control" name="option{{$item->option}}" id="option{{$item->option}}" aria-describedby="emailHelp" value="{{$item->title}}">
        </div>
        @endforeach
        </div>
        
        <?php
            $ans = $question->answer;
            $num = "";
            foreach($options as $item){
                if($item->title == $ans) $num = $item->option."";
            }
            
        ?>
        <div class="mb-3">
            <label for="right" class="fw-medium form-label">Right Options</label>
            <select id="right" name="right" class="form-select">
                <?php 
                $i = 1;
                    for($i=1;$i<=4;$i++){
                        if($num == $i){
                            echo "<option selected value=".$i.">".$i." Option</option>";
                        }
                        else{
                            echo "<option value=".$i.">".$i." Option</option>";
                        }
                    }
                ?>   
            </select>
        </div>  
    </div>
    <div class="gap-2 d-flex w-100 justify-content-end mb-3">
      <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Edit</button>
    </div>
    </form>
</div>
@endsection