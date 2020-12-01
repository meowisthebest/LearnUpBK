@extends('page_layout')
@section('pages_content')
    

<!-- ============================ Course header Info Start================================== -->
@foreach ($course_detail as $key => $value)
<div class="ed_detail_head">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-4 col-md-5">
                <div class="property_video">
                    <div class="thumb">
                        <img class="pro_img img-fluid w100" src="{{URL::to('public/uploads/course/'.$value->course_img)}}" alt="{{$value->course_img}}">
                    </div>
                </div>
            </div>



            
            <div class="col-lg-8 col-md-7">
                <div class="ed_detail_wrap">
                    <ul class="cources_facts_list">
                        <li class="facts-1">{{$value->category_name}}</li>
                    </ul>
                    <div class="ed_header_caption">
                        <h2 class="ed_title">{{$value->course_name}}</h2>
                        <ul>
                            <li><i class="ti-calendar"></i>10 - 20 weeks</li>
                            <li><i class="ti-control-forward"></i>102 Bài học</li>
                        </ul>
                    </div>
                    <div class="ed_header_short">
                        <p>{!!$value->course_overview!!}</p>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
@endforeach
<!-- ============================ Course Header Info End ================================== -->

<!-- ============================ Course Detail ================================== -->
<section>
    <div class="container">
        <div class="row">
        
            <div class="col-lg-8 col-md-8">
                <!-- Overview -->
                <div class="edu_wraper border">
                    <h4 class="edu_title">Tổng quan về khóa học</h4>
                    {!!$value->course_overview!!}		
                    <h6>Bạn sẽ học được gì</h6>
                    <ul class="lists-3">
                        {!!$value->course_learned!!}
                    </ul>
                </div>              

                <div class="edu_wraper border">
                    <h4 class="edu_title">Chi tiết khóa học</h4>
                    <div id="accordionExample" class="accordion shadow circullum">

                        <!-- Part 1 -->
                    @foreach ($chappter_course as $key => $chappter_course)
                        <div class="card">
                          <div id="{{$chappter_course->chappter_id}}" class="card-header bg-white shadow-sm border-0">
                            <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#C{{$chappter_course->chappter_id}}" aria-expanded="false" aria-controls="C{{$chappter_course->chappter_id}}" class="d-block position-relative text-dark collapsible-link py-2 collapsed">{{$chappter_course->chappter_name}}</a></h6>
                          </div>
                          <div id="C{{$chappter_course->chappter_id}}" aria-labelledby="{{$chappter_course->chappter_id}}" data-parent="#accordionExample" class="collapse">          
                            <div class="card-body pl-3 pr-3">
                                <ul class="lectures_lists">
                                    @foreach ($chappter_name as $keyname)
                                    <li>
                                        <div class="lectures_lists_title">
                                            <i class="ti-control-play"></i>
                                            {{$keyname->chappter_content_name}}
                                        </div>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                          </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                

                
            
                <!-- Reviews -->
                <div class="list-single-main-item fl-wrap border">
                    <div class="list-single-main-item-title fl-wrap">
                        <h3>Nhận xét của học viên</h3>
                    </div>
                    <div class="reviews-comments-wrap">
                        <!-- reviews-comments-item -->  
                        <div class="reviews-comments-item">
                            <div class="reviews-comments-item-text">
                                <h4><a href="#">Mèo Trắng</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>27 Tháng 4 Năm 2020</span></h4>
                                <div class="clearfix"></div>
                                <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                            </div>
                        </div>
                        <!--reviews-comments-item end-->  
                        
                        <!-- reviews-comments-item -->  
                        <div class="reviews-comments-item">
                            <div class="reviews-comments-item-text">
                                <h4><a href="#">Mèo đen</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>27 Tháng 4 Năm 2020</span></h4>
                                <div class="clearfix"></div>
                                <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                            </div>
                        </div>
                        <!--reviews-comments-item end-->
                        
                        <!-- reviews-comments-item -->  
                        <div class="reviews-comments-item">
                            <div class="reviews-comments-item-text">
                                <h4><a href="#">Mèo vàng</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>27 Tháng 4 Năm 2020</span></h4>
                                <div class="clearfix"></div>
                                <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                            </div>
                        </div>
                        <!--reviews-comments-item end-->
                        
                    </div>
                </div>

                <!-- Submit Reviews -->
                <div class="edu_wraper border">
                    <h4 class="edu_title">Thêm nhận xét</h4>
                    <div class="review-form-box form-submit">
                        <form>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Nhận xét: </label>
                                        <textarea class="form-control ht-140" placeholder="Viết nhận xét"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-theme">Bình Luận</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @foreach ($course_detail as $key => $value)          
            <!-- Sidebar -->
            <div class="col-lg-4 col-md-4">
                <div class="edu_wraper border">
                    <h4 class="edu_title">Thông tin chung</h4>
                    <ul class="edu_list right">
                        {{--  <li><i class="ti-user"></i>Sinh viên đã đăng ký:<strong>1740</strong></li>  --}}
                        <li><i class="ti-files"></i>Bài giảng:<strong>10</strong></li>
                        <li><i class="ti-time"></i>Thời lượng:<strong>60 giờ</strong></li>
                        <li><i class="ti-tag"></i>Yêu cầu kỹ năng:<strong>{{$value->course_lever}}</strong></li>
                    </ul>
                    <?php
                        $student_id = Session::get('student_id');
                        if($student_id != null){ 
                    ?>
                        <form action="{{URL::to('/enrollment/'.$value->course_id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="ed_view_link">
                                <button type="submit" class="btn btn-theme enroll-btn">Học Ngay<i class="ti-angle-right"></i></button>
                            </div>
                        </form> 
                    
                    <?php
                        }else{
                    ?>
                        <div class="ed_view_link">
                            <a href="{{URL::to('/login-checkout')}}" class="btn btn-theme enroll-btn">Học Ngay<i class="ti-angle-right"></i></a>
                        </div>
                    <?php 
                        }
                    ?>
                </div>
                
            </div>
            @endforeach
        
        </div>
    </div>
</section>
<!-- ============================ Course Detail ================================== -->
@endsection
