<?php

namespace App\Http\Controllers;

use App\Models\enroll;
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

    function myExamIndex(){
        $user_id = Session::get("user")->id;
        $data = enroll::where("user_id",$user_id)->get();
        $enroll = [];
        foreach($data as $item){
            $temp = exam::find($item->exam_id);
            array_push($enroll,$temp);
        }
        return view("User",["enrolExams" => $enroll]);
    }

    function enrollExamIndex(){
        $data = exam::all();
        return view("enrollExam",["exams" => $data]);
    }

    function enrollInExam(Request $req){
        $enroll = new enroll();
        $enroll->user_id = Session::get("user")->id;
        $enroll->exam_id = $req->input("exam_id");
        $enroll->attendance_status = "absent";
        $enroll->save();
        return redirect("/user");
    }

    function checkEnrol(Request $req){
        $exam_id = $req->query("exam_id");
        $data = enroll::where("exam_id",$exam_id)->get();
        return response()->json(['success'=>'Laravel ajax example is being processed.','enrolData' => $data],200);
    }
}