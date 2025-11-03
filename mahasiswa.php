<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$level = $_SESSION['level'];
$idprodi = $_SESSION['idprodi'];

include 'koneksi.php'; // 🔗 koneksi ke database pbd9

// Tambah data
if (isset($_POST['tambah'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $idp = ($level == '10') ? $_POST['idprodi'] : $idprodi;
    $conn->query("INSERT INTO mahasiswa9 (npm, nama, idprodi) VALUES ('$npm', '$nama', '$idp')");
    header("Location: mahasiswa.php");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($level == '10') {
        $conn->query("DELETE FROM mahasiswa9 WHERE idmhs=$id");
    } else {
        $conn->query("DELETE FROM mahasiswa9 WHERE idmhs=$id AND idprodi=$idprodi");
    }
    header("Location: mahasiswa.php");
}

// Ambil data
if ($level == '10') {
    $data = $conn->query("SELECT m.*, p.namaprodi FROM mahasiswa9 m LEFT JOIN prodi9 p ON m.idprodi=p.idprodi");
    $prodi = $conn->query("SELECT * FROM prodi9");
} else {
    $data = $conn->query("SELECT m.*, p.namaprodi FROM mahasiswa9 m LEFT JOIN prodi9 p ON m.idprodi=p.idprodi WHERE m.idprodi=$idprodi");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Mahasiswa</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
<?php include 'style.css'; ?>
</style>
</head>
<body>
<div class="container">
<h2>🎓 Kelola Mahasiswa</h2>

<form method="post" class="form-box">
  <input type="text" name="npm" placeholder="Masukkan NPM" maxlength="8" required>
  <input type="text" name="nama" placeholder="Masukkan Nama Mahasiswa" required>
  <?php if ($level == '10'): ?>
  <select name="idprodi" required>
    <option value="">Pilih Prodi</option>
    <?php while($p = $prodi->fetch_assoc()): ?>
      <option value="<?= $p['idprodi'] ?>"><?= $p['namaprodi'] ?></option>
    <?php endwhile; ?>
  </select>
  <?php endif; ?>
  <button name="tambah"><i class="fa-solid fa-plus"></i> Tambah</button>
</form>

<table>
  <tr>
    <th>ID</th><th>NPM</th><th>Nama</th><th>Prodi</th><th>Aksi</th>
  </tr>
  <?php while($r = $data->fetch_assoc()): ?>
  <tr>
    <td><?= $r['idmhs'] ?></td>
    <td><?= $r['npm'] ?></td>
    <td><?= $r['nama'] ?></td>
    <td><?= $r['namaprodi'] ?></td>
    <td><a class="hapus" href="?hapus=<?= $r['idmhs'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i> Hapus</a></td>
  </tr>
  <?php endwhile; ?>
</table>

<a href="index.php" class="back"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
</div>
</body>
</html>
