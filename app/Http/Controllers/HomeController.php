<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    //Hiển thị khóa học & danh mục ra home
    public function index(){
        $category = DB::table('tbl_category')->orderBy('category_id', 'asc')->limit(6)->get();

        //Khóa học nổi bật
        $course = DB::table('tbl_course')->orderBy('course_id', 'asc')->limit(6)->get();

        //Khóa học mới nhất
        $new_course = DB::table('tbl_course')->orderBy('course_id', 'desc')->limit(6)->get();

        return view('index')->with('category', $category)->with('course',$course)->with('newcourse',$new_course);
    }

    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $category = DB::table('tbl_category')->orderBy('category_id', 'asc')->limit(6)->get();


        $search_course = DB::table('tbl_course')->where('course_name','like','%'.$keywords.'%')->paginate(5); 


        return view('Pages.Courses.search_course')->with('category',$category)->with('search_course',$search_course);

    }

    

    public function saveEmail(Request $request){
        $data = array();
        $data['email'] = $request->email;
        DB::table('tbl_listemail')->insert($data);
        return back()->withInput();
    }

    public function showContact(){
        return view('Pages.Contacts.contact');
    }

    public function saveContact(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['title'] = $request->title;
        $data['message'] = $request->message;
        DB::table('tbl_contact')->insert($data);
        Session::put('message_contact', 'LearnUp đã nhận được tin nhắn. Chúng tôi sẽ phản hồi lại sớm nhất có thể. Xin cảm ơn!!');
        return back()->withInput();
    }
}
