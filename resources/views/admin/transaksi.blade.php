<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TRANSAKSI - ADMIN</title>
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
                        <a class="nav-link" href="{{ route('admin.barang') }}">List Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.peserta') }}">List Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.transaksi') }}">Transaksi</a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST" class="ms-auto">
                    @csrf
                    <button type="submit" class="auth-btn logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<section class="dashboard-section container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Transaksi Terbaru</h2>
    </div>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Harga Akhir</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        @forelse($transactions as $trx)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $trx->winner->name }}</td>
                <td>{{ $trx->item->name }}</td>
                <td>Rp. {{ number_format($trx->item->start_price,0,',','.') }}</td>
                <td>Rp. {{ number_format($trx->final_price,0,',','.') }}</td>
                <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">Belum ada transaksi.</td>
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
