<?php 

$koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");

?>

<div class="panel panel-default">  

<div class="panel-body">
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nis</label>
                    <input class="form-control" name="nis" />
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control" name="nama" />
                </div>
                <div class="form-group">
                    <label>kelas</label>
                    <input class="form-control" name="kelas" type="number"/>
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
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = $koneksi->query("INSERT INTO tb_anggota (nis, nama,  kelas)
        VALUES ('$nis', '$nama', '$kelas')");

    if ($sql) {
        echo "<script>
            alert('Data berhasil disimpan');
            window.location.href='?page=anggota';
        </script>";
    } 
}
?>
