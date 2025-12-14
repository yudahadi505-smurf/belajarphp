<?php
require 'functions.php';
$mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id ASC");

if (isset($_GET['hapus'])) {
    if (hapus($_GET['hapus']) > 0) {
        echo "<script>alert('Data berhasil dihapus!');document.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus!');document.location.href='index.php';</script>";
    }
}
if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
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

                <!-- HEADER -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-4">
                        <h3 class="fw-bold text-dark mb-0">Daftar Mahasiswa</h3>
                        <small class="text-muted">Manajemen data siswa</small>
                    </div>

                    <div class="col-md-5">
                        <form action="" method="post" class="d-flex gap-2">
                            <input
                                type="text"
                                name="keyword"
                                class="form-control"
                                placeholder="Cari nama / NRP / jurusan..."
                                autocomplete="off">
                            <button type="submit" name="cari" class="btn btn-primary px-4">
                                Cari
                            </button>
                        </form>
                    </div>

                    <div class="col-md-3 text-end">
                        <a href="tambah.php" class="btn btn-success px-4 fw-semibold">
                            + Tambah Data
                        </a>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Foto</th>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Jurusan</th>
                            </tr>
                        </thead>

                        <tbody class="table-light">
                            <?php $i = 1; ?>
                            <?php foreach ($mahasiswa as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $i; ?></td>

                                    <td class="text-center">
                                        <a href="ubah.php?id=<?= $row['id'] ?>"
                                            class="btn btn-sm btn-outline-primary">
                                            Ubah
                                        </a>
                                        <a href="index.php?hapus=<?= $row['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin hapus data ini?')">
                                            Hapus
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <img src="img/<?= $row['gambar']; ?>"
                                            width="50"
                                            class="rounded-circle border"
                                            alt="foto">
                                    </td>

                                    <td><?= $row['nrp']; ?></td>
                                    <td class="fw-semibold"><?= $row['nama']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['jurusan']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>


</html>