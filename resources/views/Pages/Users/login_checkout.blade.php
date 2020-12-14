@extends('page_layout')
@section('pages_content')
<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đăng nhập <span class="text-dark">hoặc</span> Đăng ký</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->
<section class="pt-0">
    <div class="container">			
        <div class="row d-flex justify-content-center">					
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="log_wrap">
                    <h4 class="modal-header-title">
                        <a href="{{URL::to('/trang-chu')}}">
                            <img src="{{URL::to('public/Learnup/assets/img/logo.png')}}" class="img-footer logo" alt="" />
                        </a>
                    </h4>
                    <div class="login-form">
                      <?php
                          $message_student = Session::get('message_student');
                          if($message_student){
                              echo '<div class="alert alert-danger alert-dismissible out4s" role="alert"> 
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                                        .$message_student.
                                    '</div>';  
                              Session::put('message_student', null);
                          };
                      ?>
                        <form id="login_form" action="{{URL::to('/dang-nhap')}}" method="POST">	
                            {{ csrf_field() }}   								
                            <div class="form-group">
                                <label>Tên tài khoản</label>
                                <input type="text" name="student_username" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="student_password" class="form-control">
                            </div>
                            
                            {{-- <div class="social-login mb-3">
                                <ul>
                                    <li>
                                        <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                                        <label for="reg" class="checkbox-custom-label">Lưu thông tin</label>
                                    </li>
                                    <li><a href="#" class="theme-cl">Quên mật khẩu?</a></li>
                                </ul>
                            </div> --}}
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Đăng nhập</button>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="log_wrap">
                    <h4 class="modal-header-title">
                        <a href="{{URL::to('/trang-chu')}}">
                            <img src="{{URL::to('public/Learnup/assets/img/logo.png')}}" class="img-footer logo" alt="" />
                        </a>
                    </h4>
                    <div class="login-form">
                      <?php
                          $message_register = Session::get('message_register');
                          if($message_register){
                              echo '<div class="alert alert-success alert-dismissible out4s" role="alert"> 
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                                        .$message_register.
                                    '</div>';  
                              Session::put('message_register', null);
                          };
                      ?>
                    <form id="register_form" action="{{URL::to('/dang-ky')}}" method="POST">    
                        {{ csrf_field() }}             
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" name="student_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">										
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="student_email" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Tên tài khoản</label>
                            <input type="text" name="student_username" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="student_password" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width pop-login">Đăng ký</button>
                        </div>
                    
                    </form>
                </div>
                </div>
            </div>

        </div>
        
    </div>
</section>

<script>
    $(document).ready(function() {
      $("#login_form").validate({
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
          }
        },
        messages: {
          "student_username": {
            required: "Bạn chưa điền tên đăng nhập",
            minlength: "Hãy nhập tối thiểu 5 ký tự"
          },
          "student_password": {
            required: "Vui lòng nhập mật khẩu"
          }
        }
      });

      $("#register_form").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
          "student_name": {
            required: true,
            minlength: 5
          },
          "student_email": {
            required: true
          },
          "student_username": {
            required: true,
            minlength: 5
          },
          "student_password": {
            required: true
          }
        },
        messages: {
          "student_username": {
            required: "Bạn chưa điền tên đăng nhập",
            minlength: "Hãy nhập tối thiểu 5 ký tự"
          },
          "student_password": {
            required: "Vui lòng nhập mật khẩu"
          },
          "student_name": {
            required: "Vui lòng điền họ và tên",
            minlength: "Hãy nhập tối thiểu 5 ký tự"
          },
          "student_email": {
            required: "Vui lòng nhập email"
          }
        }
      });
    });
</script>
@endsection