@extends('admin_layout')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
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
  <div class="card-header py-3 d-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">
      Danh sách tài khoản người dùng
    </h6>
    <a href="{{URL::to('/add-user')}}" class="btn btn-primary">Thêm tài khoản</a>
    

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table
        class="table table-bordered"
        id="dataTable"
        width="100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên tài khoản</th>
            <th>Mật khẩu</th>
            <td>Họ và tên</td>
            <td>Số điện thoại</td>
            <td>Địa chỉ</td>
            <td>Hành động</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($list_student as $key => $student)
            <tr>
              <td>{{$student->student_id}}</td>
              <td>{{$student->student_username}}</td>
              <td>{{$student->student_password}}</td>
              <td>{{$student->student_name}}</td>
              <td>{{$student->student_phone}}</td>
              <td>{{$student->student_address}}</td>
              <td style="width: 200px;">
                <a href="{{URL::to('/edit-user/'.$student->student_id)}}" class="btn btn-outline-primary"
                  ><i class="fas fa-edit"></i> Sửa</a
                >
                <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-user/'.$student->student_id)}}" class="btn btn-outline-danger"
                  ><i class="fas fa-trash-alt"></i> Xóa</a
                >
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
