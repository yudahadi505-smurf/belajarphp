<?php
require 'functions.php';
$mahasiswa = select("SELECT * FROM mahasiswa");

if (isset($_GET['hapus'])) {
    if (hapus($_GET['hapus']) > 0) {
        echo "<script>alert('Data berhasil dihapus!');document.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus!');document.location.href='index.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-dark py-5">
    <div class="container">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fw-bold">Daftar Nama Siswa</h1>
                    <a href="tambah.php" class="btn btn-primary fw-semibold px-4">Tambah</a>
                </div>

                <div class="table-responsive rounded-3">
                    <table class="table table-bordered table-hover align-middle mb-0 bg-white">
                        <thead class="table-dark">
                            <tr>
                                <th>NO.</th>
                                <th>Aksi</th>
                                <th>Gambar</th>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($mahasiswa as $row) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td>
                                        <a href="index.php?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm ('Yakin Hapus ?')">Hapus</a>
                                        <a href="#" class="btn btn-sm btn-outline-primary ms-1">Ubah</a>
                                    </td>
                                    <td>
                                        <img src="img/<?= $row['gambar']; ?>" alt="" width="60" class="img-thumbnail rounded" />
                                    </td>
                                    <td><?= $row["nrp"]; ?></td>
                                    <td><?= $row["nama"]; ?></td>
                                    <td><?= $row["email"]; ?></td>
                                    <td><?= $row["alamat"]; ?></td>
                                    <td><?= $row["jurusan"]; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>