<?php
$conn = mysqli_connect("localhost", "root", "", "belajarphp");
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

    <div class="container py-5">

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <h1 class="mb-4 fw-bold">Daftar Nama Siswa</h1>

                <table class="table table-bordered table-striped bg-white">
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
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td>
                                    <a href="#" class="text-danger">hapus</a> |
                                    <a href="#" class="text-primary">ubah</a>
                                </td>
                                <td>
                                    <img src="img/<?= $row['gambar']; ?>"
                                        alt=""
                                        width="60"
                                        class="img-thumbnail">
                                </td>
                                <td><?= $row["nrp"]; ?></td>
                                <td><?= $row["nama"]; ?></td>
                                <td><?= $row["email"]; ?></td>
                                <td><?= $row["alamat"]; ?></td>
                                <td><?= $row["jurusan"]; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>

</html>