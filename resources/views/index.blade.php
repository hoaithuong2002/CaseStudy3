<!doctype html>
<html lang="en">
<head>
    <title>Exam Module3</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    >
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a style="color: white" class="btn btn-success" href="{{route('product.add')}}">+ Thêm mới</a>
        <a href="{{route('product.index')}}" class="btn btn-primary">Home</a>
        <form class="d-flex" method="post" action="{{route('product.search')}}">
            @csrf
            <input class="form-control me-2" type="search" aria-label="Search" name="keyword">
            <a class="btn btn-outline-success" type="submit">Search</a>
        </form>
    </div>
</nav>
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            List Products
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Mã số san pham</th>
                    <th>Tên san pham</th>
                    <th>Hinh anh</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Thể loại</th>
                    <th colspan="2">ADD</th>
                </tr>
                @forelse($agencies as $key => $agency)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->image}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category}}</td>
                        <td><a href="{{route('product.edit',$agency->id)}}" class="btn btn-warning">

                            </a></td>
                        <td><a onclick="return confirm('you definitely want to delete???')"
                               href="{{route('product.destroy',$product->id)}}" class="btn btn-danger">
                            </a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center">No data</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
