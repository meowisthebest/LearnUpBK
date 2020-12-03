<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />		
		{{-- seo --}}
		<meta name="description" content="{{$meta_desc}}"/>
		<meta name="keywords" content="{{$meta_keywords}}"/>
		<meta name="robots" content="INDEX,FOLLOW"/>
		<link rel="canonical" href="{{$url_caninical}}" />	
		<meta name="author" content="">
		<link rel="icon" type="image/x-icon" href="https://edumall.vn/static/version1600623380/frontend/Edumall/winstrike/vi_VN/Magento_Theme/favicon.ico" />
		{{-- seo --}}
		<title>{{$meta_title}}</title>
		<link href="{{('public/Learnup/assets/css/styles.css')}}" rel="stylesheet">	
		<link rel="stylesheet" href="{{('public/Learnup/assets/css/colors.css')}}">	
</head>	
<body class="red-skin">
    <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
	<div id="main-wrapper">
	<!-- Top header  -->
		<!-- Start Navigation -->
		<div class="header header-transparent change-logo">
			<div class="container">
				<nav id="navigation" class="navigation navigation-landscape">
					<div class="nav-header">
						<a class="nav-brand static-logo" href="{{URL::to('/')}}"><img src="{{('public/Learnup/assets/img/logo-light.png')}}" class="logo" alt=""/></a>
						<a class="nav-brand fixed-logo" href="{{URL::to('/')}}"><img src="{{('public/Learnup/assets/img/logo.png')}}" class="logo" alt=""/></a>
						<div class="nav-toggle"></div>
					</div>
					<div class="nav-menus-wrapper" style="transition-property: none;">
						<ul class="nav-menu">						
							<li>
								<a href="{{URL::to('/')}}">Trang Chủ</a>
							</li>
							
							<li>
								<a href="{{URL::to('/khoa-hoc')}}">Khóa Học</a>
							</li>

							<li>
								<a href="{{URL::to('/tin-tuc')}}">Tin Tức</a>
							</li>
							
							<li>
								<a href="{{URL::to('/lien-he')}}">Liên Hệ</a>
							</li>

							<?php
								$student_id = Session::get('student_id');
								if($student_id != null){ 
							?>
							<li>
								<a href="{{URL::to('/tai-khoan/'.Session::get('student_id'))}}">Tài Khoản</a>
							</li>
							
							<?php
								}else{
							?>
							<li>
								<a href="{{URL::to('/login-checkout')}}">Tài Khoản</a>
							</li>
							<?php 
								}
							?>
							
						</ul>
						
						<?php
							$student_id = Session::get('student_id');
							if($student_id != null){ 
						?>
						<ul class="nav-menu nav-menu-social align-to-right">                             
							<li class="login_click bg-red">
								<a href="{{URL::to('/logout-checkout')}}" >Đăng Xuất</a>
							</li>
						</ul>
						
						<?php
							}else{
						?>
							<ul class="nav-menu nav-menu-social align-to-right">                             
								<li class="login_click bg-red">
									<a href="{{URL::to('/login-checkout')}}" >Đăng Nhập</a>
								</li>
							</ul>
						<?php 
							}
						?>
					</div>
				</nav>
			</div>	
		</div>
		<!-- End Navigation -->
		<div class="clearfix"></div>
		<!-- Top header  -->
		
		<!-- ============================ Hero Banner  Start================================== -->
		<div class="image-cover hero_banner" style="background:#003783;" data-overlay="0">
			<div class="container">
				<!-- Type -->
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="banner-search-2 transparent">
							<p>Học lập trình với các khóa học chất lượng để đi làm!</p>
							<h1 style="font-family: Open Sans,sans-serif;" class="big-header-capt cl_2 mb-2">CỘNG ĐỒNG HỌC LẬP TRÌNH MIỄN PHÍ</h1>		
						</div>
					</div>
					
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="flixio pt-5">
							<img class="img-fluid" src="{{('public/Learnup/assets/img/edu_2.png')}}" alt="">
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- ============================ Hero Banner End ================================== -->
		
		<!-- ========================== Featured Category Section =============================== -->
		<section>
			<div class="container">
			
				<div class="row justify-content-center">
					<div class="col-lg-5 col-md-6 col-sm-12">
						<div class="sec-heading center">
							<h2>Danh Mục<span class="theme-cl"> Phổ Biến</span></h2>
						</div>
					</div>
				</div>
				
				<div class="row">
					@foreach ($category as $key => $category)
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="edu_cat_2 cat-3">
								<div class="edu_cat_icons">
									<a class="pic-main" href="#"><img src="{{('public/uploads/category/'.$category->category_img)}}" class="img-fluid" alt="" /></a>
								</div>
								<div class="edu_cat_data">
									<h4 class="title"><a href="{{URL::to('/danh-muc-khoa-hoc/'.$category->category_id)}}">{{$category->category_name}}</a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i>23 Khóa Học</li>
									</ul>
								</div>
							</div>							
						</div>
					@endforeach
				</div>
				
			</div>
		</section>
		<!-- ========================== Featured Category Section =============================== -->
		
		<!-- ============================ Featured Courses Start ================================== -->
		<section class="gray-bg">
			<div class="container">
			
				<div class="row justify-content-center">
					<div class="col-lg-5 col-md-6 col-sm-12">
						<div class="sec-heading center">
							<h2>Các Khóa Học<span class="theme-cl"> Nổi Bật</span></h2>
						</div>
					</div>
				</div>
				
				<div class="row">
					@foreach ($course as $key => $course)
					<!-- Cource Grid 1 -->
					<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
						<div class="education_block_list_layout">
							
							<div class="education_block_thumb n-shadow">
								<a href="{{URL::to('/chi-tiet-khoa-hoc/'.$course->course_id)}}"><img src="{{('public/uploads/course/'.$course->course_img)}}" class="img-fluid" alt=""></a>
							</div>
							
							<div class="list_layout_ecucation_caption">
							
								<div class="education_block_body">
									<h4 class="bl-title"><a href="{{URL::to('/chi-tiet-khoa-hoc/'.$course->course_id)}}">{{$course->course_name}}</a></h4>
								</div>

								<div class="education_block_footer mt-3">
									<div class="cources_info_style3">
										<ul>
											<li><div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>54 Bài giảng</div></li>
										</ul>
									</div>
								</div>
							
							</div>
							
						</div>	
					</div>
					@endforeach
					
					
				</div>
				
			</div>
		</section>
		<!-- ============================ Featured Courses End ================================== -->
		
		<!-- ========================== About Facts List Section =============================== -->
		<section>
			<div class="container">
				
				<div class="row align-items-center">
				
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="about-short">
							<div class="sec-heading mb-3">
								<h2>Giới Thiệu Về Nền Tảng Học Tập<span class="theme-cl"> LearnUp</span></h2>
							</div>
							<h3 style="font-family: 'Playfair Display', serif;" class="theme-cl">Học bất cứ lúc nào, bất cứ nơi đâu</h3>
							<p>Giờ đây học viên có thể học trực tuyến các bài học của hệ thống LearnUp mà không cần tới máy tính, vì chỉ với một chiếc smartphone học viên vẫn có thể học được các khoá học một cách thuận tiện nhất với mọi chức năng tương tự trên web.</p>
							<div class="cource_facts">
								<ul>
									<li><span class="theme-cl">5+</span>Danh Mục</li>
									<li><span class="theme-cl">55+</span>Khóa Học</li>
									<li><span class="theme-cl">555+</span>Học Viên</li>
								</ul>
							</div>
							<a href="#" class="btn btn-modern">Tìm Hiểu Thêm<span><i class="ti-arrow-right"></i></span></a>
						</div>
					</div>
					
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="list_facts_wrap_img">
						
							<img src="{{('public/Learnup/assets/img/edu_2.png')}}" class="img-fluid" alt="">
							
						</div>
					</div>

				</div>
				
			</div>
		</section>
		<!-- ========================== About Facts List Section =============================== -->
		
		<!-- ========================== Featured Courses Section =============================== -->
		<section class="gray">
			<div class="container">
			
				<div class="row justify-content-center">
					<div class="col-lg-5 col-md-6 col-sm-12">
						<div class="sec-heading center">
							<h2>Các Khóa Học <span class="theme-cl">Mới Nhất</span></h2>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 p-0">

						<div class="arrow_slide three_slide-dots arrow_middle">
							@foreach ($newcourse as $key => $new_course)
								<!-- Single Slide -->
								<div class="singles_items">
									<div class="education_block_grid style_2">
								
										<div class="education_block_thumb">
											<a href="detail-3.html"><img src="{{('public/uploads/course/'.$new_course->course_img)}}" class="img-fluid" alt=""></a>
										</div>
										
										<div class="education_block_body">
											<h4 class="bl-title"><a href="detail-3.html">{{$new_course->course_name}}</a></h4>
										</div>
										
										<div class="cources_info_style3">
											<ul>
												<li><i class="ti-control-skip-forward mr-2"></i>82 Bài giảng</li>
												<li><i class="ti-time mr-2"></i>9h 45min</li>
											</ul>
										</div>							
									</div>
								</div>
							@endforeach
						
						</div>
					</div>

				</div>
				
			</div>
		</section>
		<!-- ========================== Featured Courses Section =============================== -->
		
		<!-- ============================== Start Newsletter ================================== -->
		<section class="newsletter theme-bg inverse-theme">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7 col-md-8 col-sm-12">
						<div class="text-center">
							<h2>Theo dõi chúng tôi</h2>
							<p>Nhập email để đăng ký nhận những thông tin hữu ích về học tập từ LearnUp</p>
							<form action="{{URL::to('/save-email')}}" class="sup-form">
								<input type="email" name="email" class="form-control sigmup-me" placeholder="Email của bạn"
									required="required">
								<input type="submit" class="btn btn-theme" value="Đăng Ký">
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ================================= End Newsletter =============================== -->
		
		<!-- ============================ Footer Start ================================== -->
		<footer class="dark-footer skin-dark-footer">
			<div>
				<div class="container">
					<div class="row">
						
						<div class="col-lg-4 col-md-3">
							<div class="footer-widget">
								<img src="{{('public/Learnup/assets/img/logo-light.png')}}" class="img-footer" alt="" />
								<div class="footer-add">
									<p><i class="fa fa-location-arrow" aria-hidden="true"></i> 450 Tran Dai Nghia, Ngu Hanh Son, Da Nang</p>
									<p><i class="fa fa-phone" aria-hidden="true"></i> +84 961 377 523</p>
									<p><i class="fa fa-envelope" aria-hidden="true"></i> support@learnup.com</p>
								</div>
								
							</div>
						</div>		
						<div class="col-lg-2 col-md-3">
							<div class="footer-widget">
								<h4 class="widget-title">LearnUp</h4>
								<ul class="footer-menu">
									<li><a href="#">Giới Thiệu</a></li>
									<li><a href="#">Câu Hỏi Thường Gặp</a></li>
									<li><a href="#">Liên Hệ</a></li>
								</ul>
							</div>
						</div>
						
						<div class="col-lg-2 col-md-3">
							<div class="footer-widget">
								<h4 class="widget-title">Hỗ Trợ</h4>
								<ul class="footer-menu">
									<li><a href="#">Hỗ Trợ</a></li>
									<li><a href="#">Đóng Góp</a></li>
								</ul>
							</div>
						</div>
						
						<div class="col-lg-4 col-md-12">
							<div class="footer-widget">
								<h4 class="widget-title">Tải Ứng Dụng</h4>
								<a href="#" class="other-store-link">
									<div class="other-store-app">
										<div class="os-app-icon">
											<i class="lni-playstore theme-cl"></i>
										</div>
										<div class="os-app-caps">
											Google Play
										</div>
									</div>
								</a>
								<a href="#" class="other-store-link">
									<div class="other-store-app">
										<div class="os-app-icon">
											<i class="lni-apple theme-cl"></i>
										</div>
										<div class="os-app-caps">
											App Store
										</div>
									</div>
								</a>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
			<div class="footer-bottom">
				<div class="container">
					<div class="row align-items-center">
						
						<div class="col-lg-6 col-md-6">
							<p class="mb-0">© 2020 LearnUp. Designd By <a href="#">Mèo</a>.</p>
						</div>
						
						<div class="col-lg-6 col-md-6 text-right">
							<ul class="footer-bottom-social">
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
								<li><a href="#"><i class="ti-linkedin"></i></a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</footer>
		<!-- ============================ Footer End ================================== -->
		
		<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
	</div>
		<!-- End Wrapper -->
		<script src="{{('public/Learnup/assets/js/jquery.min.js')}}"></script>
		<script src="{{('public/Learnup/assets/js/popper.min.js')}}"></script>
		<script src="{{('public/Learnup/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{('public/Learnup/assets/js/select2.min.js')}}"></script>
		<script src="{{('public/Learnup/assets/js/slick.js')}}"></script>
		<script src="{{('public/Learnup/assets/js/jquery.counterup.min.js')}}"></script>
		<script src="{{('public/Learnup/assets/js/counterup.min.js')}}"></script>
		<script src="{{('public/Learnup/assets/js/custom.js')}}"></script>

	</body>
</html>