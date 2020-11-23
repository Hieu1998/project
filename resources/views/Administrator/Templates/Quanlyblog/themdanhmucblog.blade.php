@extends('Administrator.Layouts.index')

@section('content')
<div class="card">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh Mục Blog</h4>
                <form action="{{Route('themdanhmucblog') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên Danh Mục</label>
                        <input type="text" name="tendanhmuc" class="form-control" placeholder="Tên Danh Mục" required>
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
@endsection