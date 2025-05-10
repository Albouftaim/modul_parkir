<?php
$activeUrl = $_GET['url'] ?? ''; // Get the current URL parameter
session_start(); // pastikan session dimulai
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../assets/img/logo.jpeg" alt="Parkir Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Parkir Kampus</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                $username = $_SESSION['username'] ?? 'guest';
                $uploadPath = 'uploads/' . $username . '.jpg';
                $defaultPic = 'dist/uploads/sayyid.jpg'; // Ganti dengan path gambar default Anda
                $userProfilePic = file_exists($uploadPath) ? $uploadPath : $defaultPic;
                ?>
                <img src="<?php echo $userProfilePic; ?>" class="img-circle elevation-2" alt="User Image" style="width: 45px; height: 45px; object-fit: cover;">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php echo htmlspecialchars($username); ?>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- List Menu -->
                <li class="nav-header">LIST DATA</li>
                <li class="nav-item">
                    <a href="./?url=kampus" class="nav-link <?php echo $activeUrl === 'kampus' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-university"></i>
                        <p>Kampus</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=areaparkir" class="nav-link <?php echo $activeUrl === 'areaparkir' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-parking"></i>
                        <p>Area Parkir</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=kendaraan" class="nav-link <?php echo $activeUrl === 'kendaraan' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-car"></i>
                        <p>Kendaraan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=jenis" class="nav-link <?php echo $activeUrl === 'jenis' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Jenis</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=transaksi" class="nav-link <?php echo $activeUrl === 'transaksi' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Transaksi</p>
                    </a>
                </li>

                <li class="nav-header">LAINNYA</li>
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
