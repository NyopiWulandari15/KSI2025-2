<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$level = $_SESSION['level'];

// Cek hak akses
if ($level !== '10' && $level !== '11') {
    echo "<script>alert('Anda tidak memiliki akses ke halaman ini!');window.location='dashboard.php';</script>";
    exit;
}

// Proses tambah data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'koneksi.php';

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO mahasiswa (nim, nama, prodi, alamat) VALUES ('$nim', '$nama', '$prodi', '$alamat')";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        echo "<script>alert('Data berhasil ditambahkan!');window.location='mahasiswa.php';</script>";
    } else {
        echo "<script>alert('Gagal menambah data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Mahasiswa</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .form-container {
        background: rgba(255, 255, 255, 0.97);
        border-radius: 25px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.25);
        padding: 40px 50px;
        width: 90%;
        max-width: 600px;
        text-align: center;
        animation: fadeIn 0.7s ease;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(-10px);}
        to {opacity: 1; transform: translateY(0);}
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        text-align: left;
    }

    label {
        font-weight: bold;
        color: #444;
    }

    input, select, textarea {
        padding: 10px 15px;
        border-radius: 10px;
        border: 1px solid #ccc;
        outline: none;
        font-size: 15px;
        width: 100%;
    }

    button {
        background: linear-gradient(90deg, #667eea, #764ba2);
        color: white;
        border: none;
        padding: 10px;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: linear-gradient(90deg, #6b73ff, #9a66ff);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(102,126,234,0.3);
    }

    .back {
        margin-top: 15px;
    }

    .back a {
        text-decoration: none;
        color: #667eea;
        font-weight: bold;
    }

    .back a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="form-container">
    <h2><i class="fa-solid fa-user-plus"></i> Tambah Mahasiswa</h2>

    <form method="POST">
        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>

        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>

        <label for="prodi">Program Studi</label>
        <select id="prodi" name="prodi" required>
            <option value="">-- Pilih Prodi --</option>
            <option value="Farmasi">Farmasi</option>
            <option value="Informatika">Informatika</option>
            <option value="Manajemen">Manajemen</option>
        </select>

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap"></textarea>

        <button type="submit"><i class="fa-solid fa-save"></i> Simpan</button>
    </form>

    <div class="back">
        <a href="dashboard.php"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
</div>

</body>
</html>
