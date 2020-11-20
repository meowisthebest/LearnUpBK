@extends('admin_layout')
@section('admin_content')

{{-- <!-- Page Heading -->    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @foreach ($course_name as $key => $course_name)
    <h1 class="h3 mb-0">Khóa: <span class="text-danger">{{$course_name->course_name}}</span></h1>
    @endforeach
</div>  --}}
<div class="row"> 
    <div class="col-md-6 text-center offset-md-3">
        <?php
            $message = Session::get('message');
            if($message){
                echo '<div class="alert alert-success alert-dismissible" role="alert"> 
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                        .$message.
                    '</div>';  
                Session::put('message', null);
            };
        ?>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Thêm chương
                    </h6>
                  </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                        <form action="{{URL::to('/save-chappter')}}" method="post" id="main-form" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Tên chương</label>
                                <input type="text" name="chappter_name" class="form-control"> 
                            </div>
                            <br>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Khóa học</label>
                            <select  name="course_id" class="form-control">
                                <option value="">-- Chọn khóa học --</option>
                                @foreach ($course as $key => $course)
                                <option selected value="{{$course->course_id}}">{{$course->course_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <button type="submit" name="add_chappter" class="btn btn-primary">Thêm chương mới</button>
                                <a onClick="history.go(-1);" class="btn btn-primary">Trở lại</a>  
                            </div>
                        </form>
                        </div>                      
                    </div>
                </div>

            </div>
    </div>
</div>

@endsection