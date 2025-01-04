<?php 

$koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");


$tanggal_pinjam = date('d-m-Y');
$tujuh_hari = mktime(0,0,0, date("n"),date("j")+7, date("Y"));
$kembali = date("d-m-Y", $tujuh_hari);

?>

<div class="panel panel-default">  

<div class="panel-body">
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                    <label>Judul</label>
                    <select class="form-control" name="buku">
                        <?php 
                            $sql = $koneksi->query("select*from tb_buku order by id");

                            while($data=$sql->fetch_assoc()) {
                                echo"<option value='$data[id].$data[judul]'>$data[judul]</option>";
                            }
                        ?>
                    </select>
                </div>
                <label>Nama</label>
                    <select class="form-control" name="nama">
                        <?php 
                            $sql = $koneksi->query("select*from tb_anggota order by nis");

                            while($data=$sql->fetch_assoc()) {
                                echo"<option value='$data[nis].$data[nama]'>$data[nama]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal pinjam</label>
                    <input class="form-control" name="tanggal_pinjam" id="tanggal" type="text" value="<?php echo $tanggal_pinjam; ?>" readonly/>
                </div>
                <div class="form-group">
                    <label>Tanggal kembali</label>
                    <input class="form-control" name="tanggal_kembali" id="tanggal" type="text" value="<?php echo $kembali; ?>" readonly/>
                    </div>
                </div>
                
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                   
                </div>
            </div>
        </div>
    </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $buku = $_POST['buku'];
    $pecah_buku = explode(".", $buku);
    $id_buku = $pecah_buku[0];
    $judul = $pecah_buku[1];

    $nama = $_POST['nama'];
    $pecah_nama = explode(".", $nama);
    $nis = $pecah_nama[0];
    $nama = $pecah_nama[1];

    // Periksa stok buku
    $sql = $koneksi->query("SELECT * FROM tb_buku WHERE judul = '$judul'");
    $data = $sql->fetch_assoc();
    $sisa = $data['jumlah_buku'];

    if ($sisa == 0) {
        echo '<script>
            alert("Stok buku habis!");
            window.location.href="?page=transaksi&aksi=tambah";
        </script>';
        exit();
    }

    // Kurangi stok buku
    $koneksi->query("UPDATE tb_buku SET jumlah_buku = jumlah_buku - 1 WHERE id = '$id_buku'");

    // Tambahkan transaksi baru
    $insert = $koneksi->query("INSERT INTO tb_transaksi (nis, nama, judul, tanggal_pinjam, tanggal_kembali, status) 
        VALUES ('$nis', '$nama', '$judul', '$tanggal_pinjam', '$tanggal_kembali', 'pinjam')");

    if ($insert) {
        echo '<script>
            alert("Transaksi berhasil disimpan!");
            window.location.href="?page=transaksi";
        </script>';
    } else {
        echo '<script>
            alert("Gagal menyimpan transaksi!");
            window.location.href="?page=transaksi&aksi=tambah";
        </script>';
    }
}
?>

