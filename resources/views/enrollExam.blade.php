@extends('master')
@section('content')     
<div class="container mt-4">
    <h3>Enroll Exam</h3>
    <form action="../enrollExam" method="post" class="border p-4 w-50">
        @csrf
        <div class="mb-3 mt-4">
            <label for="exam_id" class="fw-medium form-label">Select Exam</label>
            <select id="exam_id" name="exam_id" class="form-select" onchange="onChangeExam(this)">
              <option selected>Select</option>
              @foreach ($exams as $item)
                <option value="{{$item->id}}">{{$item->exam_title}}</option>
              @endforeach
            </select>
        </div> 
        <p id="msg" style="display: none" class="alert alert-danger" role="alert"></p> 
        <button id="submit" type="submit" class="btn btn-primary">Enrol</button>
    </form>
</div>
<script>
  function onChangeExam(e){

    var button = document.getElementById("submit");
    var msg = document.getElementById("msg");

    var id = e.value;
    var xhr = new XMLHttpRequest();
    xhr.open('get', "/checkEnrol?exam_id="+id, true);
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    var response = JSON.parse(xhr.responseText);  
    var data = response.enrolData;

    if(data.length > 0){
      button.disabled = true;
      msg.style.display = "block"; 
      msg.innerHTML = "You already enrol for this exam.";
    }else{
      msg.style.display = "none"; 
      button.disabled = false;
    }
    
  }
}
xhr.send();
  }
  
</script>
@endsection