<?php
//mysqli_connect("host", "username", "password", "database_name");
//berfungsi untuk menghubungkan php dengan database mysql
$conn = mysqli_connect("localhost", "root", "", "belajarphp");

function select($query)
{
    global $conn;
    // mysqli_query berfungsi untuk menjalankan query ke database
    $result = mysqli_query($conn, $query);
    $rows = [];
    // mysqli_fetch_assoc berfungsi untuk mengambil data dari hasil query dan mengembalikannya dalam bentuk array asosiatif
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $conn;
    // htmlspecialchars untuk menghindari script injection
    $nama = htmlspecialchars($data['nama']);
    $nrp = htmlspecialchars($data['nrp']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $alamat = htmlspecialchars($data['alamat']);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar, alamat)
              VALUES ('$nama', '$nrp', '$email', '$jurusan', '$gambar', '$alamat')";

    mysqli_query($conn, $query);
    //msqli_affected_rows berfungsi untuk mengecek apakah ada baris yang terpengaruh oleh query sebelumnya
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
    //explode adalah fungsi untuk memecah string menjadi array berdasarkan pemisah tertentu
    $ekstensiGambar = explode('.', $namaFile);
    //strtolower adalah fungsi untuk mengubah string menjadi huruf kecil semua
    //end adalah fungsi untuk mengambil elemen terakhir dari array
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
    //uniqid() adalah fungsi untuk membuat nama unik pada file yang diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    // move_upload_file adalah fungsi untuk memindahkan file yang diupload ke folder tujuan
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    //intval untuk mengamankan id dari sql injection agar id yang diterima hanya berupa angka
    $id = intval($id);

    $file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'"));
    unlink('img/' . $file["gambar"]);
    $hapus = "DELETE FROM mahasiswa WHERE id='$id'";
    mysqli_query($conn, $hapus);
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

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $data['gambarLama'];
    } else {
        $gambar = upload();
    }

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

function register($data)
{
    global $conn;

    $username = strtolower(htmlspecialchars($data['username']));
    $email = htmlspecialchars($data['email']);
    //mysqli_real_escape_string berfungsi untuk mengamankan inputan dari karakter khusus yang dapat merusak query sql
    $password =  mysqli_real_escape_string($conn, $data['password']);
    $password2 =  mysqli_real_escape_string($conn, $data['password2']);

    $result = mysqli_query($conn, "SELECT username from user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!');
              </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (username, email, password ) VALUES ('$username','$email', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
