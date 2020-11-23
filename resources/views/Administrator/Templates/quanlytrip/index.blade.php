@extends('Administrator.Layouts.index')

@section('content')
@if(session('thongBao'))
<div class="alert alert-success" style="text-align: center;">
	{{session('thongBao')}}
</div> 
@endif

<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<div class="row row-menu">
				<div class="col-md-12">
					<h3>Quản lý menu</h3>
				</div>
			</div>
			<!-- Button trigger modal -->
			<!-- Modal -->
			<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới trip</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<form action="{{Route('createtrip') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
									<input type="hidden" name="_token" value="{{csrf_token()}}"/>
									<div class="form-group">
										<label for="exampleInputUsername1">Tên trip</label>
										<input type="text" id="name" name="name" placeholder="Nhập tên trip" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="exampleInputUsername1">Số ngày</label>
										<input type="text" id="soNgay" name="soNgay" placeholder="Nhập số ngày" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="exampleInputUsername1">Số đêm</label>
										<input type="text" id="soDem" name="soDem" placeholder="Nhập số đêm" class="form-control" required>
									</div>
									<button type="submit" class="btn btn-gradient-primary mr-2" name="submit">Submit</button>
									<button class="btn btn-light" data-dismiss="modal">Cancel</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<table class="table table-bordered table-hover">
				<thead class="thead-dark" style="text-align: center;color: white;background: #34363a;">
					<tr>
						<th>TT</th>
						<th>Tên</th>
						<th>Số ngày</th>
						<th>Số đêm</th>
						<th>Chức năng</th>
					</tr>
				</thead>
				<tbody>
					@foreach($danhSach as $value)
					<div class="form-group">
						<tr style="background: #fff;text-align: center;">
							<td>
								{{$value->id}}
							</td>
							<td>
								{{$value->name}}
							</td>
							<td>
								{{$value->songay}}
							</td>
							<td>
								{{$value->sodem}}
							</td>
							<td style="text-align: center;width: 28%">
								<button onclick="sua({{$value->id}});return false;" class="btn btn-primary btn-gradient-dark btn-icon-text" title="Sửa">
									Edit<i class="mdi mdi-file-check btn-icon-append"></i>
								</button>
								<button onclick="xoa({{$value->id}});return false;" class="btn btn-gradient-success btn-icon-text" title="Xóa">
									Delete <i class="mdi mdi-delete"></i>
								</button>
							</td>
						</tr>
					</div>
					@endforeach
				</tbody>
			</table>
			<div class="test" style="text-align:center;margin: 30px 0">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
					Thêm Trip
				</button>
				<button type="button" onclick="back();" class="btn btn-gradient-danger btn-icon-text">Back</button>
			</div>
		</div>
	</div>
</div>

<script>
	function xoa(id){
		if(confirm('Bạn muốn xóa không ?')){
			document.location.href="xoatrip/"+id+"";
		}
	}
	function sua(id){
		document.location.href="suatrip/"+id+"";
	}
	function back(){
		history.back();
	}
</script>
@endsection