@extends('Administrator.Layouts.index')

@section('content')
<!-- thong bao xoa thanh cong -->
@if(session('Success'))
<div class="alert alert-success" style="text-align: center;">
    {{session('Success')}}
</div> 
@endif

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row row-menu">
        <div class="col-md-12">
          <h3>Quản lý menu</h3>
        </div>
      </div>
      <!-- Button trigger modal -->
      <!-- Modal -->
      <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới sản phẩm</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <form action="{{Route('createmenu') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Tên Menu</label>
                    <input type="text" id="ten" name="ten" placeholder="Nhập tên menu" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">URL</label>
                    <input type="text" id="url" name="url" placeholder="Nhập url" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Thuộc cấp</label>
                    <select name="chaId" id="chaId" class="form-control">
                      <option value="0">Chọn cấp</option>
                      @foreach($danhSachMenu as $value)
                      <option value="{{$value->id}}"><?=str_repeat('---',$value->level)?>{{$value->ten}}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary mr-2" name="uploadImage">Submit</button>
                  <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <table class="table table-bordered table-hover">
        <thead class="thead-dark" style="text-align: center;color: white;background: #34363a;">
          <tr>
            <th>TT</th>
            <th>Tên</th>
            <th>URL</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($danhSach as $menu)
          <div class="form-group">
            <tr style="background: #fff;">
              <td class="text-center" style="    width: 77px;">
                @if($menu->level == 1)
                <i class="fa fa-terminal"></i>
                @endif
              </td>
              <td>

                @if($menu->level != 1)
                <?= str_repeat('|----|',$menu->level)?>
                @else
                <?= str_repeat('|----',$menu->level)?>
                @endif
                {{$menu->ten}}

              </td>
              <td>{{$menu->url}}</td>
              <td style="text-align: center;width: 28%">
                <button onclick="sua({{$menu->id}});return false;" class="btn btn-primary btn-gradient-dark btn-icon-text" title="Sửa">
                  Edit<i class="mdi mdi-file-check btn-icon-append"></i>
                </button>
                <button onclick="xoa({{$menu->id}});return false;" class="btn btn-gradient-success btn-icon-text" title="Xóa">
                  Delete <i class="mdi mdi-delete"></i>
                </button>
              </td>
            </tr>
          </div>
          @endforeach
        </tbody>
      </table>
      <div class="test" style="text-align:center;margin: 30px 0">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
          Thêm Menu
        </button>
        <button type="button" onclick="back();" class="btn btn-gradient-danger btn-icon-text">Back</button>
      </div>
    </div>
  </div>
</div>

<script>
    function xoa(id){
        if(confirm('Bạn muốn xóa không ?')){
            document.location.href="xoamenu/"+id+"";
        }
    }
    function sua(id){
        document.location.href="suamenu/"+id+"";
    }
    function back(){
        history.back();
    }
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