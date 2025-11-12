\<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/logo.png') }}">

    <title>Sarana Prasarana</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    @notifyCss

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css\dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('pengaduan.index')}}">&nbsp;&nbsp;&nbsp;&nbsp;Sistem Zulaikha</a>
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
                                <a class="nav-link" href="{{ route('sarpras.index')}}">
                                    <span data-feather="file"></span>
                                    Sarpras
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('pengaduan.index')}}">
                                    <span data-feather="shopping-cart"></span>
                                    Pengaduan <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-10">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">ini halaman Pengaduan</h1>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <form action="{{ route('pengaduan.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Pilih Barang</label>
                                <select name="inpbarang" class="form-control">
                                    <option hidden>Silakan pilih barang</option>
                                    @if ($list['sarpras'])
                                        @foreach ($list['sarpras'] as $item)
                                            <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Keterangan</label>
                                <textarea name="inpketerangan" cols="30" rows="3" class="form-control" placeholder="Tuliskan keterangan kerusakan barang"></textarea>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">Ajukan</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-body">
                            <h5 class="mb-3">Update Pengaduan Terkini</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>
                                            {{-- <th>ID SISTEM</th>
                                            <th>ID BARANG</th> --}}
                                            <th>KODE</th>
                                            <th>NAMA</th>
                                            <th>KETERANGAN</th>
                                            <th>USER</th>
                                            <th>DITAMBAHKAN</th>
                                            <th>
                                                
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($list['show']))
                                            @foreach ($list['show'] as $item)
                                            <tr>
                                                {{-- <td>{{ $item->id }}</td>
                                                <td>{{ $item->idbarang }}</td> --}}
                                                <td>{{ $item->kodebarang }}</td>
                                                <td>{{ $item->namabarang }}</td>
                                                <td>{{ $item->keterangan }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->diffforhumans() }}</td>
                                                <td><button class="btn btn-primary btn-sm">Detail</button></td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-notify::notify />
    @notifyJs

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

    <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
</body>

</html>