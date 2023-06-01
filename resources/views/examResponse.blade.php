@extends('master')
@section('content')     
<?php
    $total = 0;
?>
<div class="container mt-4">
    <div class="headerContainer d-flex justify-content-between mb-4">
        <h3>Exam Result</h3>
        <a class="btn btn-primary" href="/user">Back</a>
    </div>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Question</th>
            <th scope="col">Option 1</th>
            <th scope="col">Option 2</th>
            <th scope="col">Option 3</th>
            <th scope="col">option 4</th>
            <th scope="col">Your Answer</th>
            <th scope="col">Answer</th>
            <th scope="col">Result</th>
            <th scope="col">Marks</th>
          </tr>
        </thead>
        <tbody>
                @foreach ($allData as $item)
                        <tr>
                            <th class="align-middle" scope="row">{{$item->question}}</th>
                            @foreach ($options as $opt)
                            @if ($opt['question_id'] == $item->question_id) 
                            <td class="align-middle">{{$opt['title']}}</td>
                            @endif
                            @endforeach
                            <td class="align-middle">{{$item->user_answer_option}}</td>
                            <td class="align-middle">{{$item->answer}}</td>

                            @if ($item->user_answer_option == $item->answer)
                            <?php $total = $total + $item->marks_per_right_answer ?>
                            <td class="align-middle text-success">Right</td> 
                            <td class="align-middle">{{$item->marks_per_right_answer}}</td>
                            @else
                            <?php $total = $total - $item->marks_per_wrong_answer ?> 
                            <td class="align-middle text-danger">Wrong</td> 
                            <td class="align-middle">-{{$item->marks_per_wrong_answer}}</td>
                            @endif
                        </tr>
                @endforeach
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Total :</td>
                    <td>{{$total}}</td>
                </tr>
        </tbody>
      </table>
</div>
@endsection