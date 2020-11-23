<?php
use App\MenuModel;
//lấy tree menu
$tree = MenuModel::GetMenuByChaIdToTree(1);	//1 là id của root
//in menu theo tree
$danhSach = MenuModel::GetSystemMenu($tree,true);
$cart = MenuModel::ShowCart();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-container">
	<a class="navbar-brand" href="/home"><img src="user_asset\css\images\unnamed.jpg"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!--navbar-left -->
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<?=$danhSach?>
		<!-- change language -->
		<div class="dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownChangeLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				@lang('label.Change language')
			</button>
			<div class="dropdown-menu dropdownLanguage" aria-labelledby="dropdownChangeLanguage">
				<a href="{{url(Request::getPathInfo().'?lang=vi')}}" class="btn btn-danger"><img src="images/covietnam.png" width="20px" height="auto"> @lang('label.Vietnamese')</a>
				<a href="{{url(Request::getPathInfo().'?lang=en')}}" class="btn btn-primary"><img src="images/england.png" width="20px" height="auto"> @lang('label.English')</a>
			</div>
		</div>
		<!-- end change language -->
		<!-- navbar-right -->
		<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#cart-toggle"><i class="fa fa-shopping-cart"></i> @lang('label.Cart') {{count($cart)}}</button>
		<div id="cart-toggle" class="collapse cart-toggle">
			@if(count($cart) > 0)
			<div class="shopping-cart">
				<div class="shopping-cart-header">
					<i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{count($cart)}}</span>
					<div class="shopping-cart-total">
						<span class="lighter-text">@lang('label.Total'):</span>
						<span class="main-color-text">{{ Cart::subtotal() }} VNĐ</span>
					</div>
				</div> <!--end shopping-cart-header -->

				<ul class="shopping-cart-items">
					@foreach($cart as $item)
					<li class="clearfix">
						@foreach($item->options as $value)
						<img width="80px" height="auto" src="images/{{$value}}"/>
						@endforeach
						<span class="item-name">{{ $item->name}}</span>
						<span class="item-price">{{ number_format($item->price)}} VNĐ <br></span>
						<span class="item-quantity">Quantity: {{$item->qty}}</span>
					</li>
					@endforeach
				</ul>
				<form action="{{Route('gotocart')}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-info" style="width: 100%">@lang('label.Go to cart')</button>
				</form>
			</div>
			@else
			<div class="shopping-cart">
				<div class="shopping-cart-header">
					<i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{count($cart)}}</span>
					<div class="shopping-cart-total">
						<span class="lighter-text">@lang('label.Total')</span>
						<span class="main-color-text">{{ Cart::subtotal() }} VNĐ</span>
					</div>
				</div> <!--end shopping-cart-header -->
				<ul class="shopping-cart-items">
					<li><p>@lang('label.You have no items in the shopping cart')</p></li>
				</ul>
			</div>
			@endif
		</div>
		<!--end navbar-right -->
	</div>
	<!--end navbar-left -->
</nav>
<!-- <script>
	function myFunction(){
		var url = document.getElementById('mySelect').value;
		if(url == 'en'){
			document.location.href= "{{url(Request::getPathInfo().'?lang=en')}}";
		}else if(url == 'vi'){
			document.location.href= "{{url(Request::getPathInfo().'?lang=vi')}}";
		}
	}
</script> -->