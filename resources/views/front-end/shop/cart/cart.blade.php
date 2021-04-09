@extends('front-end.shop.layout.master')
@section('title')
    Giỏ Hàng
@endsection
@section('content')
    <div class="container">

        <div class="row">

            <div class="col-4">

                <h1 class="my-4">Giỏ hàng</h1>
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">Tổng số lượng</th>
                        <th scope="col">{{(isset($cart->totalQty)) ? $cart->totalQty : 0}}</th>
                    </tr>
                    <tr>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">$ {{(isset($cart->totalPrice)) ? $cart->totalPrice : 0}}</th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="2">
                            <a href="{{route('cart.delete')}}" class="btn btn-outline-danger w-100">
                                <i class="fas fa-trash-alt"></i>
                                Xóa tất cả sản phẩm
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="2">
                            <a href="#" class="btn btn-success w-100">
                                <i class="fas fa-money-bill-alt"></i>
                                Thanh toán
                            </a>
                        </th>
                    </tr>
                    </thead>
                </table>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-8">

                <div class="row my-4">
                    @if(isset($cart) && count($cart->items))
                        @foreach($cart->items as $item)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <a href="#"><img class="card-img-top" src="{{asset('storage/' .$item['item']['image'])}}" alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="#">{{$item['item']['name']}}</a>
                                        </h4>
                                        <h5>${{ number_format($item['item']['price']) }}</h5>
                                        <p class="card-text">{{$item['item']['description']}}</p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="{{route('cart.removeProduct', $item['item']['id'])}}" class="btn btn-outline-danger"> {{-- Thêm route để xóa sản phẩm khỏi cart --}}
                                            <i class="fas fa-trash-alt"></i>
                                            Xóa sản phẩm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col mb-4">
                            <h3 class="text-center"> Không có sản phẩm nào !</h3>
                        </div>
                    @endif
                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
@endsection
