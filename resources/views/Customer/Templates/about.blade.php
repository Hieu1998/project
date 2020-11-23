@extends('Customer.Layouts.index')

@section('content')
	<div class="container">
		<h1 class="entry-title">@lang('label.About Us')</h1>
		<div class="before-entry-title"></div>
		<div class="row background-row">
			<div class="col-sm-4">
			<h2>@lang('label.'.$about['title'].'')</h2>
				<p>{!!$about['content']!!}</p>
				<button type="button" class="btn btn-info">@lang('label.Get Started')</button>
			</div>
			<div class="col-sm-8">
				<iframe width="100%" height="400" src="https://www.youtube.com/embed/9uOETcuFjbE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<div class="row">
		@foreach($aboutElementor as $valueElementor)
			<div class="col-md-6 margin-col">
				<div class="col-12">
					<div class="col-icon"><i class="{!!$valueElementor->icon!!}"></i></div>
				</div>
				<div class="col-12 h3-about">
					<h3>{!!$valueElementor->title!!}</h3>
					<p>{!!$valueElementor->content!!}</p>
				</div>
			</div>
		@endforeach
		</div>
		<div class="rows">
			<div class="col-md-12">
				<h1 class="entry-title">@lang('label.Frequently Asked Questions')</h1>
			</div>
			@foreach($questions as $valueQuestions)
			<div class="col-md-12">
				<span class="tab-title-131" data-toggle="collapse" data-target="#collapse{!!$valueQuestions->id!!}" aria-expanded="false" aria-controls="collapse{!!$valueQuestions->id!!}">
					<i class="fas fa-caret-right"></i>{!!$valueQuestions->title!!}					
				</span>
				<div class="collapse" id="collapse{!!$valueQuestions->id!!}">
					<div class="card card-body">
						{!!$valueQuestions->content!!}
					</div>
				</div>
			</div>
			@endforeach
			<div class="col-md-12">
				<p>@lang('label.Workflow Optimization is a cross platform message optimization app for all devices'). <a href="{!!Route('contact')!!}">@lang('label.Contact')</a></p>
			</div>
		</div>
		<div class="row background-row">
			<div class="col-md-12">
				<h1 class="entry-title">@lang('label.Our Clients Say')</h1>
			</div>
			<div class="col-md-6 margin-col">
				<div class="col-12 out-clients">
					<p>"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo"</p>
				</div>
				<div class="col-12 testimonial-main">
					<div class="testimonial-image">
						<img width="268" height="275" src="http://christinas.zoomworld.vn/wp-content/uploads/2016/09/team_3.jpg" class="attachment-full size-full" alt="">						
					</div>
					<div class="testimonial-details">
						<div class="testimonial-name">Hilary Leigh</div>
						<div class="testimonial-job">Developer</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 margin-col">
				<div class="col-12 out-clients">
					<p>"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo"</p>
				</div>
				<div class="col-12 testimonial-main">
					<div class="testimonial-image">
						<img width="268" height="275" src="http://christinas.zoomworld.vn/wp-content/uploads/2016/09/team_4.jpg" class="attachment-full size-full" alt="">						
					</div>
					<div class="testimonial-details">
						<div class="testimonial-name">Quintin Angus</div>
						<div class="testimonial-job">Developer</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 margin-col">
				<div class="col-12 out-clients">
					<p>"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo"</p>
				</div>
				<div class="col-12 testimonial-main">
					<div class="testimonial-image">
						<img width="268" height="275" src="http://christinas.zoomworld.vn/wp-content/uploads/2016/09/25388788904_72d2f5ec6f_z.jpg" class="attachment-full size-full" alt="">						
					</div>
					<div class="testimonial-details">
						<div class="testimonial-name">Hall Read</div>
						<div class="testimonial-job">Developer</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 margin-col">
				<div class="col-12 out-clients">
					<p>"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo"</p>
				</div>
				<div class="col-12 testimonial-main">
					<div class="testimonial-image">
						<img width="268" height="275" src="http://christinas.zoomworld.vn/wp-content/uploads/2016/09/team_2.jpg" class="attachment-full size-full" alt="">						
					</div>
					<div class="testimonial-details">
						<div class="testimonial-name">Jillie Tempest</div>
						<div class="testimonial-job">Developer</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@endsection