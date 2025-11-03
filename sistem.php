<?php
// sistem.php
session_start();

// konfigurasi DB
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'akademik6';

// koneksi
$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($koneksi->connect_errno) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// ambil input
$username = isset($_POST['username']) ? $koneksi->real_escape_string($_POST['username']) : '';
$password = isset($_POST['password']) ? $koneksi->real_escape_string($_POST['password']) : '';

if (empty($username) || empty($password)) {
    echo "<script>alert('Isi username & password');window.location='login.php';</script>";
    exit;
}

// prepare & cek user (password disimpan plain sesuai BPP)
$stmt = $koneksi->prepare("SELECT iduser, username, password, jenisuser, level, status, idprodi FROM user6 WHERE username = ? LIMIT 1");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Username tidak ditemukan');window.location='login.php';</script>";
    exit;
}

$user = $result->fetch_assoc();

// cek password (plain text)
if ($password !== $user['password']) {
    echo "<script>alert('Password salah');window.location='login.php';</script>";
    exit;
}

// cek status online (prevent double login)
if ($user['status'] === 'T') {
    echo "<script>alert('Akun sedang digunakan (sudah online).');window.location='login.php';</script>";
    exit;
}

// set status online
$koneksi->query("UPDATE user6 SET status='T' WHERE iduser=" . (int)$user['iduser']);

// set session
$_SESSION['iduser'] = $user['iduser'];
$_SESSION['username'] = $user['username'];
$_SESSION['jenisuser'] = $user['jenisuser'];
$_SESSION['level'] = $user['level'];
$_SESSION['idprodi'] = $user['idprodi'];

header("Location: index.php");
exit;
