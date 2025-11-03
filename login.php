<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Sistem Akademik</title>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .login-container {
    background: rgba(255,255,255,0.95);
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    width: 370px;
    padding: 40px 35px;
    text-align: center;
    position: relative;
    animation: fadeIn 0.8s ease;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  h2 {
    margin-bottom: 25px;
    color: #333;
    letter-spacing: 1px;
  }
  .input-box {
    position: relative;
    margin-bottom: 20px;
  }
  .input-box input {
    width: 100%;
    padding: 12px 40px 12px 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 15px;
    transition: all 0.3s ease;
  }
  .input-box input:focus {
    border-color: #667eea;
    box-shadow: 0 0 5px #667eea;
    outline: none;
  }
  .input-box i {
    position: absolute;
    right: 15px;
    top: 13px;
    color: #888;
  }
  button {
    width: 100%;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border: none;
    padding: 12px;
    color: #fff;
    font-size: 15px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  button:hover {
    background: linear-gradient(90deg, #6b73ff, #9a66ff);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102,126,234,0.3);
  }
  .info {
    margin-top: 20px;
    font-size: 13px;
    color: #555;
  }
  .footer {
    margin-top: 25px;
    font-size: 12px;
    color: #999;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<div class="login-container">
  <h2><i class="fa-solid fa-graduation-cap"></i> Login Sistem</h2>
  <form action="sistem.php" method="post">
    <div class="input-box">
      <input type="text" name="username" placeholder="Masukkan Username" required>
      <i class="fa fa-user"></i>
    </div>
    <div class="input-box">
      <input type="password" name="password" placeholder="Masukkan Password" required>
      <i class="fa fa-lock"></i>
    </div>
    <button type="submit">Masuk</button>
  </form>

  <div class="info">
    <p>Gunakan akun contoh:</p>
    <p><b>superadmin</b> / <b>rahasia</b></p>
  </div>

  <div class="footer">
    <p>&copy; <?= date('Y'); ?> Sistem Akademik | Praktikum PBD</p>
  </div>
</div>

</body>
</html>
