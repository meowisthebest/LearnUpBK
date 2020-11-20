@extends('admin_layout')
@section('admin_content')

<div class="row">   
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @foreach ($edit_chappter_content as $key => $chappter_content)
        <form action="{{URL::to('/update-chappter-content/'.$chappter_content->chappter_content_id)}}" method="post" id="main-form" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Sửa videos
                    </h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Tên video</label>
                                <input type="text" value="{{$chappter_content->chappter_content_name}}" name="chappter_content_name" class="form-control"> 
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label>Link video</label>
                                <input type="text" value="{{$chappter_content->chappter_content_link}}" name="chappter_content_link" class="form-control"> 
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
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a onClick="history.go(-1);" class="btn btn-primary">Trở lại</a>  
                            </div>
                        </div>                      
                    </div>
                </div>

            </div>
        </form>
        @endforeach
    </div>
</div>

@endsection