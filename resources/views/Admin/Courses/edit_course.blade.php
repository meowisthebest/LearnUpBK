@extends('admin_layout')
@section('admin_content')
<div class="row">            
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
        @foreach ($edit_course as $key => $course)
        <form action="{{URL::to('/update-course/'.$course->course_id)}}" method="post" id="main-form" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Sửa khóa học
                    </h6>
                  </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label>Tên khóa học</label>
                            <input type="text" name="course_name" value="{{$course->course_name}}" class="form-control">
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <br>
                                <input id="img" type="file" name="course_img" class="form-control hidden" onchange="changeImg(this)">
                                <img id="avatar" class="thumbnail" src="{{URL::to('public/uploads/course/'.$course->course_img)}}">	
                            </div>											
                        </div>

                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 form-group">
                            <label>Cấp độ yêu cầu</label>
                            <select  name="course_lever" class="form-control">
                                <option value="{{$course->course_lever}}">----- {{$course->course_lever}} -----</option>
                                    <option value="Sơ cấp">
                                        Sơ cấp
                                    </option>
                                    <option value="Trung cấp">
                                        Trung cấp
                                    </option>
                                    <option value="Cao cấp">
                                        Cao cấp
                                </option>
                            </select>

                            <label class="mt-3">Danh mục</label>
                            <select  name="course_cate" class="form-control">
                                @foreach ($category as $key => $cate)
                                            @if ($cate->category_id == $course->category_id)
                                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label>Tổng quan về khóa học</label>
                            <textarea type="text" rows="8" name="course_overview" class="form-control" id="ckeditorOverview">{{$course->course_overview}}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label>Bạn sẽ học được gì</label>
                            <textarea type="text" rows="8" name="course_learned" class="form-control" id="ckeditorLearned">{{$course->course_learned}}</textarea>
                        </div>
                    </div>

                    <div>
                        <button name="update_course" class="btn btn-primary" type="submit">Cập nhật khóa học </button>
                        <a class="btn btn-primary" href="{{URL::to('/list-course')}}">Trở Về</a>
                    </div>
                </div>

            </div>
        </form>
        @endforeach
    </div>
  </div>

@endsection
