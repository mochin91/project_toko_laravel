<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Toko Online MRG</title>
</head>
<body>

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
                    <a class="nav-link " href="/Product/index">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/Product/create">Tambah Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">List Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- end of navbar --}}


<div class="container-fluid" style="margin-top:6rem">
    @yield('container')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
