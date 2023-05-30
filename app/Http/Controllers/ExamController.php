<?php

namespace App\Http\Controllers;

use App\Models\exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    function createExam(Request $req){
        $exam = new exam();
        $exam->exam_title = $req->input("title");
        $exam->user_id = Session::get("admin")->id;
        $exam->duration = $req->input("duration");
        $exam->total_question = $req->input("questions");
        $exam->marks_per_right_answer = $req->input("right_mark");
        $exam->marks_per_wrong_answer = $req->input("wrong_mark");
        $exam->status = $req->input("status");
        $exam->save();
        return redirect("/admin");
    }

    function fetchExam(){
        $user = Session::get("admin")->id;
        $data = exam::where("user_id",$user)->get();
        return view("admin",["exams" => $data]);
    }
    
    function editExamIndex($id){
        $data = exam::find($id);
        return view("/edit_exam",["exam" => $data]);
    }

    function editExam(Request $req){
        $exam = exam::find($req->input("id"));
        $exam->exam_title = $req->input("title");
        $exam->user_id = Session::get("admin")->id;
        $exam->duration = $req->input("duration");
        $exam->total_question = $req->input("questions");
        $exam->marks_per_right_answer = $req->input("right_mark");
        $exam->marks_per_wrong_answer = $req->input("wrong_mark");
        $exam->status = $req->input("status");
        $exam->save();
        return redirect("/admin");
    }
    
    function deleteExam($id){
        exam::where("id",$id)->delete();
        return redirect("/admin");
    }
}