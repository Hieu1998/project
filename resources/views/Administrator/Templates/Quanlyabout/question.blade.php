@extends('Administrator.Layouts.index')

@section('content')
@if(session('thongBao'))
<div class="alert alert-success text-center">
  {{session('thongBao')}}
</div> 
@endif
<div class="card">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themquestion">
    Thêm Mới Câu Hỏi
  </button>
  <!-- Modal -->
  <div class="modal fade" id="themquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm Câu Hỏi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Thêm Câu Hỏi</h4>
              <form action="{{Route('themquestion') }}" enctype="multipart/form-data" method="POST" class="forms-sample">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleInputName1">Title</label>
                  <textarea type="text" name="title" class="form-control" placeholder="Title" required></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Content</label>
                  <textarea name="content" placeholder="Content" class="form-control"  required></textarea>
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
  <table class="table table-bordered text-center">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Content</th>
        <th>Chức Năng</th>
      </tr>
    </thead>
    <tbody>
      @foreach($questions as $value)
      <tr>
        <td>{!! $value->id !!}</td>
        <td>{!!$value->title!!}</td>
        <td>{!!$value->content!!}</td>
        <td>
          <button type="button" class="btn btn-gradient-primary btn-sm" onclick="sua({{$value->id}});return false;" data-toggle="tooltip" data-placement="top" title="Xóa">Sửa</button>
          <button type="button" class="btn btn-gradient-primary btn-sm" onclick="xoa({{$value->id}});return false;" data-toggle="tooltip" data-placement="top" title="Xóa">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <script>
    function xoa(id){
      if(confirm('Bạn muốn xóa không ?')){
        document.location.href="/xoaquestion/"+id+"";
      }
    }
    function sua(id){
      if(confirm('Bạn muốn sửa không ?')){
        document.location.href="/suaquestion/"+id+"";
      }
    }
  </script>
  @endsection