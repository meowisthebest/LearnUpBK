<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class EmailController extends Controller
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

    //Email
    public function listEmail(){
        $this->AuthLogin();

        $list_email = DB::table('tbl_listemail')->get();
        $manager_email = view('Admin.Email.list_email')->with('list_email', $list_email);
        return view('admin_layout')->with('Admin.Email.list_email', $manager_email);
    }

    //Message
    public function listMessage(){
        $this->AuthLogin();

        $list_message = DB::table('tbl_contact')->get();
        $manager_message = view('Admin.Email.list_message')->with('list_message', $list_message);
        return view('admin_layout')->with('Admin.Email.list_message', $manager_message);
    }
}
