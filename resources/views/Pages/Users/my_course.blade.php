@extends('page_layout')
@section('pages_content')

<!-- ============================ Dashboard: My Order Start ================================== -->
<section class="gray pt-0">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-lg-3 col-md-3 p-0">
                <div class="dashboard-navbar">
                    @foreach ($view_info as $key => $view_info)
                    <div class="d-user-avater">
                        {{--  <img src="{{asset('public/Learnup/assets/img/user-img.jpg')}}" class="img-fluid avater" alt="" />  --}}
                        <img src="https://i.pinimg.com/originals/3d/1a/da/3d1ada2607633fd746c7f03f2c7a7bab.jpg" class="img-fluid avater" alt="" />
                        <h4>{{$view_info->student_name}}</h4>
                        <span>{{$view_info->student_address}}</span>
                    </div>
                    @endforeach

                    <div class="d-navigation">
                        <ul id="side-menu">
                            <li >
                                <a href="{{URL::to('/tai-khoan/'.Session::get('student_id'))}}"><i class="ti-settings"></i>Thông tin tài khoản</a>
                            </li>
                            <li class="active">
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
                                <li class="breadcrumb-item active" aria-current="page">Khóa học của tôi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- /Row -->

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <!-- Course Style 1 For Student -->
                        <div class="dashboard_container">
                            <div class="dashboard_container_body">
                                @foreach ($view as $item => $view_course)
                                
                                <!-- Single Course -->
                                <div class="dashboard_single_course">
                                    <div class="dashboard_single_course_thumb">
                                        <img src="{{URL::to('public/uploads/course/'.$view_course->course_img)}}" class="img-fluid" alt="" />
                                    </div>
                                    <div class="dashboard_single_course_caption">
                                        <div class="dashboard_single_course_head">
                                            <div class="dashboard_single_course_head_flex">
                                                <h4 class="dashboard_course_title">
                                                    <a href="{{URL::to('/chi-tiet-khoa-hoc/'.$view_course->course_id)}}">{{$view_course->course_name}}</a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="dashboard_single_course_des">
                                            <p>{!!$view_course->course_overview!!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{$view -> links()}}
                    </div>
                </div>
                <!-- /Row -->
            </div>
        </div>
        <!-- Row -->

    </div>
</section>
<!-- ============================ Dashboard: My Order Start End ================================== -->
@endsection