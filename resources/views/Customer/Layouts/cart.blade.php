@extends('Customer.Layouts.index')

@section('content')

<div class="container">
    <h1 class="entry-title">@lang('label.Cart')</h1>
    <div class="cart-main">
     <div class="cart-list">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>@lang('label.IMAGES')</th>
                    <th>@lang('label.TOUR')</th>
                    <th>@lang('label.Price')</th>
                    <th>@lang('label.QUANTITY')</th>
                    <th>@lang('label.Total')</th>
                    <th>@lang('label.ACTION')</th>
                </tr>
            </thead>
            @if(count($cart))
            <tbody>
                @foreach($cart as $key => $item)
                <tr>
                    @foreach($item->options as $value)
                    <td>
                        <img width="100px" height="auto" src="images/{{$value}}">
                    </td>
                    @endforeach
                    <td>  
                        <h4><a href="">{{ $item->name}}</a></h4>
                    </td>
                    <td>
                        <span class="person-count">
                            <ins>
                                <span class="wp-travel-trip-price" payment_price="" trip_price="85.00">
                                    {{ number_format($item->price)}} VNĐ                                        
                                </span>
                            </ins>/Person                               
                        </span>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">  
                            <form method="POST" action="{{url("cart-quantity-up?product_id=$item->id&increment=1")}}">
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="cart_quantity_up">
                                 +
                             </button>
                         </form>
                         <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                         <form method="POST" action="{{url("cart-quantity-down?product_id=$item->id&decrease=1")}}">
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="cart_quantity_up">
                             -
                         </button>
                     </form>
                 </div>
             </td>
             <td>
                <p>
                    <strong><span>$</span><span class="wp-travel-trip-total">{{ number_format($item->subtotal)}} VNĐ</span></strong>
                </p>
            </td>
            <td class="product-remove">
                <a href="{{Route('deleteproduct')}}?rowId={{$item->rowId}}">X</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td style="text-align: center;" colspan="6"><p>@lang('You have no items in the shopping cart')</p></td>
        </tr>
        @endif
    </tbody>
</table>
</div>
@if(count($cart) > 0)
<div class="cart-total-info">
    <table class="table">
        <thead>
            <tr>
                <th class="text-left py-4">@lang('label.Total')</th>
                <th class="text-right text-danger py-4">{{ Cart::subtotal() }} VNĐ</th>
            </tr>
        </thead>
        <tbody >
            <tr>
                <td>
                    <input type="text" name="wp_travel_coupon_code_input" class="cart-input" id="coupon_code" value="" placeholder="@lang('label.Apply Coupon')">
                    <button type="button" class="btn btn btn-info">@lang('label.Apply Coupon')</button>

                </td>
                <td class="text-right">
                    <a class="btn btn-success" href="{{Route('home')}}">@lang('label.Back home')</a> 
                    <a class="btn btn-danger" href="{{Route('destroycart')}}">@lang('label.Clean All')</a> 
                    <a class="btn btn btn-info" href="{{Route('checkout')}}">@lang('label.Proceed to checkout')</a> 
                </td>
            </tr>
        </tbody>
    </table>
</div> 
@endif
</div>
</div>

@endsection