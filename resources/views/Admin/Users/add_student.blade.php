@extends('admin_layout')
@section('admin_content')
<div class="row">
              
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card text-left shadow">
          <form role="form" id="addStudent" enctype="multipart/form-data" action="{{URL::to('/save-user')}}" method="post">
            {{@csrf_field()}}
            
              <div class="card-header py-3 d-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Thêm tài khoản người dùng</h6>
                  <div>
                    <button type="submit" class="btn btn-primary" >Thêm tài khoản</button>
                    <a href="{{URL::to('/list-account-student')}}" class="btn btn-primary">Trở lại</a>
                  </div>
              </div>         
              <div class="card-body">
                <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="">Tên tài khoản: <span class="error">*</span></label>
                            <input type="text" class="form-control" name="student_username" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="">Mật khẩu: <span class="error">*</span></label>
                            <input type="password" class="form-control" name="student_password" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="">Họ và tên: <span class="error">*</span></label>
                            <input type="text" class="form-control" name="student_name" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="">Email: <span class="error">*</span></label>
                            <input type="email" class="form-control" name="student_email" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="">Số điện thoại: <span class="error">*</span></label>
                            <input type="number" class="form-control" name="student_phone" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="">Địa chỉ: <span class="error">*</span></label>
                            <input type="text" class="form-control" name="student_address" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="">Giới thiệu: </label>
                            <br>
                            <textarea name="student_introduce" class="w-100" rows="5"></textarea>
                        </div>
                        <div class="text-right">
                          <span>Lưu ý: <span class="error">*</span> là bắt buộc nhập</span>              
                        </div>
                      </div>
                </div>                   
              </div>
          </form>
        </div>
      
       
    </div>
</div>
<script>
  $(document).ready(function() {
    $("#addStudent").validate({
      onfocusout: false,
      onkeyup: false,
      onclick: false,
      rules: {
        "student_username": {
          required: true,
          minlength: 5
        },
        "student_password": {
          required: true
        },
        "student_name": {
          required: true
        },
        "student_email": {
          required: true
        },
        "student_phone": {
          required: true,
        },
        "student_address": {
          required: true
        }
      },
      messages: {
        "student_username": {
          required: "Hãy nhập tên tài khoản",
          minlength: "Hãy nhập tối thiểu 5 ký tự"
        },
        "student_password": {
          required: "Vui lòng nhập mật khẩu",
          minlength: "Hãy nhập tối thiểu 5 ký tự"
        },
        "student_name": {
          required: "Vui lòng nhập họ và tên"
        },
        "student_email": {
          required: "Vui lòng nhập email"
        },
        "student_phone": {
          required: "Bạn chưa nhập số điện thoại"
        },
        "student_address": {
          required: "Bạn chưa nhập địa chỉ"
        }
      }
    });
  });
</script>
@endsection
