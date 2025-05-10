<?php
session_start();
session_destroy();
header("Location:login.php"); // atau "Location: login.php" jika satu folder
exit;
