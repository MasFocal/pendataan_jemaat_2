<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Jemaat</title>
    <link rel="stylesheet" href="../css/style-dashboard.css">
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        $sql = mysqli_query ($konek_db, "SELECT * FROM jemaat WHERE nik='".$_SESSION['username']."'");
        $data = mysqli_fetch_array ($sql);
    ?>
    <div class="body-content">
        <label>Hallo, <b><?php echo $data['nama_jemaat'] ?></b><br>Selamat Datang</label>
    </div>
</body>
</html>