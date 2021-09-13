<header class="header bg-white">

    <div class="container px-0 px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href=""><span class="font-weight-bold text-uppercase text-dark">Fantasy Store</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach($menu as $link)
                        <li class="nav-item @if(request()->routeIs($link->route)) active @endif">
                            <a class="nav-link" href="{{ route($link->route) }}">{{ $link->name }}</a>
                        </li>
                    @endforeach

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route("cart")}}"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray">
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    ({{\App\Http\Controllers\CartController::Count()}})
                                @endif</small></a></li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{route("logout")}}"> <i class="fas fa-user-alt mr-1 text-gray"></i>Logout</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{route("loginPage")}}"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
