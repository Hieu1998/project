@extends('Customer.Layouts.index')

@section('content')
<div class="img-header">
    <img width="100%" src="/images/{!!$chiTietBlog['link_image']!!}"></div>
    <div class="container td-post-header">
        <div class="td-post-header-holder">
            <header class="td-post-title">
                <ul class="td-category">
                    <li class="entry-category">
                        <a class="td-post-category" href="http://christinas.zoomworld.vn/category/location-guides/">{!!$tenDanhMuc['tendanhmuc']!!}</a>
                    </li>
                </ul>
                <h1 class="float-left entry-title">{!!$chiTietBlog['title']!!}</h1>
            </header>
        </div>
        <div class="post-blog">
            <span class="td-post-author-name-span">
                <a href="#">admin</a>
            </span>
            <span>-</span>
            <span class="td-post-date pr-2">
                <time>{!!$chiTietBlog['created_at']!!}</time>
            </span>
            <span><i class="fas fa-eye"></i></span>
            <span>{!!$chiTietBlog['view_count']!!}</i></span>
        </div>
    </div>
</div>
<div class="container">
    <!-- Share -->
    <div class="share">
        <ul>
            <li class="top"><a href="#"><i class="fas fa-star"></i></a></li>
            <li class="middle">
                <a class="share-icon" href="#"><i class="fas fa-share"></i></a> 
                <a class="facebook" href="#"><i class="fab fa-facebook"></i></a> 
                <a class="twitter" href="#"><i class="fab fa-twitter"></i></a> <span>2,625 Shares<span>
                </li>
                <li class="bottom"><a href="#"><i class="fa fa-heart"></i></a></li>
            </ul>
        </div>
        <!-- endShare -->
        <div class="td-post-content">
            <p>{!!$chiTietBlog['content']!!}</p>
        </div>
        <div class="clearfix"></div>
        <div class="author-box-wrap">
            <div class='share-post'>
                <span class="td-post-share-title">@lang('label.SHARE')</span>
                <a class="btn btn-social-icon-text btn-facebook"  href="https://www.facebook.com/sharer.php?u=https://ariranglon.com.vn/chitietblog/2" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><i class="fab fa-facebook"></i>Facebook</a>            
                <a class="btn btn-social-icon-text btn-twitter"><i class="fab fa-twitter"></i>Twitter</a>    
                <a class="btn btn-social-icon-text btn-google"><i class="fab fa-google-plus-g"></i>Google</a>
            </div>
            <div style='clear:both'></div>
        </div>
        <div class="author-box-wrap">
            <a href="#" class="float-left">
                <img alt="" src="http://0.gravatar.com/avatar/c5d15dfef87a28a7242876f371e118c6?s=96&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/c5d15dfef87a28a7242876f371e118c6?s=192&amp;d=mm&amp;r=g 2x" class="avatar avatar-96 photo td-animation-stack-type0-2" height="96" width="96">
            </a>
            <div class="td-author-name">
             <a href="#">Admin</a>
         </div>
         <div class="td-author-social"></div>
         <div class="clearfix"></div>
     </div>    
 </div>
 @endsection