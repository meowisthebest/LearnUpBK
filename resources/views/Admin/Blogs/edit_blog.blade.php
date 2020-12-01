@extends('admin_layout')
@section('admin_content')
<div class="row">            
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card text-left shadow">
          @foreach ($edit_blog as $key => $blog)
          <form role="form" enctype="multipart/form-data" action="{{URL::to('/update-blog/'.$blog->blog_id)}}" method="post">
            {{@csrf_field()}}
            
              <div class="card-header py-3 d-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sửa bài đăng</h6>
                  <div>
                    <button type="submit" name="edit_blog" class="btn btn-primary" >Sửa bài đăng</button>
                    <a href="{{URL::to('/list-blog')}}" class="btn btn-primary">Trở lại</a>
                  </div>
              </div>         
              <div class="card-body">               
                    <div class="form-group">
                        <label for="">Tiêu đề bài đăng:</label>
                        <input type="text" class="form-control" name="blog_title" aria-describedby="helpId" value="{{$blog->blog_title}}"
                    </div>

                    <div class="form-group mt-3">
                      <label>Ảnh bài đăng:</label>
                      <br>
                        <input id="img" type="file" name="blog_img" class="form-control hidden" onchange="changeImg(this)">
                        <img style="width: 200px; object-fit: cover;" id="avatar" class="thumbnail" src="{{URL::to('public/uploads/blog/'.$blog->blog_img)}}">	
                    </div> 
                    
                    <div class="form-group">
                      <label>Nội dung bài đăng</label>
                      <textarea type="text" rows="8" name="blog_content" class="form-control" id="ckeditorBlog">{{$blog->blog_content}}</textarea>
                  </div>
                </div>
              </div>
          </form>
          @endforeach
        </div> 
    </div>
</div>
@endsection
