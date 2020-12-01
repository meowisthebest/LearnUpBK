@extends('admin_layout')
@section('admin_content')
<div class="row">
              
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card text-left shadow">
          
          <form role="form" enctype="multipart/form-data" action="{{URL::to('/save-blog')}}" id="addBlog" method="post">
            {{@csrf_field()}}
            
              <div class="card-header py-3 d-flex justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Thêm bài đăng</h6>
                  <div>
                    <button type="submit" name="add_blog" class="btn btn-primary" >Thêm bài đăng</button>
                    <a href="{{URL::to('/list-blog')}}" class="btn btn-primary">Trở lại</a>
                  </div>
              </div>         
              <div class="card-body"> 
                    <div class="form-group">
                        <label for="">Tiêu đề bài đăng <span class="error">*</span></label>
                        <input type="text" class="form-control" name="blog_title" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group">
                      <label>Ảnh bài đăng <span class="error">*</span></label>
                      <br>
                        <input id="img" type="file" name="blog_img" class="form-control hidden" onchange="changeImg(this)">
                        <img style="width: 200px; object-fit: cover;" id="avatar" class="thumbnail" src="{{('public/Admin/img/co-1.jpg')}}">	
                    </div>  
                    
                    <div class="form-group">
                        <label>Nội dung bài đăng <span class="error">*</span></label>
                        <textarea type="text" rows="8" name="blog_content" class="form-control" id="ckeditorBlog"></textarea>
                    </div>
                    
                    <div class="text-right">
                      <span>Lưu ý: <span class="error">*</span> là bắt buộc nhập</span>              
                    </div>
              </div>
          </form>
        </div>
      
       
    </div>
</div>

<script>
  $(document).ready(function() {
    $("#addBlog").validate({
      onfocusout: false,
      onkeyup: false,
      onclick: false,
      rules: {
        "blog_title": {
          required: true,
          minlength: 3
        },
        "blog_img": {
          required: true
        }
      },
      messages: {
        "blog_title": {
          required: "Hãy nhập tiêu đề bài viết",
          maxlength: "Hãy nhập tối thiểu 3 ký tự"
        },
        "blog_img": {
          required: "Vui lòng chọn ảnh"
        }
      }
    });
  });
</script>

@endsection
