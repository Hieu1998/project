@extends('Administrator.Layouts.Index')
@section('content')
@if(session('thongBao'))
<div class="alert alert-success" style="text-align: center;">
    {{session('thongBao')}}
</div> 
@endif

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themhinhanh">
      Thêm hình ảnh
    </button>
    <div class="card-body">
      <!-- Button trigger modal -->
      <!-- Modal -->
      <div class="modal fade" id="themhinhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <h4 class="card-title">Manager Images</h4>
                  <form action="{{Route('uploadImage') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
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
      <table class="table table-bordered table-hover">
        <thead class="thead-dark" style="text-align: center;color: white;background: #34363a;">
          <tr>
            <th>link</th>
            <th>IsSet</th>
            <th>Image</th>
            <th>Function</th>
          </tr>
        </thead>
        <tbody>
          @foreach($danhSach as $value)
          <tr style="text-align: center;">
            <td>{{$value->link}}</td>
            <td>
              <label class="switch">
                <input  type="checkbox" @if($value->is_set==1) {{"checked"}}  @endif>
                <span class="slider round"></span>
              </label>
            </td>
            <td class="images_admin">
              <img class="imgproduct" src="/images/{{$value->link}}"/>
            </td>
            <td>
              <button type="button" class="btn btn-gradient-primary btn-sm"  data-toggle="modal" data-target="#suahinhanh" >Edit</button>
              <button type="button" class="btn btn-gradient-primary btn-sm" onclick="xoa({{$value->id}});return false;" data-toggle="tooltip" data-placement="top" title="Xóa">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  function xoa(id){
    if(confirm('Bạn muốn xóa không ?')){
      document.location.href="/xoahinhanh/"+id+"";
    }
  }
</script>
@endsection