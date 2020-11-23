@extends('Administrator.Layouts.Index')
@section('content')
    <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                @if(session('thongBao'))
                  <div class="btn btn-block btn-lg btn-gradient-primary mt-4">
                    {{session('thongBao')}}
                  </div>
                @endif
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
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endsection