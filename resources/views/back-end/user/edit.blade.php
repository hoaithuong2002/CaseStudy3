@extends('back-end.layout.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Chỉnh sửa thông tin người dùng</h3>
                        </div>
                        <form action="{{ route('user.edit', $user->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên người dùng</label>
                                    <input type="name" name="name" value="{{ $user->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thực hiện</button>
                                <a href="{{route('user.index')}}" class="btn btn-secondary">Trở về</a>

                            </div>
                        </form>
                    </div>
                </div>
                <!--/.col (left) -->
                <!-- right column --><!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
