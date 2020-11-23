@extends('Customer.Layouts.index')

@section('content')

@include('Customer.Layouts.banner')
<!-- thong bao chưa có cart-->
@if(session('thongBao'))
	<script>
		alert('{{session("thongBao")}}');
	</script>
@endif
<div class="container mt-3">
	<h2 class="text-center">@lang('label.Featured trips')</h2>
	<br>
	<!-- Nav tabs -->
	<div class="featured text-center">
		<ul class="nav nav-pills">
			@for($i = 0; $i < count($trips);$i++)
			@if($i == 0)
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#menu{{$trips[$i]->id}}">{{$trips[$i]->name}}</a>
			</li>
			@else
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#menu{{$trips[$i]->id}}">{{$trips[$i]->name}}</a>
			</li>
			@endif
			@endfor
		</ul>
	</div>
	<!-- Tab panes -->
	<div class="tab-content">
		@for($i = 0; $i < count($trips);$i++)
		@if($i == 0)
		<div id="menu{{$trips[$i]->id}}" class="container tab-pane active">
			<div class="row">
				@foreach($danhSach as $item)
				@if($item->idTrip == $trips[$i]->id)
				<div class="col-md-3 col-sm-6 py-4">
					<div class="product-grid2">
						<div class="product-image2">
							<a href="detailproduct/{{$item->idProduct}}">
								<img class="pic-1" src="images/{{$item->linkImage}}">
								<img class="pic-2" src="images/{{$item->linkImage}}">
							</a>
							<form method="POST" action="{{Route('cart')}}">
								<input type="hidden" name="product_id" value="{{$item->idProduct}}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-fefault add-to-cart">
									<i class="fa fa-shopping-cart"></i>
									@lang('label.Add to cart')
								</button>
							</form>
						</div>
						<div class="float-left col-12">
							<div>
								<span class="span-nameproduct">
									{{$item->nameProduct}}
								</span>
							</div>
							<div>
								<span>{{number_format($item->priceProduct)}} VNĐ</span>
							</div>
							<div class="trips-date">
								<i class="fa fa-calendar"></i>
								<span>{{$item->ngayBatDau}} – {{$item->ngayKetThuc}}</span>
							</div>
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>
		</div>
		@else
		<div id="menu{{$trips[$i]->id}}" class="container tab-pane fade">
			<div class="row">
				@foreach($danhSach as $item)
				@if($item->idTrip == $trips[$i]->id)
				<div class="col-md-3 col-sm-6 py-4">
					<div class="product-grid2">
						<div class="product-image2">
							<a href="detailproduct/{{$item->idProduct}}">
								<img class="pic-1" src="images/{{$item->linkImage}}">
								<img class="pic-2" src="images/{{$item->linkImage}}">
							</a>
							<ul class="social">
								<li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
								<li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
								<li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
							</ul>
							<form method="POST" action="{{Route('cart')}}">
								<input type="hidden" name="product_id" value="{{$item->idProduct}}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-fefault add-to-cart">
									<i class="fa fa-shopping-cart"></i>
									@lang('label.Add to cart')
								</button>
							</form>
						</div>
						<div class="float-left col-12">
							<div class="float-left">
								<span class="d-inline-block text-truncate" style="max-width: 120px;">
									{{$item->nameProduct}}
								</span>
							</div>
							<div class="float-right">
								<span>{{number_format($item->priceProduct)}} VNĐ</span>
							</div>
						</div>
						<div class="trips-date">
							<i class="fa fa-calendar"></i>
							<span>{{$item->ngayBatDau}} – {{$item->ngayKetThuc}}</span>
						</div>
					</div>
				</div>
				@endif
				@endforeach
			</div>
		</div>
		@endif
		@endfor
	</div>
</div>
<!-- end Featured Trips -->
@include('Customer.Layouts.Comment')

@endsection