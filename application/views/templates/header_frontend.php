<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIPRESMA UNDIKSHA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- DataTables -->
    <!-- Theme style -->
    <!-- Favicons -->
    <link href="<?= base_url(); ?>/assets2/img/Undiksha.png" rel="icon">
    <link href="<?= base_url(); ?>/assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>/assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets2/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets2/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets2/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets2/vendor/aos/aos.css" rel="stylesheet">
    <script src="<?= base_url(); ?>/assets2/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets2/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>/assets2/vendor/jquery-sticky/jquery.sticky.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.bootstrap4.min.css">


    <script src="<?= base_url(); ?>/assets2/vendor/waypoints/jquery.waypoints.min.js"></script>


    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>/assets2/css/style.css" rel="stylesheet">


    <!-- =======================================================
  * Template Name: Mamba - v3.0.3
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-none d-lg-block">
        <div class="container d-flex">
            <div class="contact-info me-auto">
                <i class="icofont-envelope"></i><a href="mailto:contact@example.com">humas@undiksha.ac.id</a>
                <i class="icofont-phone"></i> +0362 22570
            </div>
            <div class="social-links float-right">
                <a href="https://twitter.com/undiksha" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="https://www.facebook.com/undiksha.bali/" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/undiksha.bali/" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="https://www.youtube.com/universitaspendidikanganesha" class="youtube"><i class="icofont-youtube"></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container d-flex">
            <div class="logo me-auto">
                <h1 class="text-light"><img src="<?= base_url(); ?>assets2/img/undiksha.png" alt="JSOFT">
                    <a><span>SIPRESMA</span></a>
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu float-right d-none d-lg-block">
                <ul>
                    <h1>
                        <li class=""><a href="<?= site_url('Auth') ?>">LOGIN</a></li>
                    </h1>
                </ul>

            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url('<?= base_url(); ?>/assets2/img/FTK.jpg');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animate__animated animate__fadeInDown">Selamat Datang</h2>
                                <h2 class="animate__animated animate__fadeInDown">SIPRESMA <span> Universitas Pendidikan Ganesha</span></h2>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url('<?= base_url(); ?>/assets2/img/FTK.jpg');">
                        <div class="carousel-container">
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background-image: url('<?= base_url(); ?>/assets2/img/FTK.jpg');">
                        <div class="carousel-container">
                            <div class="carousel-content container">

                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">