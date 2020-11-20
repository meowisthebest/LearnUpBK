@extends('admin_layout')
@section('admin_content')
<div class="row">            
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card text-left shadow">
          @foreach ($edit_category as $key => $cate)
          <form role="form" enctype="multipart/form-data" action="{{URL::to('/update-category/'.$cate->category_id)}}" method="post">
            {{@csrf_field()}}
            
              <div class="card-header py-3 d-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sửa danh mục</h6>
                  <div>
                    <button type="submit" name="edit_category" class="btn btn-primary" >Sửa danh mục</button>
                    <a href="{{URL::to('/list-category')}}" class="btn btn-primary">Trở lại</a>
                  </div>
              </div>         
              <div class="card-body">               
                    <div class="form-group">
                        <label for="">Tên danh mục:</label>
                        <input type="text" class="form-control" name="category_name" id="" aria-describedby="helpId" value="{{$cate->category_name}}"
                    </div>

                    <div class="form-group mt-3">
                      <label>Ảnh danh mục:</label>
                      <br>
                        <input id="img" type="file" name="category_img" class="form-control hidden" onchange="changeImg(this)">
                        <img style="width: 200px; object-fit: cover;" id="avatar" class="thumbnail" src="{{URL::to('public/uploads/category/'.$cate->category_img)}}">	
                    </div>                   
                </div>
              </div>
          </form>
          @endforeach
        </div> 
    </div>
</div>
@endsection
