@extends('Customer.Layouts.index')

@section('content')
<head>
	<title>Contact</title>
</head>
<body>
	<div class="container">
		<h1 class="entry-title">@lang('label.Contact Us')</h1>
		<!-- thong bao send thanh cong -->
		@if(session('thongBao'))
		<div class="alert alert-success" style="text-align: center;">
			{{session('thongBao')}}  
		</div> 
		@endif
		<div class="before-entry-title"></div>
		<div class="row-form">
			<div class="row">
				<div class="col-sm-6 col-contact">
					<h2 class="Details-contact">@lang('label.Our Contact Details'):</h2>
					<div class="row our-contact">
						<div class="col-3"><i class="fa fa-location-arrow"></i></div>
						<div class="col-9">{{$contact['address']}}</div>
					</div>
					<div class="row our-contact">
						<div class="col-3"><i class="fa fa-phone"></i></div>
						<div class="col-9">{{$contact['phone']}}</div>
					</div>
					<div class="row our-contact">
						<div class="col-3"><i class="fa fa-envelope"></i></div>
						<div class="col-9">{{$contact['email']}}</div>
					</div>
					<div class="rows">
						<h2 class="Details-contact">@lang('label.Social Links'):</h2>
						<div class="col col-icon">
							<a href="{{$contact['link_facebook']}}" class="fab fa-facebook"></a>
							<a href="{{$contact['link_twitter']}}" class="fab fa-twitter"></a>
							<a href="{{$contact['link_Google']}}" class="fab fa-google"></a>
							<a href="{{$contact['link_skype']}}" class="fab fa-skype"></a>
							<a href="{{$contact['link_youtube']}}" class="fab fa-youtube"></a>
						</div>
					</div>
					<div class="rows">
						<h2 class="Details-contact">@lang('label.Office Hours'):</h2>
						<p>{{$contact['working_time']}}</p>
					</div>
				</div>
				<div class="col-sm-6 col-contact">
					<h2>@lang('label.Send Us An Email'):</h2>
					<form action="{{Route('sendMailContact')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label>@lang('label.Name') :</label>
							<input type="text" name="name" class="form-control" placeholder="@lang('label.Enter') @lang('label.Name')"></small>
						</div>
						<div class="form-group">
							<label>@lang('label.Email') :</label>
							<input type="email" name="email" class="form-control" placeholder="@lang('label.Enter') @lang('label.Email')"></small>
						</div>
						<div class="form-group">
							<label>@lang('label.Phone Number') :</label>
							<input type="text" name="phone" class="form-control" placeholder="@lang('label.Enter') @lang('label.Phone Number')">
						</div>
						<div class="form-group">
							<label>@lang('label.Message'):</label>
							<br>
							<textarea name="your_message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">@lang('label.Send')</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
@endsection