@extends('layout.master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <a href="{{route('user.create')}}" class="btn btn-success">add a new user</a>
                        <div class="card-tools">
                            <form action="{{route('user.search')}}" method="post">
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
                            <h3 class="card-title">Danh sách người dùng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Số thứ tự</th>
                                    <th>Ho va ten</th>
                                    <th>Địa chỉ email</th>
                                    <th>Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="{{route('user.update',$user->id)}}" class="btn btn-primary">Update</a>
                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa {{$user->name}} không???')"
                                               href="{{route('user.delete',$user->id)}}"
                                               class="btn btn-danger fa fa-trash" aria-hidden="true">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Số thứ tự</th>
                                    <th>Ho va ten</th>
                                    <th>Địa chỉ email</th>
                                    <th>Tùy chọn</th>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $users->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
