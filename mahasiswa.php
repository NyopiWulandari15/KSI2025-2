<?php
// --- SIMULASI DATA MAHASISWA (menggantikan koneksi database) ---
$mahasiswa = [
    ['nim' => '2025001', 'nama' => 'Budi Santoso', 'jurusan' => 'Teknik Informatika'],
    ['nim' => '2025002', 'nama' => 'Citra Dewi', 'jurusan' => 'Sistem Informasi'],
    ['nim' => '2025003', 'nama' => 'Ahmad Fauzi', 'jurusan' => 'Teknik Komputer'],
    ['nim' => '2025004', 'nama' => 'Dewi Lestari', 'jurusan' => 'Teknik Informatika']
];
// -----------------------------------------------------------------
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - KSI 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">Repo KSI2025</a>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="mb-4 text-center">Data Mahasiswa Angkatan 2025</h1>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover border">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; // Inisialisasi nomor urut
                    foreach ($mahasiswa as $data) { 
                        // Loop PHP untuk menampilkan setiap baris data
                    ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $data['nim']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['jurusan']; ?></td>
                    </tr>
                    <?php 
                    } // Akhir dari loop PHP
                    ?>
                </tbody>
            </table>
            
            <?php if (empty($mahasiswa)): ?>
                <div class="alert alert-warning text-center" role="alert">
                    Data mahasiswa kosong.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light border-top">
        <div class="container">
            <span class="text-muted">Tugas PHP Native + Bootstrap untuk repo "ksi2025"</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>