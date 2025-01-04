<?php


    $id = $_GET['id'];
    $judul = $_GET['judul'];

    $sql = $koneksi->query("update tb_transaksi set status='kembali' where id='$id'");

    $sql = $koneksi->query("update tb_buku set jumlah_buku = (jumlah_buku+1) where judul='$judul' ");

?>

        <script stype="text/javascript" >
        alert("Buku berhasil dikembalikan");
         window.location.href="?page=transaksi";
        </script>
       

    <?php

    ?>