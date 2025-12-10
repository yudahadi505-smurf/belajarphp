<?php
$conn = mysqli_connect("localhost", "root", "", "belajarphp");

function select()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data)
{
    global $conn;

    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat']);
    $jurusan = htmlspecialchars($data['jurusan']);

    $query = "INSERT INTO mahasiswa
                VALUES
                ('', '$nrp', '$nama', '$email', '$alamat', '$jurusan')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
