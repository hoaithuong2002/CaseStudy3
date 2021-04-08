@extends('front-end.shop.layout.master')
@section('content')
    <div class="container mt-5">
        <div class="row mt-5">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="{{asset('storage/' .$product->image)}}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{{$product->name}}</a>
                        </h4>
                        <h5>${{ number_format($product->price) }}</h5>
                        <p class="card-text">{{$product->description}}</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{route('cart.add', $product->id)}}" class="btn btn-warning">
                            <i class="fas fa-cart-plus"></i>
                            Add To Cart
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.row -->

    </div>

@endsection
