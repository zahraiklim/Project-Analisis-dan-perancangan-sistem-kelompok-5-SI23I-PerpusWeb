
<a href="?page=anggota&aksi=tambah" class="btn btn-info" class="fa fa-plus" style="margin-top:20px;">Tambah anggota</a>

<a href="./laporan/laporan_anggota_excel.php" class="btn btn-success" style="margin-top:20px; margin-left:600px">Ekspor Ke excel</a>

<a href="./laporan/laporan_anggota_word.php" class="btn btn-primary" style="margin-top:20px; ">Ekspor Ke word</a>

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
                                <th>Nama</th>
                                <th>Nis</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM tb_anggota");

                            while ($data = $sql->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data["nama"]; ?></td>
                                <td><?php echo $data["nis"]; ?></td>
                                <td><?php echo $data["kelas"]; ?></td>
                                <td>
                                <a href="?page=anggota&aksi=ubah&id=<?php echo $data['nis']; ?>" class="btn btn-warning">Ubah</a>
                                <a onclick="return confirm('Anda yakin ingin menghapus data ini??????')" href="?page=anggota&aksi=hapus&id=<?php echo $data['nis']; ?>" class="btn btn-danger">hapus</a>
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
