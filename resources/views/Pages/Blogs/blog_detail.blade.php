@extends('page_layout')
@section('pages_content')
@foreach ($blog_detail as $key => $blog)

<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">{{$blog->blog_title}}</h1>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->	

<!-- ============================ Agency List Start ================================== -->
<section class="gray">

    <div class="container">
    
        <!-- row Start -->
        <div class="row">
        
            <!-- Blog Detail -->
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="article_detail_wrapss single_article_wrap format-standard">
                    <div class="article_body_wrap">
                    
                        <div class="article_featured_image">
                            <img class="img-fluid" src="{{URL::to('public/uploads/blog/'.$blog->blog_img)}}" alt="">
                        </div>
                        
                        <div class="article_top_info">
                        </div>
                        <h2 class="post-title">{{$blog->blog_title}}</h2>
                        <p>{!!$blog->blog_content!!}</p>
                        <div class="article_bottom_info">
                            <div class="post-share text-right ">
                                <h4 class="pbm-title">Chia sẽ</h4>
                                <ul class="list">
                                    <li class="d-inline-block ml-3"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="d-inline-block ml-3"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="d-inline-block ml-3"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="d-inline-block ml-3"><a href="#"><i class="fab fa-vk"></i></a></li>
                                    <li class="d-inline-block ml-3"><a href="#"><i class="fab fa-tumblr"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single_article_pagination">
                            <div class="prev-post">
                                <a href="#" class="theme-bg">
                                    <div class="title-with-link">
                                        <span class="intro"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="article_pagination_center_grid">
                                <a href="#"><i class="ti-layout-grid3"></i></a>
                            </div>
                            <div class="next-post">
                                <a href="#" class="theme-bg">
                                    <div class="title-with-link">
                                        <span class="intro"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!-- Single blog Grid -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <!-- Trending Posts -->
                <div class="single_widgets widget_thumb_post">
                    <h4 class="title">Tin tức nổi bật</h4>
                    <ul>
                        @foreach ($trend_blog as $item => $trend)

                        <li>
                            <span class="left">
                                <img src="{{URL::to('public/uploads/blog/'.$trend->blog_img)}}" alt="" class="">
                            </span>
                            <span class="right">
                                <a class="feed-title" href="#">{{$trend->blog_title}}</a> 
                                <span class="post-date"><i class="ti-calendar"></i>3 Days ago</span>
                            </span>
                        </li>
                                                    
                        @endforeach
                    </ul>
                </div>
            </div>
            
        </div>
        <!-- /row -->					
        
    </div>
            
</section>

@endforeach
<!-- ============================ Agency List End ================================== -->
@endsection