@extends('admin_layout')
@section('admin_content')

{{-- <!-- Page Heading -->    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @foreach ($course_name as $key => $course_name)
    <h1 class="h3 mb-0">Khóa: <span class="text-danger">{{$course_name->course_name}}</span></h1>
    @endforeach
</div>  --}}

<?php
    $message_chappter = Session::get('message_chappter');
    if($message_chappter){
        echo '<div class="alert alert-success alert-dismissible out4s" role="alert"> 
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                .$message_chappter.
             '</div>';  
        Session::put('message_chappter', null);
    };
?>
<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Thêm chương
                    </h6>
                  </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                        <form action="{{URL::to('/save-chappter')}}" method="post" id="addChappter" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Tên chương <span class="error">*</span></label>
                                <input type="text" name="chappter_name" class="form-control"> 
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Khóa học <span class="error">*</span></label>
                                <select name="course_id" class="form-control">
                                    <option value="">-- Chọn khóa học --</option>
                                    @foreach ($course as $key => $course)
                                    <option selected value="{{$course->course_id}}">{{$course->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <button type="submit" name="add_chappter" class="btn btn-primary">Thêm chương mới</button>
                                <a onClick="history.go(-1);" class="btn btn-primary">Trở lại</a>  
                            </div>

                            <div class="text-right">
                                <span>Lưu ý: <span class="error">*</span> là bắt buộc nhập</span>              
                            </div>
                        </form>
                        </div>                      
                    </div>
                </div>

            </div>
    </div>
</div>

<script>
    $(document).ready(function() {
      $("#addChappter").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
          "chappter_name": {
            required: true,
            minlength: 5
          },
          "course_id": {
            required: true
          }
        },
        messages: {
          "chappter_name": {
            required: "Hãy nhập tên chương",
            minlength: "Hãy nhập tối thiểu 5 ký tự"
          },
          "course_id": {
            required: "Vui lòng chọn tên khóa học"
          }
        }
      });
    });
</script>

@endsection