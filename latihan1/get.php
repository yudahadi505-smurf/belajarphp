<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>get</title>
</head>

<body>
    <?php if (isset($_GET['submit'])) : ?>
        <p>Selamat Datang <?php echo $_GET['nama']; ?></p>
    <?php endif; ?>

    <form method="get">
        <label for="nama">Nama</label>
        <input type="text" name="nama">
        <button type="submit" name="submit">Masuk</button>
    </form>
</body>

</html>