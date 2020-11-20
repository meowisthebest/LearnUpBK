<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ChappterController extends Controller
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

    //Chappter
    public function viewChappter($course_id){
        $this->AuthLogin();
        $course_name = DB::table('tbl_course')->where('tbl_course.course_id', $course_id)->limit(1)->get();

        // $course = DB::table('tbl_course')->where('course_id', $course_id)->get();
        $view_chappter = DB::table('tbl_chappter')
        ->join('tbl_course','tbl_course.course_id', '=' ,'tbl_chappter.course_id')
        ->where('tbl_chappter.course_id', $course_id)->get();
        $manager_chappter = view('Admin.Chappter.view_chappter')->with('view_chappter', $view_chappter)->with('course_name', $course_name);

        return view('admin_layout')
        ->with('Admin.Chappter.view_chappter', $manager_chappter)
        // ->with('course', $course)
        ->with('course_name', $course_name);
    }

    public function addChappter(){
        $this->AuthLogin();
        $course_name = DB::table('tbl_course')->limit(1)->get();
        // $course_name = DB::table('tbl_course')->where('tbl_course.course_id', $course_id)->limit(1)->get();

        //Hiển thị phần select option
        $course = DB::table('tbl_course')->orderBy('course_id', 'desc')->get();
        return view('Admin.Chappter.add_chappter')->with('course', $course)->with('course_name', $course_name);
    }

    public function saveChappter(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['chappter_name'] = $request->chappter_name;
        $data['course_id'] = $request->course_id;
        DB::table('tbl_chappter')->insert($data);
        Session::put('message', 'Thêm chương thành công');
        return Redirect::to('add-chappter');
    }

    public function editChappter($chappter_id){
        $this->AuthLogin();
        $course = DB::table('tbl_course')->orderBy('course_id', 'desc')->get();
        $edit_chappter = DB::table('tbl_chappter')->where('chappter_id', $chappter_id)->get();
        $manager_chappter = view('Admin.Chappter.edit_chappter')->with('edit_chappter', $edit_chappter)->with('course', $course);
        return view('admin_layout')->with('Admin.Chappter.edit_chappter', $manager_chappter);
    }

    public function updateChappter(Request $request,$chappter_id){
        $data = array();
        $data['chappter_name'] = $request->chappter_name;
        $data['course_id'] = $request->course_id;

        DB::table('tbl_chappter')->where('chappter_id', $chappter_id)->update($data);
        Session::put('message', 'Chương đã được cập nhật');
        return Redirect::to('list-course');
    }

    public function deleteChappter($chappter_id){
        $this->AuthLogin();

        DB::table('tbl_chappter')->where('chappter_id', $chappter_id)->delete();
        Session::put('message', 'Xóa chương thành công');
        return Redirect::to('list-course');
    }
}
