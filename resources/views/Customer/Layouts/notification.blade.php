@extends('Customer.Layouts.index')

@section('content')

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="container-notification">
		@if(isset($thongBao))
		<div class="alert alert-success" style="text-align: center;">
			@lang('label.'.$thongBao.'')
		</div> 
		@endif
		<h2>@lang('label.Detail bills')</h2>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th><b>@lang('label.Customer information')</b></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><b>@lang('label.Customer name')</b></td>
					<td>{{ $customerInfo->lastname }} {{ $customerInfo->firstname }}</td>
				</tr>
				<tr>
					<td><b>@lang('label.Order date')</b></td>
					<td>{{ $customerInfo->bill_date_order }}</td>
				</tr>
				<tr>
					<td><b>@lang('label.Phone number')</b></td>
					<td>{{ $customerInfo->phone_number }}</td>
				</tr>
				<tr>
					<td><b>@lang('label.Customer address')</b></td>
					<td>{{ $customerInfo->country }}</td>
				</tr>
				<tr>
					<td><b>@lang('label.Delivery address')</b></td>
					<td>{{ $customerInfo->bill_address }},{{ $customerInfo->bill_city }}</td>
				</tr>
				<tr>
					<td><b>@lang('label.Email')</b></td>
					<td>{{ $customerInfo->email }}</td>
				</tr>
				<tr>
					<td><b>@lang('label.Note')</b></td>
					<td>{{ $customerInfo->bill_note }}</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th><b>STT</b></th>
					<th><b>@lang('label.Product name')</b></th>
					<th><b>@lang('label.QUANTITY')</b></th>
					<th><b>@lang('label.Price')</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach($billInfo as $key => $bill)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $bill->product_name }}</td>
					<td>{{ $bill->quantity }}</td>
					<td>{{ number_format($bill->price) }} VNĐ</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="3"><b>@lang('label.Total')</b></td>
					<td colspan="1"><b class="text-red">{{ number_format($customerInfo->bill_total) }} VNĐ</b></td>
				</tr>
			</tbody>
		</table>
		<div class="row">
			<div class="col-md-6">
				<p style="color: red">* @lang('label.You can review bill at email').</p>
			</div>
			<div class="col-md-6">
				<a class="btn btn-success back-home" href="{{Route('home')}}">@lang('label.Back home')</a> 
			</div>
		</div>	
	</div>
</section>

@endsection