<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - KSI2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">KSI2025</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<!-- Content -->
<div class="container my-5">
  <h2 class="text-center mb-4">Data Mahasiswa</h2>
  
  <?php
    $data = file_get_contents("mahasiswa.json");
    $mahasiswa = json_decode($data, true);
  ?>

  <table class="table table-bordered table-striped">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Prodi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        foreach($mahasiswa as $mhs) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$mhs['nama']}</td>
                    <td>{$mhs['nim']}</td>
                    <td>{$mhs['prodi']}</td>
                  </tr>";
            $no++;
        }
      ?>
    </tbody>
  </table>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <p>&copy; <?= date('Y'); ?> KSI2025 - Pemrograman Web</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
