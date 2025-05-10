<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="images/parking.jpeg" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .fade-in {
      animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }
    .slide-up {
      animation: slideUp 0.8s ease-out;
    }
    @keyframes slideUp {
      0% { transform: translateY(50px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }
    .image-overlay {
      background-image: url('images/parking.jpeg');
      background-size: cover;
      background-position: center;
      filter: brightness(75%);
    }
  </style>
</head>
<body class="min-h-screen flex bg-gray-100 text-gray-800">

  <!-- Kiri (Gambar) -->
  <div class="w-1/2 relative hidden lg:flex fade-in image-overlay">
    <div class="absolute inset-0 bg-black bg-opacity-25"></div>
  </div>

  <!-- Kanan (Form Login) -->
  <div class="w-full lg:w-1/2 flex items-center justify-center">
    <div class="w-full max-w-md px-6 py-10 bg-white shadow-md rounded-lg fade-in slide-up">
      <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Login Parkir Kampus</h2>

  <?php
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include_once 'includes/config.php';
  $username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string($_POST['password']);

  $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;

      // ✅ Redirect ke index.php
      header("Location: /modul_parkir/kelompok_parkir/index.php");

      exit;
  } else {
      $error = "<div class='bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4' role='alert'>
                  <p>Username atau password salah!</p>
                </div>";
  }
  $conn->close();
}
?>

<?php echo $error; ?>


      <form method="POST" class="space-y-5">
        <div>
          <label class="text-sm font-medium text-gray-700 block mb-1 uppercase">Username</label>
          <input type="text" name="username" required 
                 class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 transition">
        </div>
        <div>
          <label class="text-sm font-medium text-gray-700 block mb-1 uppercase">Password</label>
          <input type="password" name="password" required 
                 class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 transition">
        </div>
        <button type="submit" class="w-full bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600 transition font-semibold">
          Login
        </button>

        <div class="flex justify-between items-center text-sm mt-2">
          <label class="flex items-center">
            <input type="checkbox" class="mr-2"> <span class="text-gray-700">Ingat Saya</span>
          </label>
          <a href="404.php" class="text-gray-500 hover:text-yellow-600 transition flex items-center">
            Lupa Password?
          </a>
        </div>

        <p class="text-sm mt-6 text-center text-gray-600">
          Belum punya akun?
          <a href="register.php" class="text-yellow-600 font-semibold hover:underline">Daftar Sekarang!</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>