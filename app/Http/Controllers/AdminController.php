<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
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

    //Index
    public function index()
    {
        return view('admin_login');
    }

    //Dashboard
    public function showDashboard(){
        $this->AuthLogin();

        $count_course = DB::table('tbl_course')->select('course_id')->count();
        $count_student = DB::table('tbl_student')->select('student_id')->count();
        $count_admin = DB::table('tbl_admin')->select('admin_id')->count();
        $count_email = DB::table('tbl_listemail')->select('email_id')->count();
        $count_message = DB::table('tbl_contact')->select('contact_id')->count();
        $count_blog = DB::table('tbl_blog')->select('blog_id')->count();     

        $manager_course = view('Admin.Dashboard.dashboard')
        ->with('count_course', $count_course)
        ->with('count_student',$count_student)
        ->with('count_admin',$count_admin)
        ->with('count_email',$count_email)
        ->with('count_message',$count_message)
        ->with('count_blog',$count_blog)
        ;
        return view('admin_layout')->with('Admin.Dashboard.dashboard', $manager_course);

    }

    //Check Login
    public function dashboard(Request $request){
        $admin_username = $request->admin_username;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_username',$admin_username)->where('admin_password',$admin_password)->first();

        if($result){
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message_admin', 'Tên đăng nhập hoặc mật khẩu không đúng!');
            return Redirect::to('/admin');
        }
    }

    //Logout
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }


    
}
