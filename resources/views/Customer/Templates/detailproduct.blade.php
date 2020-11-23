@extends('Customer.Layouts.index')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>booking</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		</ol>
		<div class="carousel-inner" style="height:606px;">
			<div class="carousel-item active">
				<img class="d-block w-100" src="http://christinas.zoomworld.vn/wp-content/uploads/2018/08/winter-mountain-snow-nature-imac-27-1024x640.jpg" alt="First slide">
				<div class="carousel-caption d-none d-md-block">
					<h5>Evening Food Tour</h5>
					<p>Sai Gon</p>
				</div>
			</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-left">
				<div class="sticky-top">	<!-- scrolling fixed -->
					<nav id="navbar-example2" class="navbar navbar-light bg-light">
						<ul class="nav nav-pills">
							<li class="nav-item">
								<a class="nav-link" href="#overview">@lang('label.Overview')</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#trip_outline">@lang('label.Itinerary')</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#reviews">@lang('label.Reviews')</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#gallery">@lang('label.Gallery')</a>
							</li>
						</ul>
					</nav>
				</div>
				<div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
					@foreach($danhSach as $value)
					<div id="overview" class="tab-list-content">
						<h2>@lang('label.Overview')</h2>
						<p>{!!$value->nameProduct!!}</p>
					</div>
					<div id="trip_outline" class="tab-list-content">
						<h2>@lang('label.Detailed itinerary')</h2>
						<p>{!!$value->descriptionProduct!!}</p>
					</div>
					<div id="reviews" class="tab-list-content">
						<h2 style="font-size: 28px; font-weight: 600; line-height: 34px; color: rgb(69, 70, 71) margin-top: 10px;;">@lang('label.Reviews')</h2>
						<div id="reviews">
							<div class="background-row">
								<!-- thong bao xoa thanh cong -->
								@if(session('thongBao'))
								<div class="alert alert-success" style="text-align: center;">
									@lang('label.'.session("thongBao").'')
								</div> 
								@endif
								@if(count($reviews) > 0)
								<div class="col-md-12">
									<table class="review-table"> 
										@foreach($reviews as $value)
										<tr>
											<td>
												<tr>
													<td class="btn btn-primary review-detail">Name</td>
													<td>{!!$value->name!!}</td>
												</tr>
												<tr>
													<td class="btn btn-danger review-detail">Comment</td>
													<td colspan="2">{!!$value->reviews!!}</td>
												</tr>
											</td>
										</tr>
										@endforeach
										<tr>
											<td>
									   			<br>{!! $reviews->links() !!}
											</td>
										</tr>
									</table>
								</div>
								@else
								<div class="col-12 alert alert-primary" role="alert">
									@lang('label.There are no reviews yet')
								</div>
								<h3 class="comment-reply-title">@lang('label.Be the first to review')</h3>
								@endif
								<div class="col-12 text-warning">
									<p style="color: #007bff">@lang('label.Your Rating')</p>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="col-12">
									<form action="{{Route('reviewDetailProduct')}}" method="POST">
										<input type="hidden" name="product_id" value="{{$value->product_id}}{{$value->idProduct}}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="form-group form-reviews">
											<label>@lang('label.Your reviews'):</label>
											<br>
											<textarea name="your_reviews" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea>
										</div>
										<div class="row-form-reviews">
											<div class="col-md-6 form-group">
												<label>@lang('label.Name') :</label>
												<input type="text" name="name" class="form-control" placeholder="Enter @lang('label.Name')"></small>
											</div>
											<div class="col-md-6 form-group">
												<label>@lang('label.Email') :</label>
												<input type="email" name="email" class="form-control" placeholder="Enter @lang('label.Email')"></small>
											</div>
										</div>
										<button type="submit" class="btn btn-primary">@lang('label.Send')</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<div id="gallery" class="tab-list-content">
						<h2 class="h2-gallery">@lang('label.Gallery')</h2>
						<div class="row">
							@foreach($danhSach as $value)
							<div class="col-sm-4">	
								<img src="images/{{$value->linkImage}}" class="img-thumbnail" alt="{{$value->nameProduct}}" width="304" height="236"> 
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			@foreach($danhSach as $value)
			<div class="col-md-4 col-right">
				<div class="sticky-top">	<!-- scrolling fixed -->
					<div class="row row-booking">
						<div class="col-md-6 head-book">
							<p class="nav-group fixed">
								@lang('label.Trip Duration')
							</p>
						</div>
						<div class="col-md-6 head-book">
							<p class="nav-group fixed">
								@lang('label.Price')
							</p>
						</div>
						<div class="col-5 row-right">
							<p>@lang('label.Day')(s): {{$value->soNgay}} </p> 
							<p>@lang('label.Night')(s): {{$value->soDem}} </p> 
							<p>@lang('label.Group Size: No Size')</p>
							<p>@lang('label.Limit')</p>
						</div>
						<div class="col-3 row-right">
							<p>{{$value->priceProduct}}đ / {{$value->quantityPersonProduct}} Person</p>
						</div>
						<div class="col-3 row-right">
							<form method="POST" action="{{Route('cart')}}">
								<input type="hidden" name="product_id" value="{{$value->idProduct}}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-outline-secondary">
									@lang('label.Book now')
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</body>
</html>
@endsection