<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD-USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="header">
    <div class="header-content">
        <h1 class="brand-title">LELANG BARANG</h1>

        <div class="user-area">
            <span class="welcome-text">
                Halo, Selamat Datang {{ auth()->user()->name }}
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
                    <a class="nav-link active" href="{{ route('user.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.dashboard') }}">Barang Lelang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.transaksi')}}">Transaksi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="dashboard-section container mt-4">
    <h2>List Barang</h2>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif

    <div class="row mt-3">
        @forelse($items as $item)
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 100%;">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Harga Awal: Rp. {{ number_format($item->start_price,0,',','.') }}
                        </li>
                        <li class="list-group-item">
                            Harga Tertinggi:
                            Rp. {{ number_format($item->current_price ?? $item->start_price,0,',','.') }}
                        </li>
                    </ul>

                    <div class="card-body">
                        @if($item->status === 'terjual')
                            <button class="btn btn-secondary w-100" disabled>Sudah Terjual</button>
                        @else
                            <form action="{{ route('user.bid.store', $item->id) }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <input type="number" name="bid_amount" class="form-control"
                                        placeholder="Masukkan nominal tawaran">
                                </div>
                                <button type="submit" class="btn btn-dark w-100">Tawar Sekarang</button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada barang lelang.</p>
        @endforelse
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<style>
    :root { --dark-bg: #212529; }
    .header { 
        background: var(--dark-bg); 
        padding: 20px 0; }
    .header-content {
        max-width: 1300px; 
        margin: auto; 
        padding: 0 24px;
        display: flex; 
        align-items: center; 
        justify-content: space-between;
        color: white;
    }
    .brand-title { 
        font-size: 2rem; 
        font-weight: 700; 
        margin: 0; }
    .user-area { 
        display: flex; 
        align-items: center; 
        gap: 15px; }
    .welcome-text { 
        color: #f1f1f1; 
        font-size: 1rem; }
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
</style>
</body>
</html>
