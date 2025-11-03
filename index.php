<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$level = $_SESSION['level'];
$jenisuser = $_SESSION['jenisuser'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Sistem Akademik</title>
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

    .dashboard {
        background: rgba(255, 255, 255, 0.97);
        border-radius: 25px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.25);
        padding: 40px 60px;
        width: 90%;
        max-width: 900px;
        text-align: center;
        animation: fadeIn 0.7s ease;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(-10px);}
        to {opacity: 1; transform: translateY(0);}
    }

    h1 {
        color: #333;
        font-size: 28px;
        margin-bottom: 5px;
    }

    p {
        color: #555;
        margin-bottom: 35px;
        font-size: 15px;
    }

    .menu-container {
        display: flex;
        justify-content: center;
        gap: 25px;
        flex-wrap: wrap;
    }

    .menu-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        width: 200px;
        padding: 25px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .menu-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .menu-card i {
        font-size: 42px;
        color: #667eea;
        margin-bottom: 12px;
    }

    .menu-card span {
        display: block;
        font-weight: bold;
        color: #333;
        font-size: 16px;
        margin-top: 8px;
    }

    .logout {
        margin-top: 40px;
    }

    .logout a {
        background: linear-gradient(90deg, #667eea, #764ba2);
        color: white;
        padding: 10px 25px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .logout a:hover {
        background: linear-gradient(90deg, #6b73ff, #9a66ff);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(102,126,234,0.3);
    }

    footer {
        margin-top: 30px;
        color: #777;
        font-size: 12px;
    }
</style>
</head>
<body>

<div class="dashboard">
    <h1>Selamat Datang, <?= htmlspecialchars($username) ?> 👋</h1>
    <p>Jenis User: <?= htmlspecialchars($jenisuser) ?> | Level: <?= htmlspecialchars($level) ?></p>

    <div class="menu-container">
        <!-- Menu untuk ADMIN -->
        <?php if ($level === '11'): ?>
            <div class="menu-card" onclick="window.location='mahasiswa.php'">
                <i class="fa-solid fa-user-graduate"></i>
                <span>Kelola Mahasiswa</span>
            </div>
        <?php endif; ?>

        <!-- Menu untuk SUPERADMIN -->
        <?php if ($level === '10'): ?>
            <div class="menu-card" onclick="window.location='mahasiswa.php'">
                <i class="fa-solid fa-user-graduate"></i>
                <span>Kelola Mahasiswa</span>
            </div>

            <div class="menu-card" onclick="window.location='user.php'">
                <i class="fa-solid fa-users-gear"></i>
                <span>Kelola User/Admin</span>
            </div>

            <div class="menu-card" onclick="window.location='prodi.php'">
                <i class="fa-solid fa-building-columns"></i>
                <span>Kelola Prodi</span>
            </div>
        <?php endif; ?>
    </div>

    <div class="logout">
        <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </div>

    <footer>
        Sistem Akademik PBD — <?= date("Y") ?>
    </footer>
</div>

</body>
</html>
