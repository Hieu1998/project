@extends('Administrator.Layouts.index')

@section('content')
<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="box card">
		<div class="box-header with-border card-body">
			<h2>Detail bills</h2>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th><b>Thông tin khách hàng</b></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><b>Thông tin người đặt hàng</b></td>
						<td>{{ $customerInfo->lastname }} {{ $customerInfo->firstname }}</td>
					</tr>
					<tr>
						<td><b>Ngày đặt hàng</b></td>
						<td>{{ $customerInfo->bill_date_order }}</td>
					</tr>
					<tr>
						<td><b>Số điện thoại</b></td>
						<td>{{ $customerInfo->phone_number }}</td>
					</tr>
					<tr>
						<td><b>Địa chỉ khách hàng</b></td>
						<td>{{ $customerInfo->country }}</td>
					</tr>
					<tr>
						<td><b>Địa chỉ giao hàng</b></td>
						<td>{{ $customerInfo->bill_address }},{{ $customerInfo->bill_city }}</td>
					</tr>
					<tr>
						<td><b>Email</b></td>
						<td>{{ $customerInfo->email }}</td>
					</tr>
					<tr>
						<td><b>Ghi chú</b></td>
						<td>{{ $customerInfo->bill_note }}</td>
					</tr>
				</tbody>
			</table>
			<table class="table table-bordered table-hover">
			<thead>
				<tr role="row">
					<th><b>STT</b></th>
					<th><b>Tên sản phẩm</b></th>
					<th><b>Số lượng</b></th>
					<th><b>Giá tiền</b></th>
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
					<td colspan="3"><b>Tổng tiền</b></td>
					<td colspan="1"><b class="text-red">{{ number_format($customerInfo->bill_total) }} VNĐ</b></td>
				</tr>
			</tbody>
		</table>
		</div>
	</div>
</section>

@endsection