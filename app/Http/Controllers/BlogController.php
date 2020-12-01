<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BlogController extends Controller
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

    //Blog
    public function listBlog(){
        $this->AuthLogin();

        $list_blog = DB::table('tbl_blog')->get();
        $manager_blog = view('Admin.Blogs.list_blog')->with('list_blog', $list_blog);
        return view('admin_layout')->with('Admin.Blogs.list_blog', $manager_blog);
    }

    public function addBlog(){
        $this->AuthLogin();
        return view('Admin.Blogs.add_blog');
    }

    public function saveBlog(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['blog_title'] = $request->blog_title;
        $data['blog_content'] = $request->blog_content;

        $get_image = $request->file('blog_img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_img = current(explode('.',$get_name_image));
            $new_image = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/blog', $new_image);
            $data['blog_img'] = $new_image;
            DB::table('tbl_blog')->insert($data);
            Session::put('message_blog', 'Bài đăng đã được thêm');
            return Redirect::to('list-blog');
        }
        DB::table('tbl_blog')->insert($data);
        Session::put('message_blog', 'Bài đăng đã được thêm');
        return Redirect::to('list-blog');
    }

    public function editBlog($blog_id){
        $this->AuthLogin();

        $edit_blog = DB::table('tbl_blog')->where('blog_id', $blog_id)->get();
        $manager_blog = view('Admin.Blogs.edit_blog')->with('edit_blog', $edit_blog);

        return view('admin_layout')->with('Admin.Blogs.edit_blog', $manager_blog);
    }

    public function updateBlog(Request $request,$blog_id){
        $data = array();
        $data['blog_title'] = $request->blog_title;
        $data['blog_content'] = $request->blog_content;

        $get_image = $request->file('blog_img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_img = current(explode('.',$get_name_image));
            $new_image = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/blog', $new_image);
            $data['blog_img'] = $new_image;
            DB::table('tbl_blog')->where('blog_id', $blog_id)->update($data);
            Session::put('message_blog', 'Bài đăng đã được cập nhật');
            return Redirect::to('list-blog');
        }
        DB::table('tbl_blog')->where('blog_id', $blog_id)->update($data);
        Session::put('message_blog', 'Bài đăng đã được cập nhật');
        return Redirect::to('list-blog');
    }

    public function deleteBlog($blog_id){
        $this->AuthLogin();

        DB::table('tbl_blog')->where('blog_id', $blog_id)->delete();
        Session::put('message_blog', 'Xóa bài đăng thành công');
        return Redirect::to('list-blog');
    }

    
    //====================Front-End====================//

    //Blogs
    public function showBlog(){
        $all_blog = DB::table('tbl_blog')->orderBy('blog_id', 'desc')->paginate(6);
        return view('Pages.Blogs.list_blog')->with('all_blog',$all_blog);      
    }

    public function showBlogDetail($blog_id){
        $trend_blog = DB::table('tbl_blog')->orderBy('blog_id', 'asc')->paginate(6);
        $blog_detail = DB::table('tbl_blog')->where('tbl_blog.blog_id', $blog_id)->get();
        return view('Pages.Blogs.blog_detail')->with('blog_detail',$blog_detail)->with('trend_blog',$trend_blog);        
    }
}
