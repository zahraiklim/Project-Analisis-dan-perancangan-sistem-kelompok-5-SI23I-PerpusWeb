<?php
$nis = $_GET['id'];

// Ambil data dari database
$sql = $koneksi->query("SELECT * FROM tb_anggota WHERE nis = '$nis'");
$tampil = $sql->fetch_assoc();

$jkl = $tampil['jk'];
?>

<div class="panel panel-default">
    <div class="panel-body">
        <form method="POST" action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>NIS</label>
                        <input class="form-control" name="nis" type="text" value="<?php echo $tampil['nis']; ?>"  />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" value="<?php echo $tampil['nama']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input class="form-control" name="kelas" type="number" value="<?php echo $tampil['kelas']; ?>" />
                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = $koneksi->query("UPDATE tb_anggota 
        SET  nama='$nama',  kelas='$kelas' 
        WHERE nis='$nis'");

    if ($sql) {
        echo "<script>
            alert('Data berhasil disimpan');
            window.location.href='?page=anggota';
        </script>";
    } 
}
?>
