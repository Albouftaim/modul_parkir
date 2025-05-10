<?php
session_start();
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'root', '', 'kelompok_parkir');

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

    // Cek apakah username sudah ada
    $check = $conn->query("SELECT * FROM user WHERE username = '$username'");
    if ($check->num_rows > 0) {
        $error = "Username sudah digunakan. Silakan pilih yang lain.";
    } else {
        $insert = $conn->query("INSERT INTO user (username, password) VALUES ('$username', '$password')");
        if ($insert) {
            $success = "Registrasi berhasil! Mengarahkan ke halaman login...";
            header("Refresh: 2; url=login.php");
        } else {
            $error = "Terjadi kesalahan saat menyimpan data.";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="images/motor.jpeg" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
  <style>
    body { font-family: 'Poppins', sans-serif; }
    .fade-in { animation: fadeIn 1s ease-in-out; }
    @keyframes fadeIn { 0% { opacity: 0; } 100% { opacity: 1; } }
    .slide-up { animation: slideUp 0.8s ease-out; }
    @keyframes slideUp { 0% { transform: translateY(50px); opacity: 0; } 100% { transform: translateY(0); opacity: 1; } }
    .image-overlay {
      background-image: url('images/motor.jpeg');
      background-size: cover;
      background-position: center;
      filter: brightness(75%);
    }
  </style>
</head>
<body class="min-h-screen flex bg-gray-100 text-gray-800">

  <!-- Kiri (Gambar) -->
  <div class="w-1/2 relative hidden lg:flex fade-in image-overlay">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
  </div>

  <!-- Kanan (Form Register) -->
  <div class="w-full lg:w-1/2 flex items-center justify-center">
    <div class="w-full max-w-md px-6 py-10 bg-white shadow-md rounded-lg fade-in slide-up">
      <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Sign Up</h2>

      <?php if ($error): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= $error ?></div>
      <?php elseif ($success): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?= $success ?></div>
      <?php endif; ?>

      <form action="register.php" method="POST" class="space-y-5">
        <div>
          <label class="text-sm font-medium text-gray-700 block mb-1 uppercase">Username</label>
          <input type="text" name="username" required class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 transition">
        </div>
        <div>
          <label class="text-sm font-medium text-gray-700 block mb-1 uppercase">Password</label>
          <input type="password" name="password" required class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 transition">
        </div>
        <button type="submit" class="w-full bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600 transition font-semibold">Register</button>

        <p class="text-sm mt-6 text-center text-gray-600">
          Sudah punya akun? 
          <a href="login.php" class="text-yellow-600 font-semibold hover:underline">Login</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>
