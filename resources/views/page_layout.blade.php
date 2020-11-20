<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="author"/>
	<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>LearnUp - Online Course & Education HTML Template</title>
	<!-- Custom CSS -->
	<link href="{{asset('public/Learnup/assets/css/styles.css')}}" rel="stylesheet">
	<!-- Custom Color Option -->
	<link href="{{asset('public/Learnup/assets/css/colors.css')}}" rel="stylesheet">
</head>
<body class="red-skin">
	<div id="preloader">
		<div class="preloader"><span></span><span></span></div>
	</div>
	<div id="main-wrapper">
		<!-- Top header  -->		
		<!-- Start Navigation -->
		<div class="header header-light head-shadow">
			<div class="container">
				<nav id="navigation" class="navigation navigation-landscape">
					<div class="nav-header">
						<a class="nav-brand fixed-logo" href="{{URL::to('/')}}"><img src="{{asset('public/Learnup/assets/img/logo.png')}}" class="logo"
								alt="" /></a>
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

							<li>
								<a href="{{URL::to('/tai-khoan')}}">Tài Khoản</a>
							</li>
							
						</ul>

						<?php
							$student_id = Session::get('student_id');
							if($student_id != null){ 
						?>
						<ul class="nav-menu nav-menu-social align-to-right">                             
							<li class="login_click bg-dark">
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
        @yield('pages_content')

		<!-- ============================== Start Newsletter ================================== -->
		<section class="newsletter theme-bg inverse-theme">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7 col-md-8 col-sm-12">
						<div class="text-center">
							<h2>Theo dõi chúng tôi</h2>
							<p>Nhập email để đăng ký nhận những thông tin hữu ích về học tập từ LearnUp</p>
							<form class="sup-form">
								<input type="email" class="form-control sigmup-me" placeholder="Email của bạn"
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
								<img src="{{asset('public/Learnup/assets/img/logo-light.png')}}" class="img-footer" alt="" />
								<div class="footer-add">
									<p><i class="fa fa-location-arrow" aria-hidden="true"></i> 450 Tran Dai Nghia, Ngu Hanh Son, Da Nang</p>
									<p><i class="fa fa-phone" aria-hidden="true"></i> +84 961 340 573</p>
									<p><i class="fa fa-envelope" aria-hidden="true"></i> nguyenminhlong@learnup.com</p>
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
							<p class="mb-0">© 2020 LearnUp. Designd By <a href="#">Nguyen Minh Long</a>.</p>
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
	

	
	<!-- All Jquery -->
	
	<script src="{{asset('public/Learnup/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/Learnup/assets/js/popper.min.js')}}"></script>
	<script src="{{asset('public/Learnup/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/Learnup/assets/js/select2.min.js')}}"></script>
	<script src="{{asset('public/Learnup/assets/js/slick.js')}}"></script>
	<script src="{{asset('public/Learnup/assets/js/jquery.counterup.min.js')}}"></script>
	<script src="{{asset('public/Learnup/assets/js/counterup.min.js')}}"></script>
	<script src="{{asset('public/Learnup/assets/js/custom.js')}}"></script>
	
	<!-- This page plugins -->
	
	<script>
		function openNav() {
			document.getElementById("filter-sidebar").style.width = "320px";
		}

		function closeNav() {
			document.getElementById("filter-sidebar").style.width = "0";
		}
	</script>

</body>
</html>