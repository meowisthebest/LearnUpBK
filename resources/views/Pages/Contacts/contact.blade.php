@extends('page_layout')
@section('pages_content')
<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Liên Hệ</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->	

<!-- ============================ Agency List Start ================================== -->
<section class="bg-light">

    <div class="container">
    
        <!-- row Start -->
        <div class="row">
        
            <div class="col-lg-8 col-md-7">
                <?php
                    $message_contact = Session::get('message_contact');
                    if($message_contact){
                        echo '<div class="alert alert-success alert-dismissible out4s" role="alert"> 
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                                .$message_contact.
                            '</div>';  
                        Session::put('message_contact', null);
                    };
                ?>
                <div class="prc_wrap">
                    
                    <form action="{{URL::to('/save-contact')}}" method="GET" class="prc_wrap-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Họ và Tên</label>
                                    <input name="name" type="text" class="form-control simple">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control simple">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input name="title" type="text" class="form-control simple">
                        </div>
                        
                        <div class="form-group">
                            <label>Lời nhắn</label>
                            <textarea name="message" class="form-control simple"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-theme" type="submit">Gửi</button>
                        </div>
                    </form>
                    
                </div>
                                
            </div>
            
            <div class="col-lg-4 col-md-5">
            
                <div class="prc_wrap">
                    
                    <div class="prc_wrap_header">
                        <h4 class="property_block_title">Thông Tin Liên Lạc</h4>
                    </div>
                    
                    <div class="prc_wrap-body">
                        <div class="contact-info">
                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-home"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">Địa Chỉ</h4>
                                    450 Tran Dai Nghia,<br>Ngu Hanh Son,<br>Da Nang
                                </div>
                            </div>
                            
                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-email"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">Email</h4>
                                    nguyenminhlong@learnup.com
                                    <br>support@learnup.com
                                </div>
                            </div>
                            
                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-mobile"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">Gọi cho chúng tôi</h4>
                                    +84 961 340 573<br> +84 845 143 527
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        <!-- /row -->		
        
    </div>
            
</section>
<!-- ============================ Agency List End ================================== -->
@endsection