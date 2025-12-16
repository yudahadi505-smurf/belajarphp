<?php
$conn = mysqli_connect("localhost", "root", "", "belajarphp");

if (!$conn) {
    die("Koneksi database gagal");
}

/* =========================
   SELECT (READ)
========================= */
function select($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    if (!$result) {
        return $rows;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

/* =========================
   TAMBAH DATA (CREATE)
========================= */
function tambah($data)
{
    global $conn;

    $nama    = trim($data['nama']);
    $nrp     = trim($data['nrp']);
    $email   = trim($data['email']);
    $jurusan = trim($data['jurusan']);
    $alamat  = trim($data['alamat']);

    $gambar  = upload();
    if (!$gambar) {
        return false;
    }
    // VALIDASI
    if ($nama === '' || $nrp === '' || $email === '') {
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO mahasiswa 
        (nama, nrp, email, jurusan, gambar, alamat)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssssss",
        $nama,
        $nrp,
        $email,
        $jurusan,
        $gambar,
        $alamat
    );

    mysqli_stmt_execute($stmt);
    return mysqli_stmt_affected_rows($stmt);
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

    if ($ukuranFile > 2000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

/* =========================
   HAPUS DATA (DELETE)
========================= */
function hapus($id)
{
    global $conn;

    $id = (int)$id;

    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM mahasiswa WHERE id = ?"
    );

    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_affected_rows($stmt);
}

/* =========================
   UBAH DATA (UPDATE)
========================= */
function ubah($data)
{
    global $conn;

    $id      = (int)$data['id'];
    $nama    = trim($data['nama']);
    $nrp     = trim($data['nrp']);
    $email   = trim($data['email']);
    $jurusan = trim($data['jurusan']);
    $gambar  = trim($data['gambar']);
    $alamat  = trim($data['alamat']);

    // VALIDASI
    if ($id <= 0 || $nama === '' || $nrp === '' || $email === '') {
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE mahasiswa SET
            nama = ?,
            nrp = ?,
            email = ?,
            jurusan = ?,
            gambar = ?,
            alamat = ?
         WHERE id = ?"
    );

    if (!$stmt) {
        return false;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssi",
        $nama,
        $nrp,
        $email,
        $jurusan,
        $gambar,
        $alamat,
        $id
    );

    mysqli_stmt_execute($stmt);
    return mysqli_stmt_affected_rows($stmt);
}
