<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="images/parking.jpeg" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Sistem Parkir Kampus" />
        <meta name="author" content="" />
        <title>Parkir Kampus</title>
        <!-- Favicon-->
        <link rel="shortcut icon" href="assets/img/logo.jpeg" type="image/x-icon" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
        <style>
            /* Custom Styles */
            #mainNav {
                background-color: white !important;
                transition: background-color 0.3s ease-in-out;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
        
            #mainNav .nav-link {
                color: #000 !important;
                font-weight: 500;
                padding: 0.5rem 1rem;
            }
        
            #mainNav .nav-link:hover {
                color: #0d6efd !important;
            }

            .masthead {
    background-image: url('assets/img/parkirarea.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    min-height: 500px;
    position: relative;
    display: flex;
    align-items: center;
}

.masthead::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* shadow hitam 50% transparan */
    z-index: 1;
}


            .masthead .container {
                position: relative;
                z-index: 2;
                color: white;
            }

            .divider {
                height: 3px;
                background-color: white;
                width: 100px;
                margin: 1.5rem auto;
            }

            .payment-icon {
                width: 64px;
                height: 64px;
                object-fit: contain;
                border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                background-color: white;
                padding: 8px;
                margin-bottom: 1rem;
            }

            .portfolio-box img {
                width: 100%;
                height: 250px; 
                object-fit: cover; 
            }

            .footer-link {
                color: #212529;
                text-decoration: none;
                transition: color 0.3s;
            }

            .footer-link:hover {
                color: #0d6efd;
            }

            .social-icon {
                color: #0d6efd;
                transition: transform 0.3s, color 0.3s;
                margin: 0 10px;
                font-size: 1.5rem;
            }

            .social-icon:hover {
                color: #709bdc;
                transform: scale(1.2);
            }

            section {
                padding: 5rem 0;
            }

            #about {
                background-color: #1e40af;
                color: white;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">
                    <img src="assets/img/parkir1.jpg" alt="Logo" style="height: 50px; width: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Transaksi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Area Parkir</a></li>
                        <li class="nav-item"><a class="nav-link" href="#footer">Kontak</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Header-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Area Parking Kampus</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white mb-5">"Hidup itu seperti mencari parkir—kadang kita harus bersabar dan berputar dulu sebelum menemukan tempat yang tepat."</p>
                        <a class="btn btn-primary btn-xl" href="#about">Ayoo Parkir!</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- About-->
        <section class="page-section" id="about" style="background-color: #0f172a;">
  <div class="container py-5">
    <h2 class="text-center text-white mb-5">Tentang Sistem</h2>
    <div class="row">
      <!-- Kolom Tentang -->
      <div class="col-md-4 mb-4">
        <div class="p-4 bg-white bg-opacity-10 rounded text-white h-100">
          <h4 class="mb-3">Tentang</h4>
          <p>
            <strong>Parkir Kampus</strong> menyediakan semua yang Anda perlukan untuk mengelola parkir motor dan mobil secara efisien dan mudah! Gunakan sistem kami yang gratis, mudah digunakan, dan siap pakai! Tanpa biaya tersembunyi!
          </p>
        </div>
      </div>

      <!-- Kolom Visi -->
      <div class="col-md-4 mb-4">
        <div class="p-4 bg-white bg-opacity-10 rounded text-white h-100">
          <h4 class="mb-3">Visi</h4>
          <p>
            Menjadi sistem parkir digital terbaik untuk lingkungan kampus yang aman, tertib, dan efisien.
          </p>
        </div>
      </div>

      <!-- Kolom Misi -->
      <div class="col-md-4 mb-4">
        <div class="p-4 bg-white bg-opacity-10 rounded text-white h-100">
          <h4 class="mb-3">Misi</h4>
          <ul class="mb-0">
            <li>Menyediakan sistem parkir yang praktis dan dapat diakses oleh seluruh civitas kampus.</li>
            <li>Meningkatkan keamanan kendaraan melalui pencatatan digital.</li>
            <li>Mendukung pengelolaan parkir yang transparan dan tanpa biaya tersembunyi.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mb-5">Transaksi</h2>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <img src="assets/img/flazz.png" alt="Flazz" class="payment-icon">
                            <h3 class="h4 mb-2">Flazz</h3>
                            <p class="text-muted">Pembayaran mudah dengan kartu Flazz.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <img src="assets/img/emoney.png" alt="e-Money" class="payment-icon">
                            <h3 class="h4 mb-2">e-Money</h3>
                            <p class="text-muted">Transaksi cepat dengan e-Money.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <img src="assets/img/dana.png" alt="DANA" class="payment-icon">
                            <h3 class="h4 mb-2">DANA</h3>
                            <p class="text-muted">Gunakan DANA untuk kemudahan digital payment.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <img src="assets/img/gopay.png" alt="GoPay" class="payment-icon">
                            <h3 class="h4 mb-2">GoPay</h3>
                            <p class="text-muted">Bayar praktis dengan dompet digital GoPay.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio-->
        <div id="portfolio" class="page-section">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/12.jpg" title="Parkir Mobil">
                            <img class="img-fluid" src="assets/img/12.jpg" alt="Parkir Mobil">
                            <div class="portfolio-box-caption">
                                <div class="project-name">Parkir Mobil</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/10.jpg" title="Parkir Mobil">
                            <img class="img-fluid" src="assets/img/10.jpg" alt="Parkir Mobil">
                            <div class="portfolio-box-caption">
                                <div class="project-name">Parkir Mobil</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/11.jpg" title="Parkir Mobil">
                            <img class="img-fluid" src="assets/img/11.jpg" alt="Parkir Mobil">
                            <div class="portfolio-box-caption">
                                <div class="project-name">Parkir Mobil</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/moge.webp" title="Parkir Motor">
                            <img class="img-fluid" src="assets/img/moge.webp" alt="Parkir Motor">
                            <div class="portfolio-box-caption">
                                <div class="project-name">Parkir Motor</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/moge1.jpg" title="Parkir Motor">
                            <img class="img-fluid" src="assets/img/moge1.jpg" alt="Parkir Motor">
                            <div class="portfolio-box-caption">
                                <div class="project-name">Parkir Motor</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/moge2.jpg" title="Parkir Motor">
                            <img class="img-fluid" src="assets/img/moge2.jpg" alt="Parkir Motor">
                            <div class="portfolio-box-caption">
                                <div class="project-name">Parkir Motor</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer id="footer" class="bg-light py-5">
            <div class="container">
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-lg-4 mb-4">
                        <h5 class="mb-3">Parkir Kampus</h5>
                        <p>Kelola area parkir Anda dengan lebih mudah dan efisien bersama sistem ParkirKampus. Gratis dan tanpa biaya tersembunyi!</p>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5 class="mb-3">Navigasi</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#about" class="footer-link">Tentang</a></li>
                            <li class="mb-2"><a href="#services" class="footer-link">Transaksi</a></li>
                            <li class="mb-2"><a href="#portfolio" class="footer-link">Area Parkir</a></li>
                            <li class="mb-2"><a href="#footer" class="footer-link">Kontak</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <h5 class="mb-3">Kontak</h5>
                        <p><i class="bi bi-geo-alt-fill me-2"></i> Jl. Parkir No. 123, Jakarta</p>
                        <p><i class="bi bi-envelope-fill me-2"></i> info@ParkirKampus.com</p>
                        <p><i class="bi bi-phone-fill me-2"></i> +62 812 3456 7890</p>
                    </div>

                    <!-- Social Media -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5 class="mb-3">Media Sosial</h5>
                        <div class="d-flex">
                            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="text-center">
                    <p class="mb-0 text-muted">&copy; 2025 ParkirKampus. All Rights Reserved.</p>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>