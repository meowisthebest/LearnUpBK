@extends('admin_layout')
@section('admin_content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @foreach ($course_name as $key => $course_name)
    <h1 class="h3 mb-0">Khóa: <span class="text-danger">{{$course_name->course_name}}</span></h1>
    @endforeach
</div>
<?php
    $message_chappter = Session::get('message_chappter');
    if($message_chappter){
        echo '<div class="alert alert-success alert-dismissible out4s" role="alert"> 
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                .$message_chappter.
             '</div>';  
        Session::put('message_chappter', null);
    };
?>
<div class="row">               
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            Danh sách các chương
          </h6>

          <div>
            <a href="{{URL::to('/add-chappter')}}" class="btn btn-primary mt-2">Thêm chương mới</a>
            <a onClick="history.go(-1);"  class="btn btn-primary mt-2">Trở về</a>

          </div>
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
                <tr class="text-center">
                  <th>Tên chương</th>
                  <td>Hành động</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($view_chappter as $key => $chappter)
                  <tr class="text-center">
                    <td>{{$chappter->chappter_name}}</td>
                    <td>
                      <a href="{{URL::to('view-chappter-content/'.$chappter->chappter_id)}}" class="btn btn-outline-success mt-2"
                        ><i class="fas fa-video"></i> Xem videos</a
                      >
                      <a href="{{URL::to('/edit-chappter/'.$chappter->chappter_id)}}" class="btn btn-outline-primary mt-2"
                        ><i class="fas fa-edit"></i> Sửa</a
                      >
                      <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-chappter/'.$chappter->chappter_id)}}" class="btn btn-outline-danger mt-2"
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
  </div>
</div>

@endsection