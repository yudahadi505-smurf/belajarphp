<?php
require 'functions.php';
$id = $_GET['id'];
$mahasiswa = select("SELECT * FROM mahasiswa where id= $id")[0];

if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {

        echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ubah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4 fw-bold">Ubah Data Mahasiswa</h2>

                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
                            <input type="hidden" name="gambarLama" value="<?= $mahasiswa['gambar']; ?>">
                            <div class="mb-3">
                                <label for="nrp" class="form-label">NRP</label>
                                <input type="text" name="nrp" id="nrp" class="form-control" value="<?= $mahasiswa['nrp'] ?>" required />
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $mahasiswa['nama'] ?>" required />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?= $mahasiswa['email'] ?>" required />
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $mahasiswa['alamat'] ?>" required />
                            </div>

                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $mahasiswa['jurusan'] ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <img src="img/<?= $mahasiswa['gambar'] ?>" alt="<?= $mahasiswa['gambar'] ?>" width="100" height="100" class="d-block mb-2">
                                <input type="file" name="gambar" id="gambar" class="form-control" />
                            </div>
                            <a href="index.php" class="btn btn-primary fw-semibold py-2 w-100 mb-2">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary w-100 py-2 fw-semibold">Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>