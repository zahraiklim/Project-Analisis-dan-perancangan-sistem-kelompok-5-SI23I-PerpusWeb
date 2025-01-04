<?php 

$koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");

?>

<div class="panel panel-default">  

<div class="panel-body">
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-12">
                </div>
                <div class="form-group">
                    <label>Judul</label>
                    <input class="form-control" name="judul" />
                </div>
                <div class="form-group">
                    <label>Pengarang</label>
                    <input class="form-control" name="pengarang" />
                </div>
                <div class="form-group">
                    <label>Penerbit</label>
                    <input class="form-control" name="penerbit" />
                </div>
                <div class="form-group">
                    <label>Tahun Terbit</label>
                    <select class="form-control" name="tahun">
                        <?php 
                            $tahun = date("Y");
                            for ($i = $tahun - 30; $i <= $tahun; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>ISBN</label>
                    <input class="form-control" name="isbn" />
                </div>
                <div class="form-group">
                    <label>Jumlah Buku</label>
                    <input class="form-control" name="jumlah" />
                </div>
                <div class="form-group">
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
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $isbn = $_POST['isbn'];
    $jumlah = $_POST['jumlah'];
    

    $sql = $koneksi->query("INSERT INTO tb_buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku)
        VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', '$isbn', '$jumlah')");

    if ($sql) {
        echo "<script>
            alert('Data berhasil disimpan');
            window.location.href='?page=buku';
        </script>";
    } 
}
?>
