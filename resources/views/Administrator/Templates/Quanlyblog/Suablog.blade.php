@extends('Administrator.Layouts.index')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
<div class="card">

                <div class="card-body">
                  <form action="{{Route('suablog') }}" enctype="multipart/form-data" method="POST" class="forms-sample">
                     {{ csrf_field() }}
                     <input type="hidden" value="{{$danhSach['id']}}" name="id">
                    <div class="form-group">
                      <label for="exampleInputName1">Title</label>
                      <textarea type="text" name="title" class="form-control"required>{{$danhSach['title']}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Content</label>
                      <textarea name="content" class="form-control" required>{{$danhSach['content']}}</textarea>
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
                              publish 
                            <i class="input-helper"></i></label>
                          </div>
                    <div class="form-group">
                      <label>upload hình ảnh</label>
                      <input type="file" name="link_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" value="{{$danhSach['link_image']}}" class="form-control  file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
</div>     
@endsection