@extends('layout.master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <a href="{{route('product.create')}}" class="btn btn-success">Add New Products</a>
                        <div class="card-tools">
                            <form action="{{route('product.search')}}" method="post">
                                @csrf
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">List Of Products</h3>
                        </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->content}}</td>
                                    <td>{{asset('storage/' .$product->image)}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        <a href="{{route('product.edit', $product -> id)}}"
                                           class="btn btn-primary">Edit</a>
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa : {{$product->name}} không???')"
                                           href="{{route('product.destroy', $product->id)}}"
                                           class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
