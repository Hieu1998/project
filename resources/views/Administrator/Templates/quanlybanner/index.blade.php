@extends('Administrator.Layouts.Index')
@section('content')
@if(session('thongBao'))
<div class="alert alert-success" style="text-align: center;">
    {{session('thongBao')}}
</div> 
@endif
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#thembanner">
  Thêm Bannner
  </button>
<div class="card-body">
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="thembanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UpLoad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manager Banner</h4>
                  <form action="{{Route('thembanner') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="Image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" name="uploadImage">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2" name="uploadImage">Submit</button>
                    <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
      </div>
  </div>
</div>
      <table class="table table-bordered text-center">
        <form action="{{Route('quanlybanner')}}" method="POST">
         {{ csrf_field() }}
          <!-- sap xep tim kiem -->
          <div class="table-data__tool">
            <div class="filters m-b-45">
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Phân trang</label><br>
                <select name="phanTrang" id="phanTrang" class="form-control">
                  <option value="5" @if ($phanTrang == 5) selected="selected"  @endif >Trang Hiển Thị</option>
                  <option value="10" @if ($phanTrang == 10) selected="selected"  @endif>10</option>
                  <option value="20" @if ($phanTrang == 20) selected="selected"  @endif>20</option>
                  <option value="30" @if ($phanTrang == 30) selected="selected"  @endif>30</option>
                  <option value="40" @if ($phanTrang == 40) selected="selected"  @endif>40</option>
                </select> 
              </div>
              <div class="form-group col-md-3">
                <button class="btn btn-gradient-info btn-rounded btn-fw">Lọc</button>
                <a class="btn btn-gradient-secondary btn-rounded btn-fw" href="{{Route('quanlybanner')}}">
                  <i class="mdi mdi-refresh "></i>Reset
                </a>
              </div>
              <div class="float-left">
                {!! $danhSach->links() !!}
              </div>
            </div>
            <!-- end sap xep tim kiem -->
            <thead>
                      <tr>
                          <th>Image</th>
                          <th>IsSet</th>
                          <th>Function</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($danhSach as $value)
                      <tr>
                        <td class="images_banner">
                          <img src="/images/{{$value->link_image}}"/>
                        </td>
                        <td>
                            <label class="switch">
                              <input type="checkbox" onclick="is_set({{$value->id}});return false;" @if($value->is_set==1) {{"checked"}}  @endif >
                              <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                        <button type="button" class="btn btn-gradient-primary btn-sm" onclick="xoa({{$value->id}});return false;" data-toggle="tooltip" data-placement="top" title="Xóa">Delete</button>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
            </form>
      </table>

                </div>
              </div>
            </div>
<script>
    function xoa(id){
        if(confirm('Bạn muốn xóa không ?')){
            document.location.href="/xoabanner/"+id+"";
        }
    }
    function is_set(id){
      document.location.href="/activebanner/"+id+"";
    }
</script>
@endsection