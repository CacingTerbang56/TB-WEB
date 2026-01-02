<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LIST BARANG - ADMIN</title>
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
                <ul class="navbar-nav ms-3 gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.barang') }}">List Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.peserta') ?? '#' }}">List Peserta</a>
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

<section class="dashboard-section container mt-4">
    <h2>List Barang</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-2">Kembali</a>
        <a href="{{ route('admin.items.create') }}" class="btn btn-dark">Tambah Barang Baru</a>
    </div>

    <table>
        <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Jumlah Peserta</th>
            <th>Penawaran Tertinggi</th>
            <th>Penawar Tertinggi</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>Rp. {{ number_format($item->start_price,0,',','.') }}</td>
                <td>{{ $item->bids_count ?? $item->bids->count() }}</td>
                <td>Rp. {{ number_format($item->current_price ?? $item->start_price,0,',','.') }}</td>
                <td>
                    @php
                        $highestBid = $item->bids()->orderByDesc('bid_amount')->first();
                    @endphp
                    {{ $highestBid?->user?->name ?? '-' }}
                </td>
                <td>
                    <a href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('admin.items.destroy', $item->id) }}"
                          method="POST" style="display:inline-block"
                          onsubmit="return confirm('Yakin hapus barang ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                    <form action="{{ route('admin.barang.process', $item->id) }}"
                        method="POST" style="display:inline-block"
                        onsubmit="return confirm('Proses barang ini dan tetapkan pemenang tertinggi?')">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm"
                                @if($item->transaction) disabled @endif>
                            {{ $item->transaction ? 'Terjual' : 'Proses' }}
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada barang.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</section>

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

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid rgba(0,0,0,0.15);
    }
    table th {
        background: black;
        color: white;
        padding: 15px;
        text-transform: uppercase;
        font-size: 0.8rem;
    }
    table td {
        padding: 14px 16px;
        border-bottom: 1px solid rgba(0,0,0,0.15);
    }
    table tbody tr:hover {
        background: rgba(0,0,0,0.05);
    }
</style>
</body>
</html>
