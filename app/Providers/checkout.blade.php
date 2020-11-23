@extends('Customer.Layouts.index')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
</head>
<body>
	<div class="container">
		<h1 class="entry-title">Check out</h1>
		<div class="col-md-8">
			
		</div>
		<div class="col-md-4">
			<div class="sticky-top">	<!-- scrolling fixed -->
				<div class="row row-booking">
					<div class="col-md-6 head-book">
						<p class="nav-group fixed">
							Trip Duration
						</p>
					</div>
					<div class="col-md-6 head-book">
						<p class="nav-group fixed">
							Price
						</p>
					</div>
					<div class="col-5 row-right">
						<p>Day(s): 0 </p> 
						<p>Night(s): 0 </p> 
						<p>Group Size: No Size</p>
						<p>Limit</p>
					</div>
					<div class="col-3 row-right">
						<p>$68 / Person</p>
					</div>
					<div class="col-3 row-right">
						<button type="button" class="btn btn-outline-secondary">Book now</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

@endsection