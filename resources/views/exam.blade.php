@extends('master')
@section('content')  

<script>
    $(document).ready(function() {
        var time = document.getElementById("timeFetch").value;
        startTimer(time);
        $("#carouselExample").carousel({
            wrap: false
        });
        
    });

    function startTimer(time) {
	var limit = 2; // time limit
	var countDownDate = new Date().getTime() + (time * 60 * 1000); // 5 minutes from now
	
	// timer
	var timer = setInterval(function() {
		var now = new Date().getTime();
		var distance = countDownDate - now;
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		$('#timer').text(minutes + "m " + seconds + "s ");
		
		// set color red if timer less than 2 minutes
		if (distance < (limit * 60 * 1000)) {
			$('#timer').css("color","#f71616");
		}
		
		// give expired text by down
		if (distance < 0) {
			clearInterval(timer);
			$('#timer').text("EXPIRED");
		}
  	}, 1000);
	
	// reset by click on DOM
	$('html').on('click',function() {
		clearInterval(timer);
		startTimer();
	});
		
}
</script>

<div class='container mt-4 w-70'>
    <input type="hidden" id="questions" value="{{count($questions)}}">
    <input type="hidden" id="options" value="{{count($options)}}">
    <input type="hidden" id="timeFetch" value="{{$time}}">
<?php
    echo "
    <div class='exam_container d-flex flex-row'>
    <div class='carousel-container'>
    <div id='carouselExample' class='carousel slide'>
                <div class='carousel-inner'>";

    $first = 0;
    for($i=0;$i < count($questions) ; $i++){
        $temp = 1;
        if($first == 0){
            echo "<div class='carousel-item active'>";
        }
        else{
            echo "<div class='carousel-item'>";
        }
        echo "<p>".($i+1).".&nbsp;&nbsp;".$questions[$i]['question']. "</p>";

        for($j=count($options) - 1;$j >= 0  ; $j--){
            if($questions[$i]['id'] == $options[$j]['question_id']){
                echo "<div class='form-check'>
                            <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                            <label class='form-check-label' for='flexRadioDefault1'>
                                ".$options[$j]['title']."
                            </label>
                        </div>";
            }
        }

        echo "</div>";
        $first++;
    }
    echo "
    </div>
    </div>
    </div>";
        echo "<div class='carousel-button'>
    <button class='btn btn-secondary' type='button' data-bs-target='#carouselExample' data-bs-slide='prev' onclick='prev()'>  
           Prev
        </button>
        <button class='btn btn-primary' id='btn' type='button' data-bs-target='#carouselExample' data-bs-slide='next' onclick='next()'>
          Next
        </button>
      </div>";
      echo "<div id='timer'>-m -s</div>";
      echo  "</div>";
?>
</div>

<script>
    var questions = document.getElementById("questions").value;
    var btn = document.getElementById("btn");

    var current = 1;
    function next(){
        if(current == questions-1){
            btn.innerHTML = "Submit";
            btn.type = "submit";
        }
        current++;
    }

    function prev(){
        btn.innerHTML = "Next";
        btn.type = "button";
        current--;
    }
</script>
@endsection