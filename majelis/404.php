<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Not Found Page</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
    ?>

    <div class="body-content">
        <h1>404 - Not Found Page</h1>
        <h3>Silahkan ke Halaman Utama</h3>
        <a id="-" href="index.php"><button id="btn-kembali">KEMBALI</button></a>
    </div>
</body>
</html>