<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        $sql = mysqli_query ($konek_db, "SELECT * FROM admin WHERE username='".$_SESSION['username']."'");
        $data = mysqli_fetch_array ($sql);
    ?>

    <div class="body-content">
        <h1>Profile</h1>
        <div class="profile">
            <table id="tb-list">
                <tr>
                    <td><label id="list-data-diri">Nama Admin :</label></td>
                    <td><label><b><?php echo $data['nama_admin'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="list-data-diri">Username :</label></td>
                    <td><label><b><?php echo $data['username'] ?></b></label></td>
                </tr>
            </table>
        </div>
        <div class="btn-profile">
            <a id="-" href="edit_profile.php"><button id="btn-edit-profile">EDIT DATA</button></a>
            <a id="-" href="edit_password.php"><button id="btn-edit-profile">GANTI PASSWORD</button></a>
        </div>
    </div>
</body>
</html>