@extends('Administrator.Layouts.index')

@section('content')
@if(session('thongBao'))
<div class="alert alert-success" style="text-align: center;">
    {{session('thongBao')}}
</div> 
@endif
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh Sách Thông Tin Liên Hệ</h4>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Chức Năng</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($danhSach as $value)
                      <tr>
                        <td>{!!$value->name!!}</td>
                        <td>{!!$value->email!!}</td>
                        <td>{!!$value->phone!!}</td>
                        <td>{!!$value->message!!}</td>
                        <td><button type="button" class="btn btn-gradient-primary btn-sm" onclick="xoa({{$value->id}});return false;" data-toggle="tooltip" data-placement="top" title="Xóa">Delete</button></td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
<script>
  function xoa(id){
    if(confirm('Bạn muốn xóa không ?')){
      document.location.href="/xoathongtinlienhe/"+id+"";
    }
  }
</script>
@endsection