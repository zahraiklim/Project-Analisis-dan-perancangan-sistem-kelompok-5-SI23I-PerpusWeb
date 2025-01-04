<?php
session_start();

$koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");

include "function.php";

// Cek apakah sesi pengguna sudah dibuat
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perpustakan</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <!-- TOP NAV -->
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >Perpustakaan</a>
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
               
                <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>
        <!-- SIDE NAV -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-laptop fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="?page=anggota"><i class="fa fa-user fa-3x"></i> Data Anggota</a>
                    </li>
                    <li>
                        <a href="?page=buku"><i class="fa fa-book fa-3x"></i> Data Buku</a>
                    </li>
                    <li>
                        <a href="?page=transaksi"><i class="fa fa-edit fa-3x"></i> Transaksi</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <!-- CONTENT -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <!-- PHP Logic -->
                        <?php
                        // Ambil nilai 'page' dan 'aksi' dari query string
                        $page = isset($_GET['page']) ? $_GET['page'] : '';
                        $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

                       

                        // Routing halaman berdasarkan nilai 'page' dan 'aksi'
                        if ($page == "buku") {
                            if ($aksi == "") {
                                // Tampilkan halaman utama buku
                                include "page/buku/buku.php";
                            } elseif ($aksi == "tambah") {
                                // Tampilkan halaman tambah buku
                                include "page/buku/tambah.php";
                            } elseif ($aksi == "ubah") {
                                // Tampilkan halaman ubah buku
                                include "page/buku/ubah.php";
                            } elseif ($aksi == "hapus") {
                                // Tampilkan halaman hapus buku
                                include "page/buku/hapus.php";
                            }
                        } elseif ($page == "anggota") {
                            if ($aksi == "") {
                                // Tampilkan halaman utama anggota
                                include "page/anggota/anggota.php";
                            } elseif ($aksi == "tambah") {
                                // Tampilkan halaman tambah anggota
                                include "page/anggota/tambah.php";
                            } elseif ($aksi == "ubah") {
                                // Tampilkan halaman ubah anggota
                                include "page/anggota/ubah.php";
                            } elseif ($aksi == "hapus") {
                                // Tampilkan halaman hapus anggota
                                include "page/anggota/hapus.php";
                            } else {
                                echo "<h1>Aksi pada halaman anggota tidak valid!</h1>";
                            }
                        } elseif ($page == "transaksi") {
                            if ($aksi == "") {
                                // Tampilkan halaman utama transaksi
                                include "page/transaksi/transaksi.php";
                            } elseif ($aksi == "tambah") {
                                // Tampilkan halaman tambah transaksi
                                include "page/transaksi/tambah.php";
                            } elseif ($aksi == "kembali") {
                                // Tampilkan halaman hapus transaksi
                                include "page/transaksi/kembali.php";
                            }   elseif ($aksi == "perpanjang") {
                                // Tampilkan halaman hapus transaksi
                                include "page/transaksi/perpanjang.php";
                            }  
                        
                        }
                        else {
                                include"home.php";
                        } 
                        
                        
                        ?>
                    </div>
                </div>

                <hr />
            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <script src="assets/js/custom.js"></script>
</body>
</html>


