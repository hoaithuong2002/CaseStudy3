@extends('layout.master')
@section('content')
    <div class="card mt-2">
        <div class="card-header">
            Edit Product
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('product.update', $product->id) }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" value="{{ $product->description }}" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Content</label>
                    <input type="text" value="{{ $product->content }}" name="content" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="text" value="{{ $product->image }}" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" value="{{ $product->price }}" name="price" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection


{{--@section('content')--}}

{{--    <section class="content">--}}

{{--        @csrf--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12 col-md-6">--}}
{{--                <div class="card card-primary">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title">Thêm Sản Phẩm</h3>--}}
{{--                        <div class="card-tools">--}}
{{--                            <button type="button" class="btn btn-tool" data-card-widget="collapse"--}}
{{--                                    data-toggle="tooltip" title="Collapse">--}}
{{--                                <i class="fas fa-minus"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <form method="post" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputName">Name</label>--}}
{{--                                <input type="text" name="name"--}}
{{--                                       class="form-control" value="{{$product->name}}">--}}
{{--                                --}}{{--                                @error('name')--}}
{{--                                --}}{{--                                <p class="wrapper">{{$message}}</p>--}}
{{--                                --}}{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputName">Description</label>--}}
{{--                                <input type="text" name="description"--}}
{{--                                       class="form-control" value="{{$product->description}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputName">Content</label>--}}
{{--                                <input type="text" name="content"--}}
{{--                                       class="form-control" value="{{$product->content}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputFile">Image</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <div class="custom-file">--}}
{{--                                        <input type="file" name="image" class="custom-file-input" value="{{$product->image}}">--}}
{{--                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <span class="input-group-text">Upload</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputName">Price</label>--}}
{{--                                <input type="number" name="price"--}}
{{--                                       class="form-control" value="{{$product->price}}">--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <button type="submit" class="btn btn-success">Save</button>--}}
{{--                                <a href="{{route('product.index')}} " class="btn btn-secondary">Back</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}

{{--                    <!-- /.card-body -->--}}
{{--                </div>--}}
{{--                <!-- /.card -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
