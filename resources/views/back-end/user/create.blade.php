@extends('back-end.layout.master')
@section('content')
    <section class="content">
        <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" id="inputName"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Description</label>
                                <input type="text" name="email" id="inputName"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Content</label>
                                <input type="password" name="content" id="inputName"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Content</label>
                                <input type="password" name="content" id="inputName"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Thêm" class="btn btn-success">
                                <a href="{{route('user.index')}}" class="btn btn-secondary">Trở về</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>
@endsection


