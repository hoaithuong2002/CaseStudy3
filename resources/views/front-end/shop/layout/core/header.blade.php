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
                <td><img src="{{asset('storage/' .$product->image)}}" width="200px" alt=""></td>
                <td>{{number_format($product->price)}}</td>
                <td>
                    <a href="{{route('product.edit', $product -> id)}}"
                       class="btn btn-primary">
                        <i class="far fa-edit"> Edit</i>
                    </a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa : {{$product->name}} không???')"
                       href="{{route('product.destroy', $product->id)}}"
                       class="btn btn-danger">
                        <i class="fas fa-trash-alt"> Delete</i>
                    </a>
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
