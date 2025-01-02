<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="css/style-login.css">
</head>
<body>
    <?php 
        session_start();
        include 'koneksi.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $role = '';
            $isLoggedIn = false;

            // 1. Cek di tabel admin terlebih dahulu
            if (!$isLoggedIn) {
                $query_admin = mysqli_query($konek_db, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

                if (mysqli_num_rows($query_admin) > 0) {
                    $row = mysqli_fetch_assoc($query_admin);
                    $role = 'admin';
                    $isLoggedIn = true;
                }
            }

            // 2. Jika belum ditemukan di admin, cek di tabel user
            if (!$isLoggedIn) {
                $query_majelis = mysqli_query($konek_db, "SELECT * FROM majelis INNER JOIN jemaat ON majelis.nik = jemaat.nik WHERE majelis.nik = '$username' AND jemaat.password = '$password'");

                if (mysqli_num_rows($query_majelis) > 0) {
                    $row = mysqli_fetch_assoc($query_majelis);
                    if ($row['status'] === 'Aktif') {
                        $role = 'majelis';
                    } else {
                        $role = 'jemaat';
                    }
                    $isLoggedIn = true;
                }
            }

            // 2. Jika belum ditemukan di admin, cek di tabel user
            if (!$isLoggedIn) {
                $query_jemaat = mysqli_query($konek_db, "SELECT * FROM jemaat WHERE nik = '$username' AND password = '$password'");

                if (mysqli_num_rows($query_jemaat) > 0) {
                    $row = mysqli_fetch_assoc($query_jemaat);
                    $role = 'jemaat';
                    $isLoggedIn = true;
                }
            }

            // 3. Tentukan hasil login
            if ($isLoggedIn) {
                // Set session dan redirect berdasarkan role
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;

                if ($role == 'admin') {
                    header("Location: admin/index.php");
                } elseif ($role == 'majelis') {
                    header("Location: majelis/index.php");
                } else {
                    header("Location: jemaat/index.php");
                }
                exit();
            } else {
                echo ("
                    <script LANGUAGE='JavaScript'>
                        window.alert('Username atau Password Salah');
                        window.location.href='index.php';
                    </script>
                ");
                exit();
            }
        }
    ?>

    <form method="post">
        <div class="form-head">
            <img src="image/logo.png" alt="">
            <h1>LOGIN PAGE</h1>
        </div>
        <label for="username">Username :</label>
        <input type="text" name="username" placeholder="Username" required>
        <label for="password">Password :</label>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">LOGIN</button>
    </form>
</body>
</html>