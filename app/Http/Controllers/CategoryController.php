<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController extends Controller
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

    //Category
    public function listCategory(){
        $this->AuthLogin();

        $list_category = DB::table('tbl_category')->get();
        $manager_category = view('Admin.Categories.list_category')->with('list_category', $list_category);
        return view('admin_layout')->with('Admin.Categories.list_category', $manager_category);
    }

    public function addCategory(){
        $this->AuthLogin();

        return view('Admin.Categories.add_category');
    }

    public function saveCategory(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request->category_name;

        $get_image = $request->file('category_img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_img = current(explode('.',$get_name_image));
            $new_image = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/category', $new_image);
            $data['category_img'] = $new_image;
            DB::table('tbl_category')->insert($data);
            Session::put('message_category', 'Danh mục đã được thêm');
            return Redirect::to('list-category');
        }
        DB::table('tbl_category')->insert($data);
        Session::put('message_category', 'Danh mục đã được thêm');
        return Redirect::to('list-category');
    }

    public function editCategory($category_id){
        $this->AuthLogin();

        $edit_category = DB::table('tbl_category')->where('category_id', $category_id)->get();
        $manager_category = view('Admin.Categories.edit_category')->with('edit_category', $edit_category);

        return view('admin_layout')->with('Admin.Categories.edit_category', $manager_category);
    }

    public function updateCategory(Request $request,$category_id){
        $data = array();
        $data['category_name'] = $request->category_name;
        $get_image = $request->file('category_img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_img = current(explode('.',$get_name_image));
            $new_image = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/category', $new_image);
            $data['category_img'] = $new_image;
            DB::table('tbl_category')->where('category_id', $category_id)->update($data);
            Session::put('message_category', 'Danh mục đã được cập nhật');
            return Redirect::to('list-category');
        }
        DB::table('tbl_category')->where('category_id', $category_id)->update($data);
        Session::put('message_category', 'Danh mục đã được cập nhật');
        return Redirect::to('list-category');
    }

    public function deleteCategory($category_id){
        $this->AuthLogin();

        DB::table('tbl_category')->where('category_id', $category_id)->delete();
        Session::put('message_category', 'Xóa danh mục thành công');
        return Redirect::to('list-category');
    }


    
    public function showCategoryHome($category_id){
        $category = DB::table('tbl_category')->orderBy('category_id', 'asc')->get();
        $category_by_id = DB::table('tbl_course')
        ->join('tbl_category','tbl_course.category_id', '=', 'tbl_category.category_id')
        ->where('tbl_course.category_id',$category_id)->paginate(5);

        //Lấy tên danh mục
        $category_name = DB::table('tbl_category')->where('tbl_category.category_id', $category_id)->limit(1)->get();


        return view('Pages.Categories.filter_category')
        ->with('category', $category)
        ->with('category_by_id', $category_by_id)
        ->with('category_name', $category_name);
    }
}
