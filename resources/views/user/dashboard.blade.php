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
                <span class="welcome-text">Halo, Selamat Datang AMBATUBLOW</span>
                <a href="" class="auth-btn logout">Logout</a>
            </div>
        </div>
    </div>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark main-nav"> 
        <div class="container-fluid px-4">
            <a class="navbar-brand fs-4" href="#">USER</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-3 gap-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Barang Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- LIST BARANG -->
    <section class="dashboard-section container mt-4">
        <h2>List Barang</h2>

        <div class="card" style="width: 20rem;">
            <img src="..." class="card-img-top" alt="...">

            <div class="card-body">
                <h5 class="card-title">Puding Coklat Pak Hambali</h5>
                <p class="card-text">Puding enak dan bergizi.</p>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">Harga Awal: Rp. 5.000</li>
                <li class="list-group-item">Harga Tertinggi: Rp. 7.000</li>
            </ul>

            <div class="card-body">
                <a href="" class="btn btn-dark w-100">Tawar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- TRANSAKSI -->
    <section class="dashboard-section container mt-4">
        <h2>Transaksi Terbaru</h2>
        <p class="text-muted">Belum ada transaksi.</p>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <style>
       :root {
        --dark-bg: #212529;   /* warna yang sama seperti navbar bootstrap dark */
    }

    /* HEADER */
    .header {
        background: var(--dark-bg);
        padding: 20px 0;
    }

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
        margin: 0;
    }

    .user-area {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .welcome-text {
        color: #f1f1f1;
        font-size: 1rem;
    }

    /* BUTTON STYLE */
    .auth-btn {
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: 0.3s;
        font-weight: 500;
    }

    /* Logout (merah) */
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

    /* ===== NAVBAR AGAR MENYATU TANPA GARIS ===== */
    .main-nav {
        background: var(--dark-bg);
        border-top: none !important;
        margin-top: 0;
        padding-top: 0;
    }

    /* Hilangkan garis pemisah */
    .navbar,
    .header,
    .main-nav {
        border: none !important;
        box-shadow: none !important;
    }

    /* RESPONSIVE */
    @media(max-width: 768px){
        .header-content {
            flex-direction: column;
            text-align: center;
            gap: 10px;
        }
    }

    /* Dashboard Section */
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
