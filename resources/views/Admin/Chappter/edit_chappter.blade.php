@extends('admin_layout')
@section('admin_content')
<div class="row">   
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @foreach ($edit_chappter as $key => $chappter)
        <form action="{{URL::to('/update-chappter/'.$chappter->chappter_id)}}" method="post" id="main-form" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                      Sửa chương
                    </h6>
                  </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label>Tên chương</label>
                            <input type="text" name="chappter_name" value="{{$chappter->chappter_name}}" class="form-control">
                            <br>
                            <label>Khóa học</label>
                            <select  name="course_id" class="form-control">
                                <option value="">-- Chọn khóa học --</option>
                                @foreach ($course as $key => $course)
                                            @if ($chappter->course_id == $course->course_id)
                                                <option selected value="{{$course->course_id}}">{{$course->course_name}}</option>
                                            @else
                                                <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                            @endif
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <button type="submit" class="btn btn-primary ">Cập nhật</button>
                            <a onClick="history.go(-1);" class="btn btn-primary">Trở lại</a>  

                        </div>
                    </div>  
                </div>

            </div>
        </form>
        @endforeach
    </div>
</div>

@endsection