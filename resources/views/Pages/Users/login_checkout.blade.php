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
                        <form action="{{URL::to('/dang-nhap')}}" method="POST">	
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
                    <form action="{{URL::to('/dang-ky')}}" method="POST">    
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
@endsection