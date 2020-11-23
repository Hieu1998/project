@extends('Administrator.Layouts.index')

@section('content')
<div class="card">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themdanhmucblog">
    Thêm Mới Danh Mục
    </button>
<!-- Modal -->
        <div class="modal fade" id="themdanhmucblog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Danh Mục Blog</h4>
                        <form action="{{Route('themdanhmucblog') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên Danh Mục</label>
                                <input type="text" name="tendanhmuc" class="form-control" placeholder="Tên Danh Mục" required>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </form>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        </div>
                <div class="card-body">
                @if(session('thongBao'))
                  <div class="btn btn-block btn-lg btn-gradient-primary mt-4">
                    {{session('thongBao')}}
                  </div>
                @endif
                  <h4 class="card-title">Danh Sách Blog</h4>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                       <th>ID</th>
                       <th>Tên Danh Mục</th>
                       <th>Function</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($danhSachDanhMuc as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->tendanhmuc}}</td>
                      <td>
                      <button type="button" class="btn btn-gradient-primary btn-sm" onclick="sua({{$value->id}});return false;" data-toggle="tooltip" data-placement="top" title="Xóa">Edit</button>
                        <button type="button" class="btn btn-gradient-primary btn-sm" onclick="xoa({{$value->id}});return false;" data-toggle="tooltip" data-placement="top" title="Xóa">Delete</button>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div> 
<script>
function sua(id){
        document.location.href="/suadanhmucblog/"+id+"";
    }
function xoa(id){
        if(confirm('Bạn muốn xóa không ?')){
            document.location.href="/xoadanhmucblog/"+id+"";
        }
    }
</script>  
@endsection