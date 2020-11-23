@extends('Administrator.Layouts.index')
@section('content')
<form class="forms-sample">
  <div class="row">
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">ABOUT</h4>
            <div class="form-group">
                      <label for="exampleTextarea1">Giới Thiệu</label>
                      <textarea class="form-control" rows="4">{{$company['about']}}</textarea>
            </div>
        </div>
      </div>    
    </div>
    <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Contact</h4>
            <div class="form-group">
                      <label for="exampleTextarea1">Địa Chỉ</label>
                      <textarea class="form-control" rows="4">{{$company['contact']}}</textarea>
            </div>
        </div>
      </div>        
    </div>
    <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Thông Tin WebSite</h4>
            <div class="form-group">
                      <label for="exampleTextarea1">Site Info</label>
                      <textarea class="form-control" rows="4">{{$company['site_info']}}</textarea>
            </div>
        </div>
      </div>        
    </div>
    <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">STAY CONNECTED</h4>
            <div class="form-group">
              <label>Link FaceBook</label>
                  <input type="text" value="{{$company['link_facebook']}}" class="form-control">
            </div>
            <div class="form-group">
              <label>Link Instargram</label>
                  <input type="text" value="{{$company['link_instagram']}}" class="form-control">
            </div>
        </div>
      </div>     
    </div>
      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
      <button class="btn btn-light">Cancel</button>
    </form>
</div>
@endsection