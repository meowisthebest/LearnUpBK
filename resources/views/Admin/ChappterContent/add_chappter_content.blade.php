@extends('admin_layout')
@section('admin_content')
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
                      Thêm videos
                    </h6>
                  </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                        <form action="{{URL::to('/save-chappter-content')}}" method="post" id="main-form" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Tên video</label>
                                <input type="text" name="chappter_content_name" class="form-control"> 
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Link video</label>
                                <input type="text" name="chappter_content_link" class="form-control"> 
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                  <select name="is_mandatory" class="form-control input-sm m-bot15">
                                        <option value="0">Chưa học</option>
                                        <option value="1">Đã học</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Chương</label>
                                <select  name="chappter_id" class="form-control">
                                    <option value="">-- Chọn chương --</option>
                                    @foreach ($chappter as $key => $chappter)
                                    <option selected value="{{$chappter->chappter_id}}">{{$chappter->chappter_name}}</option>
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