<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD-ADMIN</title>
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
                {{-- MENU KIRI --}}
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.barang') }}">List Barang</a>
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

<section class="stats container mt-5">
    <div class="stat-card">
        <h3>Total Barang</h3>
        <p>{{ $totalBarang ?? 0 }}</p>
        <a href="{{ route('admin.barang') }}" class="btn btn-custom">Lihat Semua</a>
    </div>

    <div class="stat-card">
        <h3>Total Peserta</h3>
        <p>{{ $totalPeserta ?? 0 }}</p>
        <a href="{{ route('admin.peserta') ?? '#' }}" class="btn btn-custom">Lihat Semua</a>
    </div>

    <div class="stat-card">
        <h3>Total Transaksi</h3>
        <p>{{ $totalTransaksi ?? 0 }}</p>
        <a href="{{ route('admin.transaksi') ?? '#' }}" class="btn btn-custom">Lihat Semua</a>
    </div>
</section>

<section class="dashboard-section container mt-4">
    <h2>List Barang</h2>
    <a href="{{ route('admin.items.create') }}" class="btn btn-dark" style="margin-bottom:10px;" >Tambah Barang Baru</a>
    <table>
        <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Jumlah Penawar</th>
            <th>Penawaran Tertinggi</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @forelse($items ?? [] as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>Rp. {{ number_format($item->start_price,0,',','.') }}</td>
                <td>{{ $item->bids_count ?? $item->bids->count() }}</td>
                <td>Rp. {{ number_format($item->current_price ?? $item->start_price,0,',','.') }}</td>
                <td>
                    @if($item->status === 'terjual')
                        <span class="badge bg-success">Terjual</span>
                    @else
                        <span class="badge bg-primary">Dilelang</span>
                    @endif
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada barang.</td>
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
    .stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
    }
    .stat-card {
        background: white;
        border-radius: 15px;
        border: 2px solid rgba(0,0,0,0.2);
        padding: 30px 24px;
        text-align: center;
        transition: .3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    .stat-card h3 {
        font-size: 1.1rem;
        text-transform: uppercase;
    }
    .stat-card p {
        font-size: 2.5rem;
        font-weight: bold;
    }
    .btn-custom {
        background: #000;
        color: white;
        padding: 8px 18px;
        border-radius: 6px;
        border: 2px solid transparent;
        transition: .25s;
    }
    .btn-custom:hover {
        border: 2px solid #000;
        background: white;
        color: #000;
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
