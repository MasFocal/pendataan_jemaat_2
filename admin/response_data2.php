<?php
require "../koneksi.php";

$key = $_GET ["key"];
$data = $konek_db->query("SELECT `nik`, `nama_jemaat` FROM `jemaat` WHERE `nama_jemaat` LIKE '%$key%' LIMIT 5")->fetch_all(MYSQLI_ASSOC);
?>

<?php if (count($data) < 1) : ?>
    <li>Not Found</li>
    <?php exit; ?>
<?php endif; ?>

<?php foreach ($data as $row): ?>
    <li id="suggetions" onclick="ambildata2('<?= $row['nik'] ?>', '<?= $row['nama_jemaat'] ?>')"><?=$row['nama_jemaat']?></li>
<?php endforeach; ?>