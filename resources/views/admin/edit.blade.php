<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDIT BARANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container-fluid px-4">
            <a class="navbar-brand fs-4" href="#">ADMIN</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.barang') }}">List Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.transaksi') }}">Transaksi</a>
                    </li>
                </ul>

                <form action="{{ route('logout') }}" method="POST" class="ms-auto">
                    @csrf
                    <button type="submit" class="auth-btn logout">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-5">
    <div class="dashboard-section">
        <h2 class="mb-4">Edit Barang</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- penting untuk route update --}}
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $item->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $item->description) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga Awal (Rp)</label>
                    <input type="number" name="start_price" class="form-control"
                           value="{{ old('start_price', $item->start_price) }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Mulai Lelang</label>
                    <input type="datetime-local" name="start_time" class="form-control"
                           value="{{ old('start_time', optional($item->start_time)->format('Y-m-d\TH:i')) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Akhir Lelang</label>
                    <input type="datetime-local" name="end_time" class="form-control"
                           value="{{ old('end_time', optional($item->end_time)->format('Y-m-d\TH:i')) }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Gambar Saat Ini</label>
                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}"
                         class="img-thumbnail mb-2" style="max-width: 200px;">
                @else
                    <p class="text-muted">Belum ada gambar.</p>
                @endif
            </div>

            <div class="mb-4">
                <label class="form-label">Ganti Gambar (opsional)</label>
                <input type="file" name="image" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.barang') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-dark">
                    Update Barang
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .auth-btn {
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: 0.3s;
        font-weight: 500;
        border: none;
    }
    .logout {
        background: #dc3545;
        color: white;
        border: 2px solid transparent;
    }
    .logout:hover {
        background: white;
        color: #dc3545;
        border-color: #dc3545;
    }
    .dashboard-section {
        background: white;
        border-radius: 15px;
        border: 2px solid rgba(0,0,0,0.2);
        padding: 32px;
        margin-bottom: 32px;
        transition: 0.3s;
    }
    .dashboard-section:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
</style>
</body>
</html>
