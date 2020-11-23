@extends('Administrator.Layouts.index')

@section('content')
<div class="card">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themblog">
    Thêm Mới Nhanh Blog
  </button>
  <!-- Modal -->
  <div class="modal fade" id="themblog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Danh Mục Blog</h4>
              <form action="{{Route('themmoiblog') }}" enctype="multipart/form-data" method="POST" class="forms-sample">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleInputName1">Title</label>
                  <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title">
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Content</label>
                  <textarea name="conTent" class="form-control" id="exampleTextarea1" rows="4"></textarea>
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
                    <input name="is_publish" value="1" type="checkbox" class="form-check-input">
                    publish 
                    <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input name="is_feature" value="1" type="checkbox" class="form-check-input">
                      is_feature 
                      <i class="input-helper"></i></label>
                    </div>
                    <div class="form-group">
                      <label>upload hình ảnh</label>
                      <input type="file" name="link_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                        </span>
                      </div>
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
    <!-- Table -->
      <div class="card-body text-center">
        @if(session('thongBao'))
        <div class="btn btn-block btn-lg btn-gradient-primary mt-4">
          {{session('thongBao')}}
        </div>
        @endif
        <h4 class="card-title">Danh Sách Blog</h4>
        <table class="table table-bordered">
        <form action="{{Route('quanlyblog')}}" method="POST">
          <!-- sap xep tim kiem -->
          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <input type="hidden" name="tenTruongSapXep" id="tenTruongSapXep">
          <input type="hidden" name="kieuSapXep" id="kieuSapXep">
          <div class="table-data__tool">
            <div class="filters m-b-45">
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Phân trang</label><br>
                <select name="phanTrang" id="phanTrang" class="form-control">
                  <option value="5" @if ($phanTrang == 5) selected="selected"  @endif >Trang Hiển Thị</option>
                  <option value="10" @if ($phanTrang == 10) selected="selected"  @endif>10</option>
                  <option value="20" @if ($phanTrang == 20) selected="selected"  @endif>20</option>
                  <option value="30" @if ($phanTrang == 30) selected="selected"  @endif>30</option>
                  <option value="40" @if ($phanTrang == 40) selected="selected"  @endif>40</option>
                </select> 
              </div>
              <div class="form-group col-md-3">
                <button class="btn btn-gradient-info btn-rounded btn-fw">Lọc</button>
                <a class="btn btn-gradient-secondary btn-rounded btn-fw" href="{{Route('quanlyblog')}}">
                  <i class="mdi mdi-refresh "></i>Reset
                </a>
              </div>
              <div class="float-left">
                {!! $danhSach->links() !!}
              </div>
              <div class="float-right" style="display: inline-flex;">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" name="timKiem" class="form-control" placeholder="Tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2" @isset($timKiem) value={{$timKiem}} @endisset>
                    <div class="input-group-append">
                      <button class="btn btn-sm btn-gradient-primary" type="submit" name="submit">Search</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end sap xep tim kiem -->
            <thead class="thead-dark" style="text-align: center;color: white;background: #34363a;">
              <tr>
                <th>Title 
                  @if($kieuSapXep==0)
                  <button class="button-sapXep" onclick="SapXepFunction(0,1)">
                    <i class="mdi mdi-arrow-down"></i>
                  </button>
                  @else
                  <button class="button-sapXep" onclick="SapXepFunction(0,0)">
                    <i class="mdi mdi-arrow-up"></i>
                  </button>
                  @endif
                </th>
                <th>Content
                 @if($kieuSapXep==0)
                 <button class="button-sapXep" onclick="SapXepFunction(1,1)">
                  <i class="mdi mdi-arrow-down"></i>
                </button>
                @else
                <button class="button-sapXep" onclick="SapXepFunction(1,0)">
                  <i class="mdi mdi-arrow-up"></i>
                </button>
                @endif
              </th>
              <th>publish</th>
              <th>image</th>
              <th>Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($danhSach as $value)
            <tr>
            <td>
              {!! $value->title !!}
              </td>
            <td>{!! $value->content !!}</td>
            <td><label class="switch">
                <input type="checkbox" @if($value->publish==1) {{"checked"}}  @endif>
                <span class="slider round"></span>
              </label>
            <td class="images_admin"> 
              <img class="imgproduct" src="images/{{$value->link_image}}"/>
            </td>
            <td>
              <button onclick="sua({{$value->id}});return false;" class="btn btn-gradient-primary btn-sm" title="Sửa">
                Edit<i class="mdi mdi-file-check btn-icon-append"></i>
              </button>
              <button type="button" class="btn btn-gradient-primary btn-sm" onclick="xoa({{$value->id}});return false;" data-toggle="tooltip" data-placement="top" title="Xóa">Delete</button>
            </td>
          </tr>
            @endforeach
          </tbody>
        </form>
      </table>
      <div class="test" style="text-align:center;margin: 30px 0">
        @if(Count($danhSach) == 0)<span class="form-control">Không tìm thấy kết quả</span> @endif <br>
        <a type="button" class="btn btn-primary" href="{{Route('themmoiblog')}}">
          Thêm Blog
        </a>
        <button type="button" onclick="back();" class="btn btn-gradient-danger btn-icon-text">Back</button>
      </div>
    </div>
  </div> 
<script>
  function SapXepFunction(tenTruong,kieuSapXep){
    $('#tenTruongSapXep').val(tenTruong);
    $('#kieuSapXep').val(kieuSapXep);
  }
  function sua(id){
    document.location.href="/suablog/"+id+"";
  }
  function xoa(id){
    if(confirm('Bạn muốn xóa không ?')){
      document.location.href="/xoablog/"+id+"";
    }
  }
</script>  
@endsection