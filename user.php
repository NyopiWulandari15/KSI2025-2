<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] != '10') {
    header("Location: index.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "akademik6");
if ($conn->connect_error) die("Koneksi gagal: " . $conn->connect_error);

$prodi = $conn->query("SELECT * FROM prodi6");

// tambah user/admin
if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jenisuser = $_POST['jenisuser'];
    $level = $_POST['level'];
    $idprodi = $_POST['idprodi'];
    $conn->query("INSERT INTO user6 (username,password,jenisuser,level,status,idprodi)
                  VALUES ('$username','$password','$jenisuser','$level','F','$idprodi')");
    header("Location: user.php");
}

// hapus user
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM user6 WHERE iduser=$id");
    header("Location: user.php");
}

$data = $conn->query("SELECT u.*, p.namaprodi FROM user6 u LEFT JOIN prodi6 p ON u.idprodi=p.idprodi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola User/Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
<?php include 'style.css'; ?>
</style>
</head>
<body>
<div class="container">
<h2>👥 Kelola User/Admin</h2>

<form method="post" class="form-box">
  <input name="username" placeholder="Username" required>
  <input name="password" placeholder="Password" required>
  <select name="jenisuser" required>
    <option value="1">Admin</option>
    <option value="0">Client</option>
  </select>
  <select name="level" required>
    <option value="10">Superadmin</option>
    <option value="11">Admin</option>
  </select>
  <select name="idprodi" required>
    <option value="0">Tanpa Prodi</option>
    <?php while($p = $prodi->fetch_assoc()): ?>
      <option value="<?= $p['idprodi'] ?>"><?= $p['namaprodi'] ?></option>
    <?php endwhile; ?>
  </select>
  <button name="tambah"><i class="fa-solid fa-plus"></i> Tambah</button>
</form>

<table>
  <tr><th>ID</th><th>Username</th><th>Jenis</th><th>Level</th><th>Prodi</th><th>Aksi</th></tr>
  <?php while($r = $data->fetch_assoc()): ?>
  <tr>
    <td><?= $r['iduser'] ?></td>
    <td><?= $r['username'] ?></td>
    <td><?= $r['jenisuser'] ?></td>
    <td><?= $r['level'] ?></td>
    <td><?= $r['namaprodi'] ?></td>
    <td><a class="hapus" href="?hapus=<?= $r['iduser'] ?>" onclick="return confirm('Hapus user ini?')"><i class="fa-solid fa-trash"></i> Hapus</a></td>
  </tr>
  <?php endwhile; ?>
</table>

<a href="index.php" class="back"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
</div>
</body>
</html>
