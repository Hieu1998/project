@extends('Administrator.Layouts.index')

@section('content')
<form action="{{Route('suaelementor')}}" enctype="multipart/form-data" method="POST"  class="forms-sample">
  {{ csrf_field() }}
  <input type="hidden" name="id" value="{{$aboutElementor['id']}}">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">ABOUT Elementor</h4>
            <div class="form-group">
              <label>Title</label>
              <textarea name="title" class="form-control" required>{{$aboutElementor['title']}}</textarea>
            </div>
            <div class="form-group">
              <label>Content</label>
              <textarea name="content" class="form-control" required>{{$aboutElementor['content']}}</textarea>
            </div>
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
            <span class="btn btn-light" onclick="goBack()">Cancel</span>
        </div>
    </div>
</form>
@endsection