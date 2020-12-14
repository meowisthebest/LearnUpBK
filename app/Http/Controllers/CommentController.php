<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CommentController extends Controller
{
     //Auth
     public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    //Comment Front-End
    public function saveComment(Request $request){
        $data = array();
        $data['course_id'] = $request->course_id;
        $data['fee_text'] = $request->comment;
        $data['student_id'] = Session::get('student_id');
        $data["created_at"] =  \Carbon\Carbon::now(); # new \Datetime()

        DB::table('tbl_feedback')->insert($data);
        Session::put('message_comment', 'Thêm bình luận thành công');
        // return Redirect::to('list-course');
        return back()->withInput();
    }


    //Comment Back-End
    public function viewComment($course_id){
        $this->AuthLogin();
        $course_name = DB::table('tbl_course')->where('tbl_course.course_id', $course_id)->limit(1)->get();

        $view_comment = DB::table('tbl_feedback')
        ->select('*','tbl_feedback.created_at')
        ->join('tbl_student','tbl_student.student_id','=','tbl_feedback.student_id')
        ->join('tbl_course','tbl_feedback.course_id','=','tbl_course.course_id')
        ->where('tbl_course.course_id', $course_id)->orderBy('fee_id', 'desc')->get()
        ;

        $manager_feedback = view('Admin.Comment.view_comment')->with('view_comment', $view_comment)->with('course_name', $course_name);

        return view('admin_layout')
        ->with('Admin.Comment.view_comment', $manager_feedback)
        ->with('course_name', $course_name);
    }

    public function deleteComment($fee_id){
        $this->AuthLogin();

        DB::table('tbl_feedback')->where('fee_id', $fee_id)->delete();
        Session::put('message_comment', 'Xóa bình luận thành công');
        // return Redirect::to('list-course');
        return back()->withInput();
        
    }
}
