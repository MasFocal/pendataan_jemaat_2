<?php
    include "../koneksi.php";

    session_start();

    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
        header("Location: ../index.php");
        exit();
    }
?>