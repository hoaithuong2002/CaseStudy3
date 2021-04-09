<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">SuMi Shop </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            @php($routeName = \Illuminate\Support\Facades\Route::currentRouteName())
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @if($routeName == 'home') active @endif ">
                    <a class="nav-link" href="{{route('home')}}" >Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item @if($routeName == 'cart.index') active @endif ">
                    <a class="nav-link" href="{{route('cart.index')}}">Cart</a>
                </li>
                <li class="nav-item @if($routeName == 'login') active @endif ">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
