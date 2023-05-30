<?php

namespace App\Http\Controllers;

use App\Models\options;
use App\Models\questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    function questionsIndex($id){
        $data = questions::where("exam_id",$id)->get();
        return view("questions",["questions" => $data,"id" => $id]);
    }

    function addQuestion(Request $req){
        $examId = $req->input("exam_id");
        $questionTitle = $req->input("title");

        $question = new questions();
        $question->exam_id = $examId;
        $question->question = $questionTitle;
        $option = $req->input("right");
        $question->answer = $req->input("option".$option);
        $question->save();

        $questionId = questions::where("exam_id","=",$examId)->where("question","=",$questionTitle)->pluck('id');
        for($i=1;$i<=4;$i++){
            $optionInstance = new options();
            $optionInstance->question_id = $questionId[0];
            $optionInstance->option = $i;
            $optionInstance->title = $req->input("option".$i);
            $optionInstance->save();
        }

        return redirect("/questions/{{$examId}}");
    }

    function editQuestion($id){
        $data = questions::find($id);
        $options = options::where("question_id",$id)->get();
        return view("/edit_question",["question" => $data,"options" => $options]);
    }

    function editQuestionInfo(Request $req){
        $examId = $req->input("exam_id");
        $questionTitle = $req->input("title");
        $questionId = $req->input("id");

        $question = questions::find($questionId);
        $question->exam_id = $req->input("exam_id");
        $question->question = $questionTitle;
        $option = $req->input("right");
        $question->answer = $req->input("option".$option);
        $question->save();

        $questionId = questions::where("exam_id","=",$examId)->where("question","=",$questionTitle)->pluck('id');
        $options = options::where("question_id",$questionId)->get();
        $i = 4;
        foreach($options as $optionInstance){
            $optionInstance->option = $i;
            $optionInstance->title = $req->input("option".$i);
            $optionInstance->save();
            $i--;
        }
        $url = "/questions"."/".$examId;
        return redirect($url);
    }

    function deleteQuestion($id){
        $ids = explode("_",$id);
        questions::where("id",$ids[0])->delete();
        options::where("question_id",$ids[0])->delete();
        $url = "/questions"."/".$ids[1];
        return redirect($url);
    }
}
