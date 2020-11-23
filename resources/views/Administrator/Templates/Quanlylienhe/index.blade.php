@extends('Administrator.Layouts.index')

@section('content')
<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thông Tin Liên Hệ</h4>
                  <p class="card-description">
                    Nhập thông tin liên hệ
                  </p>
                  <form action="{{Route('sualienhe') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
                  {{ csrf_field() }}
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input name="address" type="text" class="form-control" value="{{$contact['address']}}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input name="email" type="email" class="form-control" value="{{$contact['email']}}" id="exampleInputEmail2" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input name="phone"  type="text" class="form-control" value="{{$contact['phone']}}" id="exampleInputMobile" placeholder="Mobile number" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Working Time</label>
                      <div class="col-sm-9">
                        <input  name="working_time" type="text" value="{{$contact['working_time']}}" class="form-control" placeholder="Working Time" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Link Facebook</label>
                      <div class="col-sm-9">
                        <input name="link_facebook" type="text" class="form-control" value="{{$contact['link_facebook']}}" placeholder="Link Facebook">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Link Twitter</label>
                      <div class="col-sm-9">
                        <input name="link_twitter" type="text" class="form-control" value="{{$contact['link_twitter']}}" placeholder="Link Twitter">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Link Google</label>
                      <div class="col-sm-9">
                        <input name="link_Google" type="text" class="form-control" value="{{$contact['link_Google']}}" placeholder="Link Google">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Link Skype</label>
                      <div class="col-sm-9">
                        <input name="link_skype" type="text" class="form-control" value="{{$contact['link_skype']}}" placeholder="Link Skype">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Link Youtube</label>
                      <div class="col-sm-9">
                        <input name="link_youtube" type="text" class="form-control" value="{{$contact['link_youtube']}}" placeholder="Link Youtube">
                      </div>
                    </div>
                    <button type="submit" name="sualienhe" class="btn btn-gradient-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
@endsection