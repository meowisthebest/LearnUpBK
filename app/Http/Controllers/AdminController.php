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
        return view('Admin.Dashboard.dashboard');
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
            Session::put('message', 'Mật khẩu hoặc tài khoản sai');
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
