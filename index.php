<?php
// =================================================================
// PHP NATIVE: SIMULASI DATA MAHASISWA (menggantikan koneksi database)
// =================================================================

$mahasiswa = [
    ['nim' => '2025001', 'nama' => 'Budi Santoso', 'jurusan' => 'Teknik Informatika'],
    ['nim' => '2025002', 'nama' => 'Citra Dewi', 'jurusan' => 'Sistem Informasi'],
    ['nim' => '2025003', 'nama' => 'Ahmad Fauzi', 'jurusan' => 'Teknik Komputer'],
    ['nim' => '2025004', 'nama' => 'Dewi Lestari', 'jurusan' => 'Teknik Informatika']
];

// =================================================================
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Data Mahasiswa KSI 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">KSI2025 Data Mahasiswa</a>
        </div>
    </nav>

    <div class="container my-5" style="min-height: 50vh;">
        <h1 class="mb-4 text-center">Daftar Data Mahasiswa</h1>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover shadow-sm">
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
                    // Looping menggunakan PHP Native untuk menampilkan data dari array $mahasiswa
                    foreach ($mahasiswa as $data) { 
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
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light border-top">
        <div class="container text-center">
            <span class="text-muted">© 2025 Tugas KSI - PHP Native + Bootstrap</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>