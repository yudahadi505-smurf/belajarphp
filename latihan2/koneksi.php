<?php
$conn = mysqli_connect("localhost", "root", "", "belajarphp");
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");


// while ($mhs = mysqli_fetch_assoc($result)) {
//     print_r($mhs);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi</title>
</head>

<body>
    <h1>Daftar Nama Siswa</h1>

    <table border="1  ">
        <?php while ($row = mysqli_fetch_assoc($result)) :?>
        <tr>
            <th>
            NO.
            </th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Jurusan</th>
        </tr>

        <tr>
            <td><?php echo $row["id_mahasiswa"]?></td>
            <td>
                <a href="">hapus |</a>
                <a href="">ubah</a>
            </td>
            <td><img src="<?php echo $row["gambar"]?>"></td>
            <td><?php echo $row["nrp"]?></td>
            <td><?php echo $row["nama"]?></td>
            <td><?php echo $row["email"]?></td>
            <td><?php echo $row["alamat"]?></td>
            <td><?php echo $row["jurusan"]?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>

</html>