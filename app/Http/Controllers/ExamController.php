<?php

namespace App\Http\Controllers;

use App\Models\enroll;
use App\Models\exam;
use App\Models\options;
use App\Models\process;
use App\Models\question_answers;
use App\Models\questions;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $process = process::where("user_id",$user_id)->get();

        $enroll = [];
        foreach($data as $item){
            $temp = exam::find($item->exam_id);
            array_push($enroll,$temp);
        }
        return view("User",["enrolExams" => $enroll,"process" => $process]);
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

    function fetchEnrolUserForExam($id){
        $enrollTemp = enroll::where("exam_id",$id)->get();
        $enroll = [];
        foreach($enrollTemp as $item){
            $temp = user::find($item->user_id);
            array_push($enroll,$temp);
        }
        return view("enrolls",["enrolData" => $enroll]);
        // return $enroll;
    }

    function exam($id){
        date_default_timezone_set("Asia/Calcutta");
        $dateTime = date('d-m-Y H:i:s');

        $data = process::where("exam_id",$id)->get();

        if(count($data) == 0){
            $process = new process();
            $process->user_id = Session::get("user")->id;
            $process->exam_id = $id;
            $process->start_time = $dateTime;
            $process->save();

            $time = exam::find($id)->duration;
            $questions = questions::where("exam_id", $id)->get();
            $options = [];
            foreach ($questions as $item) {
                $option = options::where("question_id", $item->id)->get();
                $options = array_merge($options, $option->toArray());
            }
            return view("exam",["exam_id" => $id,"questions" => $questions, "options" => $options,"time" => $time]);
        }
        
        return redirect("user");
    }

    function ExamsResponse(Request $req){
        $exam_id = $req->input("exam_id");
        $userId = Session::get("user")->id;
        $examData = exam::find($exam_id);
        $right_marks = $examData->marks_per_right_answer;
        $wrong_marks = $examData->marks_per_wrong_answer;

        $allQuestions = questions::where("exam_id",$exam_id)->get();
        foreach($allQuestions as $item){
            $questionId = $item->id;
            $questionAns = $item->answer;

            $question_answers = new question_answers();
            $question_answers->user_id = $userId;
            $question_answers->exam_id = $exam_id;
            $question_answers->question_id = $questionId;
            $question_answers->user_answer_option = $req->input("".$questionId);
            if($req->input("".$questionId) == $questionAns){
                $question_answers->marks = $right_marks;
            }
            else{
                $question_answers->marks = $wrong_marks;
            }
            $question_answers->save();
        }

        return redirect("examResponse/$exam_id");
    }

    function fetchExamResponse($id){
        // $data = question_answers::where("exam_id",$id)->get();
        // $questions = questions::where("exam_id",$id)->get();
        // $options = [];
        //     foreach ($questions as $item) {
        //         $option = options::where("question_id", $item->id)->get();
        //         $options = array_merge($options, $option->toArray());
        //     }
        $userId = Session::get("user")->id;

        $data = DB::table('question_answers')
        ->leftjoin('questions', 'question_answers.question_id', '=', 'questions.id')
        // ->leftjoin('options', 'questions.id', '=', 'options.question_id')
        ->leftjoin('exam', 'exam.id', '=', 'questions.exam_id')
        ->where('questions.exam_id', $id)
        ->where('question_answers.user_id', $userId)
        ->get();

        $options = [];
        foreach ($data as $item) {
            $option = options::where("question_id", $item->question_id)->get();
            $options = array_merge($options, $option->toArray());
        }

        return view("examResponse",["allData" => $data,"options" => $options]);
    }
}