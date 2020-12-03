<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CourseController extends Controller
{

    //====================Back-End====================//
    //Auth
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    //Course
    public function listCourse(){
        $this->AuthLogin();
        $list_course = DB::table('tbl_course')
        ->join('tbl_category','tbl_category.category_id', '=' ,'tbl_course.category_id')
        ->orderBy('tbl_course.course_id','desc')->get();


        $manager_course = view('Admin.Courses.list_course')->with('list_course', $list_course);
        return view('admin_layout')->with('Admin.Courses.list_course', $manager_course);
    }

    public function addCourse(){
        $this->AuthLogin();
        //Hiển thị phần select option cho danh mục và thương hiệu
        $category = DB::table('tbl_category')->orderBy('category_id', 'desc')->get();

        return view('Admin.Courses.add_course')->with('category', $category);
    }

    public function saveCourse(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['course_name'] = $request->course_name;
        $data['category_id'] = $request->course_cate;
        $data['course_lever'] = $request->course_lever;
        $data['course_overview'] = $request->course_overview;
        $data['course_learned'] = $request->course_learned;

        $get_image = $request->file('course_img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_img = current(explode('.',$get_name_image));
            $new_image = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/course', $new_image);
            $data['course_img'] = $new_image;
            DB::table('tbl_course')->insert($data);
            Session::put('message_course', 'Khóa học đã được thêm');
            return Redirect::to('list-course');
        }
        DB::table('tbl_course')->insert($data);
        Session::put('message_course', 'Khóa học đã được thêm');
        return Redirect::to('list-course');
    }

    public function editCourse($course_id){
        $this->AuthLogin();

        $category = DB::table('tbl_category')->orderBy('category_id', 'desc')->get();
        $edit_course = DB::table('tbl_course')->where('course_id', $course_id)->get();
        $manager_course = view('Admin.Courses.edit_course')->with('edit_course', $edit_course)->with('category', $category);

        return view('admin_layout')->with('Admin.Courses.edit_course', $manager_course);
    }

    public function updateCourse(Request $request,$course_id){
        $data = array();
        $data['course_name'] = $request->course_name;
        $data['category_id'] = $request->course_cate;
        $data['course_lever'] = $request->course_lever;
        $data['course_overview'] = $request->course_overview;
        $data['course_learned'] = $request->course_learned;
        $get_image = $request->file('course_img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_img = current(explode('.',$get_name_image));
            $new_image = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/course', $new_image);
            $data['course_img'] = $new_image;
            DB::table('tbl_course')->where('course_id', $course_id)->update($data);
            Session::put('message_course', 'Khóa học đã được cập nhật');
            return Redirect::to('list-course');
        }
        DB::table('tbl_course')->where('course_id', $course_id)->update($data);
        Session::put('message_course', 'Khóa học đã được cập nhật');
        return Redirect::to('list-course');
    }

    public function deleteCourse($course_id){
        $this->AuthLogin();

        DB::table('tbl_course')->where('course_id', $course_id)->delete();
        Session::put('message_course', 'Xóa khóa học thành công');
        return Redirect::to('list-course');
    }


    //====================Front-End====================//

    //Course
    public function showCourse(){
        $category = DB::table('tbl_category')->orderBy('category_id', 'asc')->get();

        $all_course = DB::table('tbl_course')->orderBy('course_id', 'desc')->paginate(5);

        return view('Pages.Courses.all_course')->with('category', $category)->with('course',$all_course);         
    }

    public function courseDetail($course_id){
        $course_detail = DB::table('tbl_course')
        ->join('tbl_category','tbl_category.category_id', '=','tbl_course.category_id')
        ->where('tbl_course.course_id', $course_id)->get();

        $chappter_course = DB::table('tbl_chappter')
        ->join('tbl_course','tbl_course.course_id','=','tbl_chappter.course_id')    
        ->where('tbl_course.course_id', $course_id)->get();

        foreach($chappter_course as $value1){
            $chappter_id = $value1->chappter_id;
        }

        $chappter_name = DB::table('tbl_chappter_content')
        ->join('tbl_chappter','tbl_chappter_content.chappter_id','=','tbl_chappter.chappter_id')    
        ->where('tbl_chappter.chappter_id', $chappter_id)->get();

        return view('Pages.Courses.course_detail')
        ->with('course_detail',$course_detail)
        ->with('chappter_course',$chappter_course)
        ->with('chappter_name', $chappter_name);   
    }
    
    public function errCourse($course_id){
        $err_data = array();
        $err_data['student_id'] = Session::get('student_id');
        $err_data['course_id'] = $course_id;
        DB::table('tbl_student_err')->insert($err_data);
        return redirect()->route('viewLearn', [$course_id]);
    }

    public function viewLearn($course_id){
        $course_detail = DB::table('tbl_course')
        ->join('tbl_category','tbl_category.category_id', '=','tbl_course.category_id')
        ->where('tbl_course.course_id', $course_id)->get();

        $chappter_course = DB::table('tbl_chappter')
        ->join('tbl_course','tbl_course.course_id','=','tbl_chappter.course_id')    
        ->where('tbl_course.course_id', $course_id)->get();

        foreach($chappter_course as $key){
            $chappter_id = $key->chappter_id;
        }
        
        $chappter_name = DB::table('tbl_chappter_content')
        ->select('tbl_chappter_content.chappter_content_name','tbl_chappter_content.chappter_content_link')
        ->join('tbl_chappter','tbl_chappter_content.chappter_id','=','tbl_chappter.chappter_id')    
        ->where('tbl_chappter.chappter_id', $chappter_id)->get();

        $chappter_link = DB::table('tbl_chappter_content')
        ->select('tbl_chappter_content.chappter_content_link')
        ->join('tbl_chappter','tbl_chappter_content.chappter_id','=','tbl_chappter.chappter_id')    
        ->where('tbl_chappter.chappter_id', $chappter_id)->limit(1)->get();

        return view('Pages.Courses.learn_course')
        ->with('course_detail',$course_detail)
        ->with('chappter_course',$chappter_course)
        ->with('chappter_link',$chappter_link)
        ->with('chappter_name', $chappter_name);
    }
}
