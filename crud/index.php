<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

// pagination
$jumlahDataPerHalaman =  3;
$jumlahData = count(select("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;



$mahasiswa = select("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");
//isset untuk mengecek apakah ada parameter hapus pada url
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark py-5">

    <div class="container">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">

                <!-- HEADER -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-4">
                        <h4 class="fw-bold mb-0">Daftar Mahasiswa</h4>
                        <small class="text-muted">Manajemen data mahasiswa</small>
                    </div>

                    <div class="col-md-5">
                        <form action="" method="post" class="d-flex gap-2">
                            <input type="text"
                                name="keyword"
                                class="form-control"
                                placeholder="Cari nama / NRP / jurusan..."
                                autocomplete="off"
                                autofocus
                                id="keyword">
                            <button type="submit" name="cari"
                                class="btn btn-primary px-4"
                                id="tombol-cari">
                                Cari
                            </button>
                        </form>
                    </div>

                    <div class="col-md-3 text-end">
                        <a href="logout.php"
                            class="btn btn-outline-danger me-2">
                            Logout
                        </a>
                        <a href="tambah.php"
                            class="btn btn-success fw-semibold">
                            + Tambah
                        </a>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="table-responsive" id="table-container">
                    <table class="table table-hover align-middle">
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
                            <?php $i = $awalData + 1; ?>
                            <?php foreach ($mahasiswa as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $i; ?></td>

                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="ubah.php?id=<?= $row['id']; ?>"
                                                class="btn btn-outline-primary">
                                                Ubah
                                            </a>
                                            <a href="index.php?hapus=<?= $row['id']; ?>"
                                                class="btn btn-outline-danger"
                                                onclick="return confirm('Yakin hapus data ini?')">
                                                Hapus
                                            </a>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <img src="img/<?= $row['gambar']; ?>"
                                            width="45"
                                            height="45"
                                            class="rounded-circle border object-fit-cover"
                                            alt="foto">
                                    </td>

                                    <td><?= $row['nrp']; ?></td>
                                    <td class="fw-semibold"><?= $row['nama']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['jurusan']; ?></td>
                                </tr>
                            <?php $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
                <?php if (!isset($_POST['cari'])) : ?>
                    <nav class="mt-4">
                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                <li class="page-item <?= ($i == $halamanAktif) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?= $i; ?>">
                                        <?= $i; ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>