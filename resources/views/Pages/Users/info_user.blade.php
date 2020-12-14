@extends('page_layout')
@section('pages_content')
    

<!-- ============================ Dashboard: My Order Start ================================== -->
<section class="gray pt-0">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            @foreach ($view as $key => $value)
                
            
            <div class="col-lg-3 col-md-3 p-0">
                <div class="dashboard-navbar">
                    <div class="d-user-avater">
                        {{--  <img src="{{asset('public/Learnup/assets/img/user-img.jpg')}}" class="img-fluid avater" alt="" />  --}}
                        <img src="https://i.pinimg.com/originals/3d/1a/da/3d1ada2607633fd746c7f03f2c7a7bab.jpg" class="img-fluid avater" alt="" />
                        <h4>{{$value->student_name}}</h4>
                        <span>{{$value->student_address}}</span>
                    </div>
                    

                    <div class="d-navigation">
                        <ul id="side-menu">
                            <li class="active">
                                <a href="{{URL::to('/tai-khoan/'.Session::get('student_id'))}}"><i class="ti-settings"></i>Thông tin tài khoản</a>
                            </li>
                            <li>
                                <a href="{{URL::to('/khoa-hoc-cua-toi/'.Session::get('student_id'))}}"><i class="ti-layers"></i>Khóa học của tôi</a>
                            </li>
                            
                            <li>
                                <a href="{{URL::to('/logout-checkout')}}"><i class="ti-power-off"></i>Đăng xuất</a>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-12">
                
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Thông tin tài khoản
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <?php
                            $message_user = Session::get('message_user');
                            if($message_user){
                                echo '<div class="alert alert-success alert-dismissible out4s" role="alert"> 
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                                        .$message_user.
                                    '</div>';  
                                Session::put('message_user', null);
                            };
                        ?>
                        <div class="dashboard_container">
                            <div class="dashboard_container_body p-4">
                                <!-- Basic info -->
                                <form id="info_user" action="{{URL::to('/update-infouser/'.$value->student_id)}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="submit-section">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tên tài khoản</label>
                                                <input readonly name="student_username" type="text" class="form-control" value="{{$value->student_username}}" />
                                            </div>
    
                                            <div class="form-group col-md-6">
                                                <label>Mật khẩu</label>
                                                <input name="student_password" type="password" class="form-control"
                                                    value="{{$value->student_password}}" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Họ và Tên</label>
                                                <input name="student_name" type="text" class="form-control" value="{{$value->student_name}}" />
                                            </div>
    
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input name="student_email" type="email" class="form-control"
                                                    value="{{$value->student_email}}" />
                                            </div>
    
                                            <div class="form-group col-md-6">
                                                <label>Số điện thoại</label>
                                                <input name="student_phone" type="text" class="form-control" value="{{$value->student_phone}}" />
                                            </div>
    
                                            <div class="form-group col-md-6">
                                                <label>Địa chỉ</label>
                                                <input name="student_address" type="text" class="form-control"
                                                    value="{{$value->student_address}}" />
                                            </div>
    
                                            <div class="form-group col-md-12">
                                                <label>Giới thiệu chung</label>
                                                <textarea name="student_introduce" class="form-control">{{$value->student_introduce}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="btn btn-theme" type="submit">
                                            Lưu thay đổi
                                        </button>
                                    </div>
                                </form>
                                
                                <!-- Basic info -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            @endforeach
        </div>
        <!-- Row -->
    </div>
</section>
<script>
    $(document).ready(function() {
      $("#info_user").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "student_password": {
                required: "Vui lòng nhập mật khẩu"
            }
            "student_name": {
                required: true,
                minlength: 5
            },
            "student_email": {
                required: true,
                minlength: 5
            }
        },
        messages: {
          "student_password": {
            required: "Vui lòng nhập mật khẩu"
          },
          "student_name": {
            required: "Vui lòng nhập họ và tên",
            minlength: "Hãy nhập tối thiểu 5 ký tự"
          },
          "student_email": {
            required: "Vui lòng nhập email"
            minlength: "Hãy nhập tối thiểu 5 ký tự"
          }
        }
      });
    });
</script>
<!-- ============================ Dashboard: My Order Start End ================================== -->
@endsection