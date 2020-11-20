@extends('admin_layout')
@section('admin_content')
<div class="row">            
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
        <form action="{{URL::to('/save-course')}}" method="post" id="main-form" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Thêm khóa học
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label>Tên khóa học</label>
                            <input type="text" name="course_name" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <br>
                                <input id="img" type="file" name="course_img" class="form-control hidden" onchange="changeImg(this)">
                                <img id="avatar" class="thumbnail" src="{{('public/Admin/img/co-1.jpg')}}">	
                            </div>											
                        </div>

                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 form-group">
                            <label>Cấp độ yêu cầu</label>
                            <select  name="course_lever" class="form-control">
                                <option value="">-- Chọn cấp độ --</option>
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

                            <label>Danh mục</label>
                            <select  name="course_cate" class="form-control">
                                <option value="">-- Chọn danh mục --</option>
                                    @foreach ($category as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label>Tổng quan về khóa học</label>
                            <textarea type="text" rows="8" name="course_overview" class="form-control" id="exampleInputPassword1"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label>Bạn sẽ học được gì</label>
                            <textarea type="text" rows="8" name="course_learned" class="form-control" id="exampleInputPassword1"></textarea>
                        </div>
                    </div>

                    <div>
                        <button name="add_course" class="btn btn-primary" type="submit">Thêm khóa học </button>
                        <a class="btn btn-primary" href="{{URL::to('/list-course')}}">Trở Về</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
