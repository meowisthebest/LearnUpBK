@extends('admin_layout')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <?php
      $message_category = Session::get('message_category');
      if($message_category){
          echo '<div class="alert alert-success alert-dismissible out4s" role="alert"> 
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                    .$message_category.
                '</div>';  
          Session::put('message_category', null);
      };
  ?>
  <div class="card-header py-3 d-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">
      Danh sách danh mục khóa học
    </h6>
    <a href="{{URL::to('/add-category')}}" class="btn btn-primary">Thêm danh mục</a>
    

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
            <th>Tên danh mục</th>
            <th>Ảnh danh mục</th>
            <td>Hành động</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($list_category as $key => $cate)
            <tr>
              <td>{{$cate->category_id}}</td>
              <td>{{$cate->category_name}}</td>
              <td style="text-align: center; width: 150px; ">
                <img style="object-fit: cover; width: 50px;" class="course-img"  src="public/uploads/category/{{$cate->category_img}}" alt="" />
              </td>
              <td style="width: 200px;">
                <a href="{{URL::to('/edit-category/'.$cate->category_id)}}" class="btn btn-outline-primary"
                  ><i class="fas fa-edit"></i> Sửa</a
                >
                <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-category/'.$cate->category_id)}}" class="btn btn-outline-danger"
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
