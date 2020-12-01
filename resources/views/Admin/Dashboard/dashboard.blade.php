@extends('admin_layout')
@section('admin_content')
    
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Bảng điều khiển</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng số khóa học</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_course}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng số sinh viên đăng ký</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_student}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-secondary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Tổng số Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_admin}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-shield fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng số bài đăng đã tạo</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$count_blog}}</div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-blog fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>

  <div class="row d-flex justify-content-around">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Tổng số email đã đăng ký</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_email}}</div>
            </div>
            <div class="col-auto">
              <i class="far fa-envelope fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tổng số lời nhắn đã nhận</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_message}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng số lượt truy cập trang web</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_admin}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-street-view fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
