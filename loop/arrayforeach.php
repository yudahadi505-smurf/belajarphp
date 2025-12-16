<?php
$siswa = [
    ["Yuda", 17, "Tangerang"],
    ["Aldi", 18, "Bandung"],
    ["Rani", 16, "Jakarta"]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
</head>

<body>
    <h1>DAFTAR NAMA SISWA</h1>
    <ul>
        <?php foreach ($siswa as $data) : ?>
            <li>Nama : <?php echo $data[0]; ?></li>
            <li>Umur : <?php echo $data[1]; ?></li>
            <li>Alamat : <?php echo $data[2]; ?></li>
            <br>
        <?php endforeach; ?>
    </ul>
</body>

</html>