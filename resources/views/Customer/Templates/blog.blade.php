@extends('customer.layouts.index')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
</head>
<body>
	<div class="container">
		<div class="row row-trending-now-title">
			<div class="trending-now-title">@lang('label.Trending Now')</div>
		</div>
		<div class="row">
			<div class="col-md-6 blog-img-left">
			@for($i = 0; $i < count($trending);$i++)
				@if($i == 0)
				<div class="module-thumb">
					<a href="chitietblog/{{$trending[$i]->id}}">
						<img class="entry-thumb grow" src="images/{{$trending[$i]->link_image}}">
					</a>
				</div>
				<div class="td-meta-info-container">
					<div class="td-meta-align">
						<div class="td-big-grid-meta">
							<a href="#" class="td-post-category">{!!$trending[$i]->tendanhmuc!!}</a>                        
							<h3 class="td-module-title">
								<a href="chitietblog/{{$trending[$i]->id}}" rel="bookmark" title="{{$trending[$i]->title}}">{!!$trending[$i]->title!!}</a>
							</h3>                    
						</div>
						<div class="td-module-meta-info">                       
							<span class="td-post-date">
								<time class="entry-date updated td-module-date" datetime="2018-07-04T04:37:12+00:00">July 4, 2018</time>
							</span>                    
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="row">
				@elseif($i == 1)
					<div class="col-12 img-top-blog">
					<a href="chitietblog/{{$trending[$i]->id}}">
						<img class="grow" src="images/{{$trending[$i]->link_image}}">
						<div class="td-meta-info-container">
							<div class="td-meta-align">
								<div class="td-big-grid-meta">
									<a href="http://christinas.zoomworld.vn/category/culture-history/" class="td-post-category">{{$trending[$i]->tendanhmuc}}</a>                        
									<h4 class="td-module-title-right">
										<a href="chitietblog/{{$trending[$i]->id}}" rel="bookmark" title="{{$trending[$i]->title}}">{{$trending[$i]->title}}</a>
									</h4>                    
								</div>
							</div>
						</div>
					</div>
					
					@elseif($i == 2)
					<div class="col-6 img-top-bottom img-blog-right-first">
					<a href="chitietblog/{{$trending[$i]->id}}">
						<img class="grow" src="images/{{$trending[$i]->link_image}}">
						<div class="td-meta-info-container">
							<div class="td-meta-align">
								<div class="td-big-grid-meta">
									<a href="http://christinas.zoomworld.vn/category/culture-history/" class="td-post-category">{{$trending[$i]->tendanhmuc}}</a>                        
									<h4 class="td-module-title-right">
										<a href="chitietblog/{{$trending[$i]->id}}" rel="bookmark" title="{{$trending[$i]->title}}">{{$trending[$i]->title}}</a>
									</h4>                    
								</div>
							</div>
						</div>
					</div>
					@elseif($i == 3)
					<div class="col-6 img-top-bottom">
					<a href="chitietblog/{{$trending[$i]->id}}">
						<img class="grow" src="images/{{$trending[$i]->link_image}}">
						<div class="td-meta-info-container">
							<div class="td-meta-align">
								<div class="td-big-grid-meta">
									<a href="http://christinas.zoomworld.vn/category/culture-history/" class="td-post-category">{{$trending[$i]->tendanhmuc}}</a>                        
									<h4 class="td-module-title-right">
										<a href="chitietblog/{{$trending[$i]->id}}" rel="bookmark" title="{{$trending[$i]->title}}">{{$trending[$i]->title}}</a>
									</h4>                    
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
			@endfor
			</div>

		</div>
		<div class="row row-content-blog">
		<div class="col-md-8">
		@foreach($danhMucBlog as $valueDanhMucBlog)
				<h4 class="block-title">
					<span class="td-pulldown-size">{!!$valueDanhMucBlog->tendanhmuc!!}</span>
				</h4>
			<div class="row row-content-blog-children">
		@foreach($allBaiViet as $key=> $value)
			@for($j = 0; $j < count($value);$j++)
				@if($valueDanhMucBlog->id == $value[$j]->idDanhMuc)
					@if($j == 0)
						<div class="col-md-6 img-blog">
							<div class="col-12 col-blog-content">
								<a href="/chitietblog/{{$value[$j]->id}}">
									<img src="/images/{{$value[$j]->link_image}}">
								</a>
							</div>
							<div class="col-12 col-blog-content">
								<div class="post-blog-h3">
									<h3 class="h3-fl-left">
										<a href="/chitietblog/{{$value[$j]->id}}" rel="bookmark" title="{{$value[$j]->title}}">{!!$value[$j]->title!!}</a>
									</h3>
								</div>
								<div class="post-blog">
									<span class="td-post-author-name-span">
										<a href="#">admin</a>
									</span>
									<span>-</span>
									<span class="td-post-date">
										<time>{{$value[$j]->updated_at}}</time>
									</span>
									<div class="td-module-comments">
										<a class="text-white">{{$value[$j]->view_count}}</a>
									</div>
								</div>
								<div class="td-excerpt">
									<span class="d-inline-block text-truncate" style="max-width: 300px;">
										{!!$value[$j]->content!!}
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 img-blog">
							@for($k = 1;$k < count($value);$k++)
							<div class="col-md-12 td-module-thumb">
								<a href="/chitietblog/{{$value[$k]->id}}" rel="bookmark" title="{{$value[$k]->title}}">
									<img width="100" height="67" class="entry-thumb td-animation-stack-type0-2" src="/images/{{$value[$k]->link_image}}">
								</a>
								<div class="post-blog">
									<span class="td-post-author-name-span">
										<a href="/chitietblog/{{$value[$k]->id}}">{!!$value[$k]->title!!}</a>
									</span>
									<br>
									<span class="td-post-date">
										<time>{{$value[$k]->updated_at}}</time>
									</span>
								</div>
							</div>
							@endfor
						</div>	
					@endif		
				@endif
			@endfor
		@endforeach
			</div>
			@endforeach
		</div>
			<div class="col-md-4">
				<h4 class="block-title">
					<span class="td-pulldown-size">@lang('label.MOST POPULAR ARTICLES')</span>
				</h4>
				@foreach($baiVietPhoBien as $valuebaiVietPhoBien)
					<div class="col-md-12 td-module-thumb">
						<a href="/chitietblog/{{$valuebaiVietPhoBien->id}}" rel="bookmark" title="Time for a holiday">
							<img width="100" height="67" class="entry-thumb td-animation-stack-type0-2" src="/images/{{$valuebaiVietPhoBien->link_image}}">
						</a>
						<div class="post-blog">
							<span class="td-post-author-name-span">
								<a href="/chitietblog/{{$valuebaiVietPhoBien->id}}">{!!$valuebaiVietPhoBien->title!!}</a>
							</span>
							<span class="td-post-date">
								<time>{{$valuebaiVietPhoBien->created_at}}</time>
							</span>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</body>
</html>

@endsection