{{-- navbar --}}
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger bg-gradient">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="{{url('/img/mrg.png')}}" alt="Logo Toko" width="150"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('Product/index')}}">Products</a>
                </li>
                @if(!is_null(Auth::user()) && Auth::user()->role != 'admin')
                <li class="nav-item">
                    <a class="nav-link " href="{{url('Chart/'.Auth::user()->email??'')}}">Chart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{url('Order/'.Auth::user()->email??'')}}">Order</a>
                </li>
{{--                @dd(Auth::user())--}}
                @elseif(!is_null(Auth::user()) && Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('Product/create')}}">Tambah Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('All/Order')}}">List Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('User/index')}}">List User</a>
                    </li>
                @endif
                @guest
                    <a class="btn btn-outline-light me-2" href="{{route('login')}}">Login</a>
                    <a class="btn btn-warning me-2" href="{{route('register')}}">Sign Up</a>
                @else
                    <a class="btn btn-warning me-2" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
                    <a class="btn me-2 border-start border-end" aria-disabled="true">{{ Auth::user()->name }}</a>
                    <form action="{{route('logout')}}" id="logout-form" method="POST">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>
{{-- end of navbar --}}
