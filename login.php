<?php
$koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");
session_start(); // Letakkan session_start di awal



if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $koneksi->prepare("SELECT * FROM tb_pengguna WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = $result->fetch_assoc();
    $ketemu = $result->num_rows;

    if ($ketemu >= 1) {
        if ($data['level'] == "admin") {
            $_SESSION['admin'] = $data['id'];
            header("location:index.php");
            exit;
        } else if ($data['level'] == "user") {
            $_SESSION['user'] = $data['id'];
            header("location:index.php");
            exit;
        }
    } else {
        echo "<script type='text/javascript'>alert('Username atau Password salah');</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Perpustakaan</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Open Sans', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: white;
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h2 {
            font-weight: bold;
            color: #007bff;
        }
        .login-header .icon {
            font-size: 50px;
            color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <div class="icon">
            📚
        </div>
        <h2>Login Perpustakaan</h2>
        <p class="text-muted">Selamat datang, silakan login</p>
    </div>
    <form method="POST">
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" required>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input type="password" id="password" name="pass" class="form-control" placeholder="Masukkan Password" required>
            </div>
        </div>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>
</div>

<!-- BOOTSTRAP SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
