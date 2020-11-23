@extends('Administrator.Layouts.index')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">

    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <h4 class="card-title">Thêm mới blog</h4>
        </div>
        <div class="col-lg-6 text-right">
          <button type="button" data-toggle="modal" data-target="#themdanhmuc" class="btn btn-danger btn-fw">Thêm Danh Mục</button>
        </div>
      </div>
      <form action="{{Route('themmoiblog') }}" enctype="multipart/form-data" method="POST" class="forms-sample">
       {{ csrf_field() }}
       <div class="form-group">
        <label for="exampleInputName1">Title</label>
        <textarea type="text" name="title" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <label for="exampleTextarea1">Content</label>
        <textarea name="content" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">Danh Mục</label>
        <select name="idDanhMuc" class="form-control" id="exampleFormControlSelect2">
          @foreach($danhSachDanhMuc as $listDanhMuc)
          <option value="{{$listDanhMuc->id}}">{{ $listDanhMuc->tendanhmuc}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input name="is_publish" type="checkbox" class="form-check-input" value="1" checked>
          publish 
          <i class="input-helper"></i></label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input name="is_feature" type="checkbox" class="form-check-input" value="1" checked>
            is_feature 
            <i class="input-helper"></i></label>
          </div>
          <div class="form-group">
            <label>upload hình ảnh</label>
            <input type="file" name="link_image" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
      <div class="modal fade" id="themdanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <h4 class="card-title">Thêm Mới Danh Mục</h4>
                  <form action="{{Route('themdanhmucblog') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputUsername1">Tên Danh Mục</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="tendanhmuc" placeholder="Tên Danh Mục" required>
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
    </div>
  </div>     
  @endsection