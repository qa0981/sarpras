<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
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
                                <a class="nav-link" href="#">
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
                    <h1 class="h2">ini halaman tambah sarpras</h1>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('sarpras.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Masukkan Kode</label>
                                <input type="text" name="inpkode"
                                    class="form-control
                                    @error('kode')
                                        is-invalid
                                    @enderror"
                                    name="example-text-input" placeholder="Masukkan Kode Inventaris" value="{{ old('inpkode') }}">
                                @error('kode')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" name="inpbarang"
                                    class="form-control
                                    @error('barang')
                                        is-invalid
                                    @enderror"
                                    name="example-text-input" placeholder="Input Nama Barang" value="{{ old('inpbarang') }}">
                                @error('barang')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="inplokasi"
                                    class="form-control
                                    @error('lokasi')
                                        is-invalid
                                    @enderror"
                                    name="example-text-input" placeholder="Input Lokasi" value="{{ old('inplokasi') }}">
                                @error('lokasi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <hr>
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                                <a class="btn btn-secondary" href="{{ route('sarpras.index') }}">Kembali</a>
                            </div>
                    </div>
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
