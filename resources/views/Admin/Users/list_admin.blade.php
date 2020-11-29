@extends('admin_layout')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <?php
      $message_admin = Session::get('message_admin');
      if($message_admin){
          echo '<div class="alert alert-success alert-dismissible out4s" role="alert"> 
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                    .$message_admin.
                '</div>';  
          Session::put('message_admin', null);
      };
  ?>
  <div class="card-header py-3 d-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">
      Danh sách tài khoản admin
    </h6>
    <a href="{{URL::to('/add-admin')}}" class="btn btn-primary">Thêm tài khoản</a>
    

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
          @foreach ($list_admin as $key => $admin)
            <tr>
              <td>{{$admin->admin_id}}</td>
              <td>{{$admin->admin_username}}</td>
              <td>{{$admin->admin_password}}</td>
              <td>{{$admin->admin_name}}</td>
              <td>{{$admin->admin_phone}}</td>
              <td>{{$admin->admin_address}}</td>
              <td style="width: 200px;">
                <a href="{{URL::to('/edit-admin/'.$admin->admin_id)}}" class="btn btn-outline-primary"
                  ><i class="fas fa-edit"></i> Sửa</a
                >
                <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-admin/'.$admin->admin_id)}}" class="btn btn-outline-danger"
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
