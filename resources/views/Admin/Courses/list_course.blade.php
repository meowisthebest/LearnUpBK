@extends('admin_layout')
@section('admin_content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <?php
      $message_course = Session::get('message_course');
      if($message_course){
          echo '<div class="alert alert-success alert-dismissible out4s" role="alert"> 
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                    .$message_course.
                '</div>';  
          Session::put('message_course', null);
      };
  ?>
  <div class="card-header py-3 d-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">
      Dánh sách khóa học
    </h6>
    <a href="{{URL::to('/add-course')}}" class="btn btn-primary">Thêm khóa học</a>
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
            <th>ID</th>
            <th>Tên khóa học</th>
            <th>Danh mục</th>
            <th>Ảnh khóa học</th>
            <th>Cấp độ yêu cầu</th>
            <td>Hành động</td>
          </tr>
        </thead>
        <tbody>
            @foreach ($list_course as $key => $course)
                <tr class="text-center">
                    <td>{{$course->course_id}}</td>
                    <td>{{$course->course_name}}</td>
                    <td>{{$course->category_name}}</td>
                    <td>
                        <img class="course-img" src="{{URL::to('public/uploads/course/'.$course->course_img)}}" alt="" />
                    </td>
                    <td>{{$course->course_lever}}</td>
                    <td>
                    <a href="{{URL::to('/edit-course/'.$course->course_id)}}" class="btn btn-outline-primary mt-2"
                        ><i class="fas fa-edit"></i> Sửa</a
                    >
                    <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-course/'.$course->course_id)}}" class="btn btn-outline-danger mt-2"
                        ><i class="fas fa-trash-alt"></i> Xóa</a
                    >
                    <a href="{{URL::to('/view-chappter/'.$course->course_id)}}" class="btn btn-outline-success mt-2">
                      <i class="fas fa-eye"></i>
                      Chi tiết
                    </a>
                    <a href="{{URL::to('/view-comment/'.$course->course_id)}}" class="btn btn-outline-warning mt-2">
                      <i class="fas fa-eye"></i>
                      Bình luận
                    </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
