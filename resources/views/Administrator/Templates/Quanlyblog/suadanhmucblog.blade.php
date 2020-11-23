@extends('Administrator.Layouts.index')

@section('content')
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Danh Mục Blog</h4>
                        <form action="{{Route('suadanhmucblog') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$danhMucBlog['id']}}" name="id">
                            <div class="form-group">
                                <label>Tên Danh Mục</label>
                                <input type="text" value="{{$danhMucBlog['tendanhmuc']}}" name="tendanhmuc" class="form-control" placeholder="Tên Danh Mục" required>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </form>
                        </div>
                    </div>
                    </div>
            </div>
@endsection