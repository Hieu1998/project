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
                    <h3>Quản lý bills</h3>
                    <!-- thong bao xoa thanh cong -->
                    @if(session('thongBao'))
                    <div class="alert alert-success" style="text-align: center;">
                        {{session('thongBao')}}  
                    </div> 
                    @endif
                    <form action="{{Route('quanlybill')}}" method="POST">
                        <!-- sap xep tim kiem -->
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
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
                            <a class="btn btn-gradient-secondary btn-rounded btn-fw" href="{{Route('quanlybill')}}">
                                <i class="mdi mdi-refresh "></i>Reset
                            </a>
                        </div>
                        <div class="float-left">
                            {!! $customers->links() !!}
                        </div>
                        <!-- end sap xep tim kiem -->
                    </form>
                </div>
                <!-- table -->
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark" style="text-align: center;color: white;background: #34363a;">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Date_order</th>
                            <th>Email</th>
                            <th>Phone_Number</th>
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->lastname }} {{ $customer->firstname }}</td>
                            <td>{{ $customer->country }}</td>
                            <td>{{ $customer->date_order }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>
                                <a href="{{ url('detailbill')}}/{{ $customer->id }}/">Detail</a>
                            </td>
                            <td>
                                <a href="{{ url('billdelete')}}/{{ $customer->bills_id }}/" class="btn btn-danger">DELETE</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- end table -->
                <div class="test" style="text-align:center;margin: 30px 0">
                    <button type="button" onclick="back();" class="btn btn-gradient-danger btn-icon-text">Back</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function back(){
            history.back();
        }
    </script>
    @endsection
