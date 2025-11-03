<?php
// logout.php
session_start();
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'akademik6';

$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($koneksi->connect_errno) {
    // tetap logout meski koneksi gagal
    session_destroy();
    header('Location: login.php');
    exit;
}

if (isset($_SESSION['iduser'])) {
    $iduser = (int)$_SESSION['iduser'];
    $koneksi->query("UPDATE user6 SET status='F' WHERE iduser=$iduser");
}

session_destroy();
header('Location: login.php');
exit;
