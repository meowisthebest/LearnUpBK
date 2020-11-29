@extends('admin_layout')
@section('admin_content')
<div class="row"> 
    <div class="col-md-6 text-center offset-md-3">
        <?php
            $message_ChappterContent = Session::get('message_ChappterContent');
            if($message_ChappterContent){
                echo '<div class="alert alert-success alert-dismissible" role="alert"> 
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                        .$message_ChappterContent.
                    '</div>';  
                Session::put('message_ChappterContent', null);
            };
        ?>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Thêm videos
                    </h6>

                    <span>Lưu ý: <span class="error">*</span> là bắt buộc nhập</span>

                  </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                        <form action="{{URL::to('/save-chappter-content')}}" method="post" id="addChappterContent" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Tên video <span class="error">*</span></label>
                                <input type="text" name="chappter_content_name" class="form-control"> 
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Link video <span class="error">*</span></label>
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
                                <label>Chương <span class="error">*</span></label>
                                <select  name="chappter_id" class="form-control">
                                    <option value="">-- Chọn chương --</option>
                                    @foreach ($chappter as $key => $chappter)
                                    <option selected value="{{$chappter->chappter_id}}">{{$chappter->chappter_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <button type="submit" name="add_chappter" class="btn btn-primary">Thêm videos mới</button>
                                <a onClick="history.go(-1);" class="btn btn-primary">Trở lại</a>  
                            </div>
                        </form>
                        </div>                      
                    </div>
                </div>

            </div>
    </div>
</div>
<script>
    $(document).ready(function() {
      $("#addChappterContent").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
          "chappter_content_name": {
            required: true,
            minlength: 5
          },
          "chappter_content_link": {
            required: true
          }
        },
        messages: {
          "chappter_content_name": {
            required: "Hãy nhập tên bài học",
            minlength: "Hãy nhập tối thiểu 5 ký tự"
          },
          "chappter_content_link": {
            required: "Vui lòng điền link vào ô trống"
          }
        }
      });
    });
</script>

@endsection