@extends('admin_layout')
@section('admin_content')
<div class="row">            
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
        <form action="{{URL::to('/save-course')}}" method="post" id="addCourse" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Thêm khóa học
                    </h6>

                    <span>Lưu ý: <span class="error">*</span> là bắt buộc nhập</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label>Tên khóa học <span class="error">*</span></label>
                            <input type="text" name="course_name" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Ảnh sản phẩm <span class="error">*</span></label>
                                <br>
                                <input id="img" type="file" name="course_img" class="form-control hidden" onchange="changeImg(this)">
                                <img id="avatar" class="thumbnail" src="{{('public/Admin/img/co-1.jpg')}}">	
                            </div>											
                        </div>

                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 form-group">
                            <label>Cấp độ yêu cầu <span class="error">*</span></label>
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
                            <br>

                            <label>Danh mục <span class="error">*</span></label>
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
                            <label>Tổng quan về khóa học <span class="error">*</span></label>
                            <textarea type="text" rows="8" name="course_overview" class="form-control" id="ckeditorOverview"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label>Bạn sẽ học được gì <span class="error">*</span></label>
                            <textarea type="text" rows="8" name="course_learned" class="form-control" id="ckeditorLearned"></textarea>
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


<script>
    $(document).ready(function() {
      $("#addCourse").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
          "course_name": {
            required: true,
            minlength: 5
          },
          "course_img": {
            required: true
          },
          "course_lever": {
            required: true
          },
          "course_cate": {
            required: true,
          }
        },
        messages: {
          "course_name": {
            required: "Hãy nhập tên khóa học",
            minlength: "Hãy nhập tối thiểu 5 ký tự"
          },
          "course_img": {
            required: "Vui lòng chọn ảnh"
          },
          "course_lever": {
            required: "Vui lòng chọn level"
          },
          "course_cate": {
            required: "Hãy nhập chọn danh mục"
          }
        }
      });
    });
</script>

@endsection
