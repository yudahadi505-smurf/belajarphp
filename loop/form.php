<?php
$_POST

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-secondary">
    <h1 class="color-danger">Halaman Siswa</h1>

    <form action="halamanutama.php" method="post" class="required"><br>
        <div class="container">
            <div class="row card">
                <div class="col card-body border-3 bg-primary">
                    <label for="nama">Masukan Nama</label><br>
                    <input type="text" placeholder="Yuda" name="nama" require> </input><br>
                    <label for="nama">Masukan Jurusan</label><br>
                    <input type="text" placeholder="Teknik Industri" name="jurusan" require> </input> <br>
                    <label for="nama">Masukan Alamat</label><br>
                    <input type="textarea" placeholder="Tangerang" name="alamat" require> </input> <br>
                    <label for="nama">Masukan Email</label><br>
                    <input type="text" placeholder="Example@gmail.com" name="email" require> </input> <br>
                    <button type="submit">Masuk</button>
                </div>
            </div>
        </div>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>