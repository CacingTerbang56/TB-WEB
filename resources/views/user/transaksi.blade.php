<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TRANSAKSI - USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="header">
    <div class="header-content">
        <h1 class="brand-title">LELANG BARANG</h1>

        <div class="user-area">
            <span class="welcome-text">
                Halo, {{ auth()->user()->name }}
            </span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="auth-btn logout">
                    Logout
                </button>
            </form>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark main-nav">
    <div class="container-fluid px-4">
        <a class="navbar-brand fs-4" href="#">USER</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-3 gap-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.dashboard') }}">Barang Lelang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('user.transaksi') }}">Transaksi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="dashboard-section container mt-4">
    <h2>Transaksi Saya</h2>

    <div>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Harga Awal</th>
                <th>Harga Akhir</th>
                <th>Tanggal Menang</th>
                <th>Status Bayar</th>
            </tr>
            </thead>
            <tbody>
            @forelse($transactions as $trx)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $trx->item->name }}</td>
                    <td>Rp. {{ number_format($trx->item->start_price,0,',','.') }}</td>
                    <td>Rp. {{ number_format($trx->final_price,0,',','.') }}</td>
                    <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        @if($trx->paid_at)
                            <span class="badge bg-success">Sudah Bayar</span>
                        @else
                            <span class="badge bg-warning text-dark">Belum Bayar</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Belum ada transaksi.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<style>
    :root { --dark-bg: #212529; }
    .header { background: var(--dark-bg); padding: 20px 0; }
    .header-content {
        max-width: 1300px; margin: auto; padding: 0 24px;
        display: flex; align-items: center; justify-content: space-between;
        color: white;
    }
    .brand-title { font-size: 2rem; font-weight: 700; margin: 0; }
    .user-area { display: flex; align-items: center; gap: 15px; }
    .welcome-text { color: #f1f1f1; font-size: 1rem; }
    .auth-btn {
        padding: 8px 18px; border-radius: 8px; text-decoration: none;
        font-size: 0.9rem; transition: 0.3s; font-weight: 500; border: none;
    }
    .logout {
        background: #dc3545; color: white; border: 2px solid transparent;
    }
    .logout:hover {
        background: white; color: #dc3545; border-color: #dc3545;
    }
    .main-nav { background: var(--dark-bg); border-top: none !important; margin-top: 0; padding-top: 0; }
    .navbar, .header, .main-nav { border: none !important; box-shadow: none !important; }
    @media(max-width: 768px){
        .header-content { flex-direction: column; text-align: center; gap: 10px; }
    }
    .dashboard-section {
        background: white; border-radius: 15px; border: 2px solid rgba(0,0,0,0.2);
        padding: 32px; margin-bottom: 32px; transition: 0.3s;
    }
    .dashboard-section:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
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
