@extends('admin_layout')
@section('admin_content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @foreach ($course_name as $key => $course_name)
    <h1 class="h3 mb-0">Khóa: <span class="text-danger">{{$course_name->course_name}}</span></h1>
    @endforeach
</div>
<?php
    $message_comment = Session::get('message_comment');
    if($message_comment){
        echo '<div class="alert alert-success alert-dismissible out4s" role="alert"> 
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                .$message_comment.
             '</div>';  
        Session::put('message_comment', null);
    };
?>
<div class="row">               
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            Danh sách các bình luận
          </h6>
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
                  <th>Người Bình luận</th>
                  <th>Bình luận</th>
                  <td class="text-center">Hành động</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($view_comment as $key => $comment)
                  <tr>
                    <td>{{$comment->fee_id}}</td>
                    <td>{{$comment->student_name}}</td>
                    <td>{{$comment->fee_text}}</td>
                    <td class="text-center">
                      <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-comment/'.$comment->fee_id)}}" class="btn btn-outline-danger mt-2"
                        ><i class="fas fa-trash-alt"></i> Xóa
                      </a>
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