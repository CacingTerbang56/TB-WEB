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
                    <ul class="navbar-nav ms-3 gap-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tambah Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">List Barang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </header>

    <!-- DASHBOARD STAT -->
    <section class="stats container mt-5">
      <div class="stat-card">
          <h3>Total Barang</h3>
          <p>0</p>
          <a href="#" class="btn btn-custom">Lihat Semua</a>
      </div>

    

      <div class="stat-card">
          <h3>Total Peserta</h3>
          <p>0</p>
          <a href="#" class="btn btn-custom">Lihat Semua</a>
      </div>

      <div class="stat-card">
          <h3>Total Transaksi</h3>
          <p>0</p>
          <a href="#" class="btn btn-custom">Lihat Semua</a>
      </div>
    </section>

    <!-- SECTION BRAND -->
    <section class="dashboard-section container mt-4">
        <h2>List Barang</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Awal</th>
                    <th>Jumlah Peserta</th>
                    <th>Penawaran Tertinggi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sendok Sup abad ke 12</td>
                    <td>Rp. 40 Juta</td>
                    <td>70</td>
                    <td>Rp. 127 Juta</td>
                </tr>
            </tbody>
        </table>
        <br>
        <a href="" class="btn btn-dark">Tambah Barang Baru</a>
    </section>

    <!-- SECTION TRANSAKSI -->
    <section class="dashboard-section container mt-4">
        <h2>Transaksi Terbaru</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nama Barang</th>
                    <th>Harga Awal</th>
                    <th>Harga Final</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Ambasingh</td>
                    <td>Monyet ijo banyumas</td>
                    <td>Rp. 69.000</td>
                    <td>Rp. 69.Juta</td>
                </tr>
            </tbody>
        </table>
        <p class="text-muted">Belum ada transaksi.</p>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <style>
/* GRID CARD */
.stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 24px;
}

/* CARD STYLE */
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

/* TITLE */
.stat-card h3 {
  font-size: 1.1rem;
  text-transform: uppercase;
}

/* NUMBER */
.stat-card p {
  font-size: 2.5rem;
  font-weight: bold;
}

/* BUTTON STYLE */
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

/* SECTION DASHBOARD */
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

/* TABLE STYLE */
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

/* BUTTON DI TABLE */
.table-btn {
  background: #000;
  color: white;
  padding: 6px 12px;
  border-radius: 6px;
  border: 2px solid transparent;
}

.table-btn:hover {
  background: white;
  color: #000;
  border: 2px solid #000;
}
    </style>

  </body>
</html>
