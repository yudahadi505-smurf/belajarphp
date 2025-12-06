<?php
$siswa = [
    [
        "nama" => "Yuda",
        "umur" => 17,
        "alamat" => "Tangerang"
    ],
    [
        "nama" => "Aldi",
        "umur" => 18,
        "alamat" => "Bandung"
    ],
    [
        "nama" => "Rani",
        "umur" => 16,
        "alamat" => "Jakarta"
    ]
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
            <li>Nama : <?php echo $data["nama"]; ?></li>
            <li>Umur : <?php echo $data["umur"]; ?></li>
            <li>Alamat : <?php echo $data["alamat"]; ?></li>
            <br>
        <?php endforeach; ?>
    </ul>
</body>

</html>
