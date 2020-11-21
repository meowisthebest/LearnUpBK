@extends('admin_layout')
@section('admin_content')
<div class="row">
              
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card text-left shadow">
        @foreach ($edit_admin as $key => $admin)
          <form role="form" enctype="multipart/form-data" action="{{URL::to('/update-admin/'.$admin->admin_id)}}" method="post">
            {{@csrf_field()}}
              <div class="card-header py-3 d-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sửa tài khoản người quản trị</h6>
                  <div>
                    <button type="submit" class="btn btn-primary" >Sửa tài khoản</button>
                    <a href="{{URL::to('/list-account-admin')}}" class="btn btn-primary">Trở lại</a>
                  </div>
              </div>         
              <div class="card-body">
                <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Tên tài khoản: </label>
                            <input readonly type="text" value="{{$admin->admin_username}}" class="form-control" name="admin_username" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Mật khẩu: </label>
                            <input type="password" value="{{$admin->admin_password}}" class="form-control" name="admin_password" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Họ và tên: </label>
                            <input type="text" value="{{$admin->admin_name}}" class="form-control" name="admin_name" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Số điện thoại: </label>
                            <input type="number" value="{{$admin->admin_phone}}" class="form-control" name="admin_phone" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="">Địa chỉ: </label>
                            <input type="text" value="{{$admin->admin_address}}" class="form-control" name="admin_address" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>
                </div>                   
              </div>
          </form>
        @endforeach
        </div>
      
       
    </div>
</div>

@endsection
