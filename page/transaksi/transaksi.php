<a href="?page=transaksi&aksi=tambah" class="btn btn-info">Tambah Transaksi</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                 Data anggota
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>judul</th>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Tanggal pinjam</th>
                                <th>Tanggal kembali</th>
                                <th>terlambat</th>
                                <th>status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM tb_transaksi where status='pinjam'");

                            while ($data = $sql->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data["judul"]; ?></td>
                                <td><?php echo $data["nis"]; ?></td>
                                <td><?php echo $data["nama"]; ?></td>
                                <td><?php echo $data["tanggal_pinjam"]; ?></td>
                                <td><?php echo $data["tanggal_kembali"]; ?></td>
                                <td>
    <?php
$denda = 1000;

$tanggal_deadline = $data['tanggal_kembali']; 
$tanggal_kembali = date('y-m-d'); 

$lambat = terlambat($tanggal_deadline, $tanggal_kembali);
$denda1 = $lambat * $denda;

if ($lambat > 0) {
    echo "<span style='color: red;'>$lambat hari <br>(Rp $denda1)</span>";
} else {
    echo $lambat;
}
?>

                                </td>
                                <td><?php echo $data["status"]; ?></td>
                                <td>
                                <a href="?page=transaksi&aksi=kembali&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul'];?>" class="btn btn-warning">kembali</a>

                                <a href="?page=transaksi&aksi=perpanjang&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul']; ?>&lambat=<?php echo $lambat; ?>&tanggal_kembali=<?php echo $data['tanggal_kembali']; ?>" class="btn btn-danger">Perpanjang</a>

                                </td>
                            </tr>
                        <?php 
                            }
                        ?>
                        </tbody>
                    </table>
                </div> 
            </div>    
        </div>
    </div>
</div>
