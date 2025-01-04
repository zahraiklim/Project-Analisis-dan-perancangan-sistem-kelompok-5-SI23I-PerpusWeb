<?php

$get1 = mysqli_query($koneksi,"select * from tb_anggota");
$count1 = mysqli_num_rows($get1);

$get2 = mysqli_query($koneksi,"select * from tb_buku");
$count2 = mysqli_num_rows($get2);

$get3 = mysqli_query($koneksi,"select * from tb_transaksi where status='pinjam'");
$count3 = mysqli_num_rows($get3);

$get4 = mysqli_query($koneksi,"select * from tb_pengguna");
$count4 = mysqli_num_rows($get4);

?>
 
 
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>

    <style>
        /* Gaya umum untuk halaman */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        #page-inner {
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px; /* Jarak antar elemen */
        }

        .card {
            width: 200px;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #007bff; /* Warna default */
            border-radius: 10px;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s, background-color 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .card h1 {
            font-size: 20px;
            margin: 0;
        }

        .card span {
            font-size: 30px;
            font-weight: bold;
        }

        /* Warna yang berbeda untuk setiap kartu */
        .card:nth-child(1) {
            background-color: #ff6f61; /* Merah */
        }

        .card:nth-child(2) {
            background-color: #4caf50; /* Hijau */
        }

        .card:nth-child(3) {
            background-color: #2196f3; /* Biru */
        }

        .card:nth-child(4) {
            background-color: #ff9800; /* Oranye */
        }

        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    
</head>
<body>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Dashboard</h2>
            </div>
        </div>

        <div class="row">
            <div class="card">
            
                <h1>Jumlah Admin</h1>
                <span><?= $count4; ?></span>
            </div>
            <div class="card">
                <h1><a href="index.php?page=anggota">Jumlah Anggota</h1>
                <span><?= $count1; ?></span>
            </div>
            <div class="card">
                <h1><a href="index.php?page=buku">Jumlah Buku</h1>
                <span><?= $count2; ?></span>
            </div>
            <div class="card">
                <h1><a href="index.php?page=transaksi">Jumlah Buku Dipinjam</h1>
                <span><?= $count3; ?></span>
            </div>
        </div>
    </div>
</body>
</html>

             
                        
		