<?php 

$id = $_GET['id'];

// Ambil data dari database berdasarkan ID
$sql = $koneksi->query("SELECT * FROM tb_buku WHERE id='$id'");
$tampil = $sql->fetch_assoc();

?>

<div class="panel panel-default">  

<div class="panel-body">
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Judul</label>
                    <input class="form-control" name="judul" value="<?php echo $tampil['judul'];?>" />
                </div>
                <div class="form-group">
                    <label>Pengarang</label>
                    <input class="form-control" name="pengarang" value="<?php echo $tampil['pengarang'];?>" />
                </div>
                <div class="form-group">
                    <label>Penerbit</label> 
                    <input class="form-control" name="penerbit" value="<?php echo $tampil['penerbit'];?>" />
                </div>
                <div class="form-group">
                    <label>Tahun Terbit</label>
                    <select class="form-control" name="tahun">
                        <?php 
                            $currentYear = date("Y");
                            for ($i = $currentYear - 30; $i <= $currentYear; $i++) {
                                if ($tampil['tahun_terbit'] == $i) {
                                    echo "<option value='$i' selected>$i</option>";
                                } else {
                                    echo "<option value='$i'>$i</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>ISBN</label>
                    <input class="form-control" name="isbn" value="<?php echo $tampil['isbn'];?>" />
                </div>
                <div class="form-group">
                    <label>Jumlah Buku</label>
                    <input class="form-control" name="jumlah" value="<?php echo $tampil['jumlah_buku'];?>" />
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
// Proses update data
if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $isbn = $_POST['isbn'];
    $jumlah = $_POST['jumlah'];
    

    $sql = $koneksi->query("UPDATE tb_buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', 
        tahun_terbit = '$tahun', isbn = '$isbn', jumlah_buku = '$jumlah'
        WHERE id = '$id'");

    if ($sql) {
        echo "<script>
            alert('Data berhasil diubah');
            window.location.href='?page=buku';
        </script>";
    } 
}
?>
