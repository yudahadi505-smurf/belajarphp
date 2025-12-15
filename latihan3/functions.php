<?php
$conn = mysqli_connect("localhost", "root", "", "belajarphp");

function select($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $nrp = htmlspecialchars($data['nrp']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $alamat = htmlspecialchars($data['alamat']);
    $gambar = upload(); // Assume upload() is a function that handles file uploads
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar, alamat)
              VALUES ('$nama', '$nrp', '$email', '$jurusan', '$gambar', '$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }
    if ($ukuranFile > 3000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }
    move_uploaded_file($tmpName, 'img/' . $namaFile);
    return $namaFile;
}

function hapus($id)
{
    global $conn;
    $id = intval($id);

    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function ubah($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $nrp = htmlspecialchars($data['nrp']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);
    $alamat = htmlspecialchars($data['alamat']);

    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nrp = '$nrp',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar',
                alamat = '$alamat'
              WHERE id = {$data['id']}";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa
              WHERE
              nama LIKE '%$keyword%' OR
              nrp LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%' OR
              alamat LIKE '%$keyword%'";
    return select($query);
}
