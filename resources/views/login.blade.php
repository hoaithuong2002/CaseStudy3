<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('css/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a><b>Đăng nhập</b> tài khoản</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Đăng nhập để bắt đầu sử dụng</p>
            <!-- Hiển thị trạng thái chưa đăng nhập -->
            @if (Session::has('not-login'))
                <div class="not-login">
                    <p class="text-danger">{{ Session::get('not-login') }}</p>
                </div>
            @endif
        <!-- Hiển thị trạng thái chưa đăng nhập -->
            @if (Session::has('not-login'))
                <div class="not-login">
                    <p class="text-danger">{{ Session::get('not-login') }}</p>
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('login-error'))
                <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get('login-error') }}
                </div>
            @endif
            <form method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Ghi nhớ
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('home') }}" class="btn btn-secondary w-100 mt-3">
                <i class="fas fa-home"></i>
                Trang chủ
            </a>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script {{asset('js/adminlte.min.js')}}></script>

</body>
</html>
