@extends('admin_layout')
@section('admin_content')
<div class="row">
              
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card text-left shadow">
        @foreach ($edit_student as $key => $student)
          <form role="form" enctype="multipart/form-data" action="{{URL::to('/update-user/'.$student->student_id)}}" method="post">
            {{@csrf_field()}}          
              <div class="card-header py-3 d-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sửa tài khoản người dùng</h6>
                  <div>
                    <button type="submit" class="btn btn-primary" >Sửa tài khoản</button>
                    <a href="{{URL::to('/list-account-user')}}" class="btn btn-primary">Trở lại</a>
                  </div>
              </div>         
              <div class="card-body">
                <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="">Tên tài khoản: </label>
                            <input readonly type="text" value="{{$student->student_username}}" class="form-control" name="student_username" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="">Mật khẩu: </label>
                            <input type="password" value="{{$student->student_password}}" class="form-control" name="student_password" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="">Họ và tên: </label>
                            <input type="text" value="{{$student->student_name}}" class="form-control" name="student_name" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="email" value="{{$student->student_email}}" class="form-control" name="student_email" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="">Số điện thoại: </label>
                            <input type="number" value="{{$student->student_phone}}" class="form-control" name="student_phone" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="">Địa chỉ: </label>
                            <input type="text" value="{{$student->student_address}}" class="form-control" name="student_address" id="" aria-describedby="helpId" placeholder="">
                        </div>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="">Giới thiệu: </label>
                            <br>
                            <textarea name="student_introduce" class="w-100" rows="5">{{$student->student_introduce}}</textarea>
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
