<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/logo.png') }}">

    <title>Sarana Prasarana</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css\dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('sarpras.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;Sistem Zulaikha</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home')}}">
                                    <span data-feather="home"></span>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('sarpras.index')}}">
                                    <span data-feather="file"></span>
                                    Sarpras <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pengaduan.index')}}">
                                    <span data-feather="shopping-cart"></span>
                                    Pengaduan
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
            <div class="col-md-10">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">ini halaman sarpras</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <a class="btn btn-sm btn-outline-dark" href="{{ route('sarpras.create') }}">Tambah Data Sarpras</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive col-md-7">
                    <table class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>KODE</th>
                                <th>NAMA</th>
                                <th>LOKASI</th>
                                <th>UPDATE</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($list))
                                @foreach ($list as $item)
                                <tr>
                                    {{-- <td>{{ $item->id }}</td> --}}
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->barang }}</td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->updated_at)->diffforhumans() }}</td>
                                    <td>
                                        <a href="{{ route('sarpras.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                                        <form action="{{ route('sarpras.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write(
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.min.js"><\/script>')
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    
    {{-- Method Logout --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</body>

</html>
