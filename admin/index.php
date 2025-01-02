<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../css/style-dashboard-admin.css">
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        $sql = mysqli_query ($konek_db, "SELECT * FROM admin WHERE username='".$_SESSION['username']."'");
        $data = mysqli_fetch_array ($sql);
    ?>
    <div class="body-content">
        <label>Hai, Selamat Datang <br><b><?php echo $data['nama_admin'] ?></b></label>
    </div>
</body>
</html>