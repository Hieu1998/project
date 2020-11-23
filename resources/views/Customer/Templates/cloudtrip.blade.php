@extends('Customer.Layouts.index')

@section('content')

<div class="container">
    <div class="travel-toolbar">
        <div class="filter-by-heading">
            <h4>@lang('label.Filter By')</h4>
        </div>
        <div class="filters-by-select">
            <form action="{{Route('cloudtrip')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <ul class="nav">
                    <li class="nav-link">
                        @lang('label.Price')
                    </li>
                    <li class="nav-link">
                        <select name="priceSort" class="filter-by-select">
                            <option value="1" @if ($priceSort == 1) selected="selected"  @endif>@lang('label.Price high to low')</option>
                            <option value="0" @if ($priceSort == 0) selected="selected"  @endif>@lang('label.Price low to high')</option>
                        </select>
                    </li>
                    <li class="nav-link">
                        @lang('label.Location')
                    </li>

                    <li class="nav-link">
                        <select name="idTrip" class="filter-by-select">
                            <option value="" selected>--</option>
                            @foreach($tripsList as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="nav-link">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">@lang('label.Show')</button>
                    </li>
                </ul>
            </form>
        </div>          
    </div>
</div>
<div class="container">
    @foreach($danhSachProduct as $value)
    <div class="travel-tour">
        <div class="row">
            <div class="col-md-4">
                <img src="/images/{{$value->linkImage}}" alt="Generic placeholder image" width="100%">
            </div>
            <div class="col-md-6">
                <h5 class="heading-tour">{{$value->nameProduct}}</h5>

                <p class="tour-info">
                    <span class="d-inline-block text-truncate" style="max-width: 200px;">
                     {!!$value->descriptionProduct!!}
                    </span>
                </p>
                <div class="entry-meta">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                            <li class="nav-link"><i class="far fa-folder"></i></li>
                            <li class="nav-link">
                                {{$value->nameTrip}}
                            </li>
                            <li class="nav-link">
                                <i class="fas fa-child"></i>
                                <span class="value">{{$value->quantityPersonProduct}} PAX</span>
                            </li>
                            <li class="nav-link">
                                <i class="fas fa-calendar"></i>
                                <span>
                                    {{$value->ngayBatDau}} - {{$value->ngayKetThuc}} 
                                </span>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-2 tour-price">
                <div class="trip-price">
                    <p>{{number_format($value->priceProduct)}} VNĐ/{{$value->quantityPersonProduct}} @lang('label.Person')</p>
                    <a class="btn btn-outline-primary" href="detailproduct/{{$value->idProduct}}">@lang('label.View')</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection