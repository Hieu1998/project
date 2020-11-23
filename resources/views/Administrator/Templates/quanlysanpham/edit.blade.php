@extends('Administrator.Layouts.index')

@section('content')

@if(session('Success'))
<div class="alert alert-success" style="text-align: center;">
	{{session('Success')}}
</div> 
@endif

<!-- Edit product -->
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Thông Tin Liên Hệ</h4>
		<p class="card-description">
			Nhập thông tin liên hệ
		</p>
		@foreach($getProductEdit as $getProductEdit)
		<form action="{{Route('suasanpham') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$getProductEdit['idProduct']}}"/>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tên sản phẩm</label>
				<div class="col-sm-9">
					<input type="text" id="name" name="name" value="{{$getProductEdit['nameProduct']}}" placeholder="Nhập tên sản phẩm" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Giá</label>
				<div class="col-sm-9">
					<input type="text" id="price" name="price" value="{{$getProductEdit['priceProduct']}}" placeholder="Nhập giá" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="exampleInputMobile" class="col-sm-3 col-form-label">Mô tả</label>
				<div class="col-sm-9">
					<textarea name="description"  placeholder="Nhập mô tả" class="form-control">{{$getProductEdit['descriptionProduct']}}</textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Trips</label>
				<div class="col-sm-9">
					<select name="idTrip" id="idTrip" class="form-control">
						@foreach($trips as $value)
						<option value="{{$value->id}}">{{$value->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Số lượng người</label>
				<div class="col-sm-9">
					<input type="text" id="quantityPerson" name="quantityPerson" value="{{$getProductEdit['quantityPersonProduct']}}" placeholder="Nhập tên số lượng người" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Ngày bắt đầu</label>
				<div class="col-sm-9">
					<input type="date" id="ngayBatDau" name="ngayBatDau" value="{{$getProductEdit['ngayBatDau']}}" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Ngày kết thúc</label>
				<div class="col-sm-9">
					<input type="date" id="ngayKetThuc" name="ngayKetThuc" value="{{$getProductEdit['ngayKetThuc']}}" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Is_feature</label>
				<div class="col-sm-9">
					<label class="switch">
						<input type="checkbox" name="is_feature">
						<span class="slider round"></span>
					</label>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">File upload</label>
				<div class="col-sm-9">
					<input type="file" name="Image" class="file-upload-default">
					<div class="input-group col-xs-12">
						<input type="text" class="form-control file-upload-info" value="{{$getProductEdit['linkImage']}}" disabled placeholder="Upload Image" name="uploadImage">
						<span class="input-group-append">
							<button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
						</span>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<button style="text-align:center;" type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
				<span class="btn btn-light" onclick="goBack()">Cancel</span>
			</div>
		</form>
		@endforeach
	</div>
</div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'description' );
    $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Vui lòng không được bỏ trống' );
                e.preventDefault();
            }
        });
</script>
@endsection