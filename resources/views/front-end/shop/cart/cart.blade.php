@extends('front-end.shop.layout.master')
@section('title')
    Giỏ Hàng
@endsection
@section('content')
   @include('front-end.shop.layout.core.header')
   <section id="cart_items">
       <div class="container">
           <div class="breadcrumbs">
               <ol class="breadcrumb">
                   <li><a href="#">Home</a></li>
                   <li class="active">Shopping Cart</li>
               </ol>
           </div>
           <div class="table-responsive cart_info">
               <table class="table table-condensed">
                   <thead>
                   <tr class="cart_menu">
                       <td class="image">Sản phẩm</td>
                       <td class="description"></td>
                       <td class="price">Giá</td>
                       <td class="quantity">Số lượng</td>
                       <td class="total">Tổng</td>
                       <td></td>
                   </tr>
                   </thead>
                   <tbody>
                   @if(isset($cart) && !empty($cart->items))
                @foreach($cart->items as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/cart/one.png" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$item['item']['name']}}</a></h4>
                            <p>ID: {{$item['item']['id']}}</p>
                        </td>
                        <td class="cart_price">
                            <p>${{$item['item']['price']}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{route('cart.add', $item['item']['id'])}}">
                                    + </a>
                                <input class="cart_quantity_input" type="text" name="quantity"
                                       value="{{$item['totalQty']}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down"
                                   href="{{route('cart.delete', $item['item']['id'])}}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{$item['totalPrice']}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete"
                               href="{{route('cart.deleteAll', $item['item']['id'])}}"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th class="cart_total" colspan="5">
                        <h3> Không có sản phẩm nào !</h3>
                    </th>
                </tr>
            @endif
        </div>
        <!-- /.row -->

    </div>
@include('front-end.shop.layout.core.footer')
@endsection
