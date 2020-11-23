@extends('Administrator.Layouts.index')

@section('content')
<!-- thong bao edit thanh cong -->
@if(session('Success'))
<div class="alert alert-success" style="text-align: center;">
    {{session('Success')}}
</div> 
@endif
<div class="card-body card-margin">
    <h3 class="card-title">Thêm mới menu</h3>
    <form class="forms-sample" action="{{route('suamenu')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="id" value="{{$getMenuGroup['id']}}">
        <div class="form-group">
            <label for="exampleInputUsername1">Tên Menu</label>
            <input type="text" id="ten" name="ten" value="{{$getMenuGroup['ten']}}" placeholder="Nhập tên menu" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">URL</label>
            <input type="text" id="url" name="url" value="{{$getMenuGroup['url']}}" placeholder="Nhập url" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Thuộc cấp</label>
            <select name="chaId" id="chaId" class="form-control">
                @foreach($getMenu as $value)
                @if($value->id == $getMenuGroup['chaId'])
                <option value="{{$value->id}}">{{$value->ten}}</option>
                @endif
                @endforeach
                @foreach($danhSach as $value)
                <option value="{{$value->id}}"><?=str_repeat('---',$value->level)?>{{$value->ten}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" style="text-align: center;">
            <button style="text-align:center;" type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
            <button type="button" onclick="back();" class="btn btn-gradient-danger btn-icon-text">Back</button>
        </div>
    </form>
</div>
<script>
    function back(){
        history.back();
    }
</script>
<script>
jQuery.noConflict();
    (function($) {
        $("#formThemMenu").validate({
            rules: {
                ten: {
                    required: true, // không được bỏ trống
                    minlength: 2 // độ dài min = 4
                },
                url: {
                    required: true, // không được bỏ trống
                    minlength: 2 // độ dài min = 4
                }
            },
            messages:{
                ten:{
                    required:"Vui lòng nhập tên menu", // thông báo khi bị bỏ trống
                    minlength: "Tên cấu hình từ 2 - 16 ký tự" // thông báo khi không đúng độ dài
                },
                url:{
                    required:"Vui lòng nhập url", // thông báo khi bị bỏ trống
                    minlength: "Tên cấu hình từ 2 - 16 ký tự" // thông báo khi không đúng độ dài
                }
            }
        });
})(jQuery);
</script>
@endsection
