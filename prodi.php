<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] !== '10') {
    echo "<script>alert('Akses ditolak!');window.location='index.php';</script>";
    exit;
}

$DB_HOST = 'localhost'; $DB_USER = 'root'; $DB_PASS = ''; $DB_NAME = 'akademik6';
$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (isset($_POST['tambah'])) {
    $nama = $koneksi->real_escape_string($_POST['namaprodi']);
    $koneksi->query("INSERT INTO prodi6 (namaprodi) VALUES ('$nama')");
    header('Location: prodi.php'); exit;
}
if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    $koneksi->query("DELETE FROM prodi6 WHERE idprodi=$id");
    header('Location: prodi.php'); exit;
}
$res = $koneksi->query("SELECT * FROM prodi6");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Prodi</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
  body { font-family:'Poppins',sans-serif;background:linear-gradient(135deg,#667eea,#764ba2);
    display:flex;justify-content:center;align-items:center;min-height:100vh;margin:0;}
  .container { background:rgba(255,255,255,0.97);border-radius:20px;box-shadow:0 8px 25px rgba(0,0,0,0.2);
    padding:30px 40px;width:90%;max-width:700px;animation:fadeIn .7s ease;}
  @keyframes fadeIn{from{opacity:0;transform:translateY(-15px);}to{opacity:1;transform:translateY(0);}}
  h2{text-align:center;color:#333;margin-bottom:15px;}
  .form-box{display:flex;justify-content:center;gap:10px;margin-bottom:25px;}
  .form-box input{padding:10px;border:1px solid #ccc;border-radius:8px;width:60%;}
  .form-box button{background:linear-gradient(90deg,#667eea,#764ba2);border:none;color:#fff;
    padding:10px 18px;border-radius:8px;cursor:pointer;transition:.3s;}
  .form-box button:hover{background:linear-gradient(90deg,#6b73ff,#9a66ff);transform:translateY(-2px);}
  table{width:100%;border-collapse:collapse;font-size:14px;}
  th,td{padding:10px;text-align:center;border-bottom:1px solid #ddd;}
  th{background:#f4f4f4;}
  tr:hover{background:#f1f5ff;}
  a.hapus{color:#ff4f4f;text-decoration:none;font-weight:bold;}
  a.hapus:hover{text-decoration:underline;}
  .back{text-align:center;margin-top:15px;}
  .back a{color:#667eea;text-decoration:none;font-weight:bold;}
  .back a:hover{text-decoration:underline;}
</style>
</head>
<body>
  <div class="container">
    <h2>🏫 Kelola Program Studi</h2>
    <form method="post" class="form-box">
      <input name="namaprodi" placeholder="Masukkan Nama Prodi" required>
      <button name="tambah"><i class="fa-solid fa-plus"></i> Tambah</button>
    </form>
    <table>
      <tr><th>ID</th><th>Nama Prodi</th><th>Aksi</th></tr>
      <?php while($r=$res->fetch_assoc()): ?>
      <tr>
        <td><?= $r['idprodi'] ?></td>
        <td><?= htmlspecialchars($r['namaprodi']) ?></td>
        <td><a class="hapus" onclick="return confirm('Hapus data ini?')" href="?hapus=<?= $r['idprodi'] ?>"><i class="fa-solid fa-trash"></i> Hapus</a></td>
      </tr>
      <?php endwhile; ?>
    </table>
    <div class="back">
      <a href="index.php"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
  </div>
</body>
</html>
