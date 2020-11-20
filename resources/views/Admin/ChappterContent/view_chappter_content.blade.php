@extends('admin_layout')
@section('admin_content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @foreach ($chappter_name as $key => $chappter_name)
    <h1 class="h3 mb-0"><span class="text-danger">{{$chappter_name->chappter_name}}</span></h1>
    @endforeach
</div>
<div class="row">               
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            Danh sách các bài học
          </h6>

          <div>
            <a href="{{URL::to('/add-chappter-content')}}" class="btn btn-primary mt-2">Thêm videos mới</a>
            <a onClick="history.go(-1);" class="btn btn-primary mt-2">Trở về</a>

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
                  <th>Tên bài học</th>
                  <th>Link videos</th>
                  <th>Đã học</th>
                  <td>Hành động</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($view_chappter_content as $key => $chappter_content)
                  <tr class="text-center">
                    <td>{{$chappter_content->chappter_content_name}}</td>
                    <td>{{$chappter_content->chappter_content_link}}</td>
                    <td>
                      <span class="text-ellipsis">
                        <?php
                        if($chappter_content -> is_mandatory == 0){
                          ?>
                          <a href="{{URL::to('/unactive-video/'.$chappter_content->chappter_content_id)}}">
                            <i class="fa fa-times text-danger"></i>
                          </a>
                          <?php
                          }else{
                          ?>  
                          <a href="{{URL::to('/active-video/'.$chappter_content->chappter_content_id)}}">
                            <i class="fa fa-check text-success"></i>
                          </a>
                          <?php
                        }
                        ?>
                      </span>
                    </td>
                    <td>
                      <a href="{{URL::to('/edit-chappter-content/'.$chappter_content->chappter_content_id)}}" class="btn btn-outline-primary mt-2"
                        ><i class="fas fa-edit"></i> Sửa</a
                      >
                      <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-chappter-content/'.$chappter_content->chappter_content_id)}}" class="btn btn-outline-danger mt-2"
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