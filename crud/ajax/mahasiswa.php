<?php
require '../functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa 
WHERE nama LIKE '%$keyword%' 
OR nrp LIKE '%$keyword%' OR 
email LIKE '%$keyword%' OR 
jurusan LIKE '%$keyword%' OR
alamat LIKE '%$keyword%'";
$mahasiswa = select($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                        <?php $i = 1; ?>
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
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
</body>
</html>