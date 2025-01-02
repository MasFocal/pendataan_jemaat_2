<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
</head>
<body>
    <form method="post">
        <h2>LOGIN PAGE</h2>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Username" required><br><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">LOGIN</button>
    </form>

    <?php 
        session_start();
        include 'koneksi.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $role = '';
            $isLoggedIn = false;

            // 1. Cek di tabel admin terlebih dahulu
            $query_admin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
            $result_admin = mysqli_query($konek_db, $query_admin);

            if (mysqli_num_rows($result_admin) > 0) {
                $row = mysqli_fetch_assoc($result_admin);
                $role = 'admin';
                $isLoggedIn = true;
            }

            // 2. Jika belum ditemukan di admin, cek di tabel user
            if (!$isLoggedIn) {
                $query_majelis = "SELECT * FROM majelis WHERE username = '$username' AND password = '$password'";
                $result_majelis = mysqli_query($konek_db, $query_majelis);

                if (mysqli_num_rows($result_majelis) > 0) {
                    $row = mysqli_fetch_assoc($result_majelis);
                    $role = 'majelis';
                    $isLoggedIn = true;
                }
            }

            // 2. Jika belum ditemukan di admin, cek di tabel user
            if (!$isLoggedIn) {
                $query_jemaat = "SELECT * FROM jemaat WHERE nik = '$username' AND password = '$password'";
                $result_jemaat = mysqli_query($konek_db, $query_jemaat);

                if (mysqli_num_rows($result_jemaat) > 0) {
                    $row = mysqli_fetch_assoc($result_jemaat);
                    $role = 'jemaat';
                    $isLoggedIn = true;
                }
            }

            // 3. Tentukan hasil login
            if ($isLoggedIn) {
                // Set session dan redirect berdasarkan role
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role; // Menyimpan role di session

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
        
        // Menutup koneksi database
        mysqli_close($konek_db);
    ?>
</body>
</html>