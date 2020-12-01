@extends('admin_layout')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <?php
      $message_blog = Session::get('message_blog');
      if($message_blog){
          echo '<div class="alert alert-success alert-dismissible out4s" role="alert"> 
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                    .$message_blog.
                '</div>';  
          Session::put('message_blog', null);
      };
  ?>
  <div class="card-header py-3 d-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">
      Danh sách bài đăng
    </h6>
    <a href="{{URL::to('/add-blog')}}" class="btn btn-primary">Thêm bài đăng</a>
    

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
            <th>Tiêu đề bài đăng</th>
            <th>Ảnh đại diện</th>
            <td>Hành động</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($list_blog as $key => $blog)
            <tr>
              <td>{{$blog->blog_id}}</td>
              <td>{{$blog->blog_title}}</td>
              <td style="text-align: center; ">
                <img style="object-fit: cover; width: 150px;" class="course-img"  src="public/uploads/blog/{{$blog->blog_img}}" alt="" />
              </td>
              <td style="width: 200px;">
                <a href="{{URL::to('/edit-blog/'.$blog->blog_id)}}" class="btn btn-outline-primary"
                  ><i class="fas fa-edit"></i> Sửa</a
                >
                <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-blog/'.$blog->blog_id)}}" class="btn btn-outline-danger"
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
