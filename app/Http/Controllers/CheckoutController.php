<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function loginCheckout(){
        return view('Pages.Users.login_checkout');
    }



    public function register(Request $request){
        $data = array();
        $data['student_username'] = $request->student_username;
        $data['student_name'] = $request->student_name;
        $data['student_email'] = $request->student_email;
        $data['student_password'] = md5($request->student_password);

    	$student_id = DB::table('tbl_student')->insertGetId($data);

    	Session::put('student_id',$student_id);
		Session::put('student_username',$request->student_username);
		Session::put('message_register', 'Đăng ký thành công');
    	return Redirect::to('/login-checkout');
    }

    public function studentLogin(Request $request){
    	$student_username = $request->student_username;
    	$student_password = md5($request->student_password);
    	$result = DB::table('tbl_student')->where('student_username',$student_username)->where('student_password',$student_password)->first();

    	if($result){
    		Session::put('student_id',$result->student_id);
    		return Redirect::to('/khoa-hoc');
    	}else{
            Session::put('message_student', 'Tên đăng nhập hoặc mật khẩu không đúng!');
    		return Redirect::to('/login-checkout');
    	}
	}
	

    public function logoutCheckout(){
    	Session::flush();
    	return Redirect::to('/login-checkout');
    }
}
