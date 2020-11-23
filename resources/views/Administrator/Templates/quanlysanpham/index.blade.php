@extends('Administrator.Layouts.index')

@section('content')
<!-- thong bao xoa thanh cong -->
@if(session('Success'))
<div class="alert alert-success" style="text-align: center;">
  {{session('Success')}}  
</div> 
@endif

<div class="col-lg-12 grid-margin stretch-card col-padding">
  <div class="card">
    <div class="card-body">
      <div class="row row-menu">
        <div class="col-md-12">
          <h3>Quản lý sản phẩm</h3>
        </div>
      </div>
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
                <form action="{{Route('createproduct') }}" enctype="multipart/form-data" method="POST"  class="forms-sample">
                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Tên sản phẩm</label>
                    <input type="text" id="name" name="name" placeholder="Nhập tên sản phẩm" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá</label>
                    <input type="text" id="price" name="price" placeholder="Nhập giá" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label><br>
                    <textarea name="description" style="width: 100%;height: 70px" placeholder="Nhập mô tả" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Trips</label><br>
                    <select name="idTrip" id="idTrip" class="form-control">
                      @foreach($trips as $value)
                      <option value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Số lượng người</label>
                    <input type="text" id="quantityPerson" name="quantityPerson" placeholder="Nhập tên số lượng người" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                    <input type="date" id="ngayBatDau" name="ngayBatDau" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                    <input type="date" id="ngayKetThuc" name="ngayKetThuc" class="form-control" required>
                  </div>
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
                  <div class="form-group">
                    <label for="exampleInputEmail1">Is_feature</label>
                    <label class="switch">
                      <input type="checkbox" value="1" name="is_feature">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary mr-2" name="uploadImage">Submit</button>
                  <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal -->
      <!-- table -->
      <table class="table table-bordered table-hover">
        <form action="{{Route('quanlysanpham')}}" method="POST">
          <!-- sap xep tim kiem -->
          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <input type="hidden" name="tenTruongSapXep" id="tenTruongSapXep">
          <input type="hidden" name="kieuSapXep" id="kieuSapXep">
          <div class="table-data__tool">
            <div class="filters m-b-45">
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Phân trang</label><br>
                <select name="phanTrang" id="phanTrang" class="form-control">
                  <option value="50" @if ($phanTrang == 50) selected="selected"  @endif >Trang Hiển Thị</option>
                  <option value="80" @if ($phanTrang == 80) selected="selected"  @endif>80</option>
                  <option value="100" @if ($phanTrang == 100) selected="selected"  @endif>100</option>
                  <option value="200" @if ($phanTrang == 200) selected="selected"  @endif>200</option>
                  <option value="300" @if ($phanTrang == 300) selected="selected"  @endif>300</option>
                </select> 
              </div>
              <div class="form-group col-md-3">
                <button class="btn btn-gradient-info btn-rounded btn-fw">Lọc</button>
                <a class="btn btn-gradient-secondary btn-rounded btn-fw" href="{{Route('quanlysanpham')}}">
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
                <th>ID</th>
                <th>Tên 
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
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Số lượng người
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
              <th>Số lượt xem</th>
              <th>Ngày bắt đầu</th>
              <th>Ngày kết thúc</th>
              <th>Trips</th>
              <th>Hình ảnh</th>
              <th>Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($danhSach as $value)
            <tr style="text-align: center;">
              <td>{{$value->idProduct}}</td>
              <td>{{$value->nameProduct}}</td>
              <td>{{$value->priceProduct}}</td>
              <td>{!!$value->descriptionProduct!!}</td>
              <td>{{$value->quantityPersonProduct}}</td>
              <td>{{$value->viewCount}}</td>
              <td>{{$value->ngayBatDau}}</td>
              <td>{{$value->ngayKetThuc}}</td>
              <td>{{$value->nameTrip}}</td>
              <td class="images_admin">
                <img src="/images/{{$value->linkImage}}">
              </td>
              <td style="text-align: center;width: 28%">
                <button onclick="sua({{$value->idProduct}});return false;" class="btn btn-gradient-dark btn-icon-text" title="Sửa">
                  Edit<i class="mdi mdi-file-check btn-icon-append"></i>
                </button>
                <button onclick="xoa({{$value->idProduct}});return false;" class="btn btn-gradient-success btn-icon-text" title="Xóa">
                  Delete <i class="mdi mdi-delete"></i>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </form>
      </table>
      <!-- end table -->
      <div class="test" style="text-align:center;margin: 30px 0">
        @if(Count($danhSach) == 0)<span class="form-control">Không tìm thấy kết quả</span> @endif <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
          Thêm sản phẩm
        </button>
        <button type="button" onclick="goBack();" class="btn btn-gradient-danger btn-icon-text">Back</button>
      </div>
    </div>
  </div>
</div>

<script>
  function SapXepFunction(tenTruong,kieuSapXep){
    $('#tenTruongSapXep').val(tenTruong);
    $('#kieuSapXep').val(kieuSapXep);
  }
  function xoa(id){
    if(confirm('Bạn muốn xóa không ?')){
      document.location.href="xoasanpham/"+id+"";
    }
  }
  function sua(id){
    document.location.href="suasanpham/"+id+"";
  }
</script>
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'description' );
    $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Vui lòng không được bỏ trống' );
                e.preventDefault();
            }
        });
</script>
@endsection
