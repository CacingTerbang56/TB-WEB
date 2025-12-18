<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Buat Akun Baru</h4>
                    </div>
                        <div class="card-body">
                            <form action="proses/kirim.php" method="POST" enctype="multipart/form-data">
                                <div class="input-group mb-3">  
                                    <input type="text" name="username" id="nama" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="password" id="harga" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                                    <a href="/" type="button" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'sukses'): ?>
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Register Berhasil.',
        confirmButtonText: 'OK',
        backdrop: true
        });
        </script>
        <?php elseif (isset($_GET['status']) && $_GET['status'] === 'gagal'): ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'Register Gagal!',
        text: 'Terjadi.',
        confirmButtonText: 'Coba Lagi',
        backdrop: true
        });
    </script>
    <?php endif; ?>

  </body>
</html>