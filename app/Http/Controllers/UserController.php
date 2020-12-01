<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserController extends Controller
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

    //Admin
    public function showAdmin(){
        $this->AuthLogin();

        $list_admin = DB::table('tbl_admin')->get();
        $manager_admin = view('Admin.Users.list_admin')->with('list_admin', $list_admin);
        return view('admin_layout')->with('Admin.Users.list_admin', $manager_admin);
    }

    public function addAdmin(){
        $this->AuthLogin();

        return view('Admin.Users.add_admin');
    }

    public function saveAdmin(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['admin_username'] = $request->admin_username;
        $data['admin_password'] = md5($request->admin_password);
        $data['admin_name'] = $request->admin_name;
        $data['admin_phone'] = $request->admin_phone;
        $data['admin_address'] = $request->admin_address;

        DB::table('tbl_admin')->insert($data);
        Session::put('message_admin', 'Tài khoản đã được thêm thành công');
        return Redirect::to('list-account-admin');
    }

    public function editAdmin($admin_id){
        $this->AuthLogin();

        $edit_admin = DB::table('tbl_admin')->where('admin_id', $admin_id)->get();
        $manager_admin = view('Admin.Users.edit_admin')->with('edit_admin', $edit_admin);

        return view('admin_layout')->with('Admin.Users.edit_admin', $manager_admin);
    }

    public function updateAdmin(Request $request,$admin_id){
        $data = array();
        $data['admin_username'] = $request->admin_username;
        $data['admin_password'] = md5($request->admin_password);
        $data['admin_name'] = $request->admin_name;
        $data['admin_phone'] = $request->admin_phone;
        $data['admin_address'] = $request->admin_address;

        DB::table('tbl_admin')->where('admin_id', $admin_id)->update($data);
        Session::put('message_admin', 'Tài khoản đã được cập nhật');
        return Redirect::to('list-account-admin');
    }

    public function deleteAdmin($admin_id){
        $this->AuthLogin();

        DB::table('tbl_admin')->where('admin_id', $admin_id)->delete();
        Session::put('message_admin', 'Xóa tài khoản thành công');
        return Redirect::to('list-account-admin');
    }

    //User
    public function showUser(){
        $this->AuthLogin();

        $list_student = DB::table('tbl_student')->get();
        $manager_student = view('Admin.Users.list_student')->with('list_student', $list_student);
        return view('admin_layout')->with('Admin.Users.list_student', $manager_student);
    }

    public function addUser(){
        $this->AuthLogin();

        return view('Admin.Users.add_student');
    }

    public function saveUser(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['student_username'] = $request->student_username;
        $data['student_password'] = md5($request->student_password);
        $data['student_name'] = $request->student_name;
        $data['student_email'] = $request->student_email;
        $data['student_phone'] = $request->student_phone;
        $data['student_address'] = $request->student_address;
        $data['student_introduce'] = $request->student_introduce;

        DB::table('tbl_student')->insert($data);
        Session::put('message_user', 'Tài khoản đã được thêm thành công');
        return Redirect::to('list-account-user');
    }

    public function editUser($student_id){
        $this->AuthLogin();

        $edit_student = DB::table('tbl_student')->where('student_id', $student_id)->get();
        $manager_student = view('Admin.Users.edit_student')->with('edit_student', $edit_student);

        return view('admin_layout')->with('Admin.Users.edit_student', $manager_student);
    }

    public function updateUser(Request $request,$student_id){
        $data = array();
        $data['student_username'] = $request->student_username;
        $data['student_password'] = md5($request->student_password);
        $data['student_name'] = $request->student_name;
        $data['student_email'] = $request->student_email;
        $data['student_phone'] = $request->student_phone;
        $data['student_address'] = $request->student_address;
        $data['student_introduce'] = $request->student_introduce;
        DB::table('tbl_student')->where('student_id', $student_id)->update($data);
        Session::put('message_user', 'Tài khoản đã được cập nhật');
        return Redirect::to('list-account-user');
    }


    public function deleteUser($student_id){
        $this->AuthLogin();

        DB::table('tbl_student')->where('student_id', $student_id)->delete();
        Session::put('message_user', 'Xóa tài khoản thành công');
        return Redirect::to('list-account-user');
    }


    //====================Front-End====================//

    //Course
    public function showInfoUser($student_id){
        $view = DB::table('tbl_student')->where('student_id', $student_id)->get();
        $manager_student = view('Pages.Users.info_user')->with('view', $view);

        return view('page_layout')->with('Pages.Users.info_user', $manager_student);

        // return view('Pages.Users.info_user');         
    }

    public function showMyCourse($student_id){
        $view_info = DB::table('tbl_student')->where('student_id', $student_id)->get();

        $view_course = DB::table('tbl_student_err')
        ->join('tbl_course','tbl_course.course_id','=','tbl_student_err.course_id')
        ->where('student_id', $student_id)->paginate(5);


        $manager_student = view('Pages.Users.my_course')
        ->with('view', $view_course)
        ->with('view_info', $view_info);

        return view('page_layout')->with('Pages.Users.my_course', $manager_student);       
    }


    public function updateInfoUser(Request $request,$student_id){
        $data = array();
        // $data['student_username'] = $request->student_username;
        // $data['student_password'] = md5($request->student_password);
        $data['student_name'] = $request->student_name;
        $data['student_email'] = $request->student_email;
        $data['student_phone'] = $request->student_phone;
        $data['student_address'] = $request->student_address;
        $data['student_introduce'] = $request->student_introduce;
        DB::table('tbl_student')->where('student_id', $student_id)->update($data);
        Session::put('message_user', 'Tài khoản đã được cập nhật');
        return back()->withInput();
        // return view('Pages.Users.info_user');   

    }
}
