@extends('Administrator.Layouts.index')

@section('content')
@if(session('thongBao'))
<div class="alert alert-success" style="text-align: center;">
	{{session('thongBao')}}
</div> 
@endif


<!-- Edit trip -->
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Sửa trip</h4>
		<form action="{{Route('suatrip') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
        	<input type="hidden" name="id" value="{{$getTripEdit['id']}}">
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Tên trip</label>
				<div class="col-sm-9">
					<input type="text" id="name" name="name" value="{{$getTripEdit['name']}}" placeholder="Nhập tên trip" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Số ngày</label>
				<div class="col-sm-9">
					<input type="text" id="soNgay" name="soNgay" value="{{$getTripEdit['songay']}}" placeholder="Nhập số ngày" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Số đêm</label>
				<div class="col-sm-9">
					<input type="text" id="soDem" name="soDem" value="{{$getTripEdit['sodem']}}" placeholder="Nhập số đêm" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<button style="text-align:center;" type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
				<button type="button" onclick="back();" class="btn btn-gradient-danger btn-icon-text">Back</button>
			</div>
		</form>
	</div>
</div>
<!-- end edit trip -->
<script>
	function back(){
		history.back();
	}
</script>

@endsection