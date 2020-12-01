<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LearnUp Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('public/Admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('public/Admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{asset('public/Admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>

  <link href="{{asset('public/Admin/vendor/validation/validation.css')}}" rel="stylesheet"/>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-leanpub"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LearnUp</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{URL::to('/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Bảng điều khiển</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/list-category')}}">
          <i class="fas fa-list-ul"></i>
          <span>Danh mục</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Khóa học</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{URL::to('/list-course')}}">Danh sách khóa học</a>
            <a class="collapse-item" href="{{URL::to('/add-course')}}">Thêm khóa học</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - User Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Tài khoản</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{URL::to('/list-account-admin')}}">Quản trị</a>
            <a class="collapse-item" href="{{URL::to('/list-account-user')}}">Người dùng</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Blog -->
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/list-blog')}}">
          <i class="fab fa-blogger-b"></i>
          <span>Tin tức</span></a>
      </li>

      <!-- Nav Item - Email -->
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/list-email')}}">
          <i class="far fa-envelope"></i>
          <span>Email</span></a>
      </li>

      <!-- Nav Item - Message -->
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/list-message')}}">
          <i class="fas fa-envelope-open-text"></i>
          <span>Message</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Xin chào 
                    <span class="text-primary">
                      <?php
                          $name = Session::get('admin_name');
                          if($name){
                              echo $name;
                          };
                      ?>
                    </span>
                !</span>
                <i class="fas fa-cog"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            @yield('admin_content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; By Nguyen Minh Long 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Đăng xuất?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Chọn "Đăng xuất" nếu bạn muốn kết thúc phiên làm việc này!.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Trở lại</button>
          <a class="btn btn-primary" href="{{URL::to('/logout')}}">Đăng xuất</a>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('public/Admin/vendor/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('public/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('public/Admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <script src="{{asset('public/Admin/js/sb-admin-2.min.js')}}"></script>

  <script src="{{asset('public/Admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>

  <script src="{{asset('public/Admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('public/Admin/js/demo/datatables-demo.js')}}"></script>

  <script src="{{asset('public/Admin/ckeditor/ckeditor.js')}}"></script>

  {{--  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>  --}}

  <script src="{{asset('public/Admin/vendor/validation/validation.js')}}"></script>
  <script>
    CKEDITOR.replace('ckeditorLearned');
    CKEDITOR.replace('ckeditorBlog');
    CKEDITOR.replace( 'ckeditorOverview');
  </script>

  <script>
    function changeImg(input){
      //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
      if(input.files && input.files[0]){
          var reader = new FileReader();
          //Sự kiện file đã được load vào website
          reader.onload = function(e){
              //Thay đổi đường dẫn ảnh
              $('#avatar').attr('src',e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $(document).ready(function() {
          $('#avatar').click(function(){
              $('#img').click();
          });
      });
  </script>

</body>

</html>
