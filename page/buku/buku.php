<a href="?page=buku&aksi=tambah" class="btn btn-info"  style="margin-top:20px;" >Tambah buku</a>

<a href="./laporan/laporan_buku_excel.php" class="btn btn-success" style="margin-top:20px; margin-left:600px">Ekspor Ke excel</a>

<a href="./laporan/laporan_buku_word.php" class="btn btn-primary" style="margin-top:20px; ">Ekspor Ke word</a>


<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID_Buku</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>isbn</th>
                                            <th>Jumlah Buku</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 

                                            $no =1;
                                    
                                            $sql = $koneksi->query("select*from tb_buku");

                                            while($data=$sql->fetch_assoc()) {

                                    ?>
                                        <tr>
                                        <td><?php echo $no++?></td>
                                            <td><?php echo $data["id"];?></td>
                                            <td><?php echo $data["judul"];?></td>
                                            <td><?php echo $data["pengarang"];?></td>
                                            <td><?php echo $data["penerbit"];?></td>
                                            <td><?php echo $data["isbn"];?></td>
                                            <td><?php echo $data["jumlah_buku"];?></td>
                                            <td>
                                                <a href="?page=buku&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-warning">Ubah</a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data ini??????')" href="?page=buku&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger">hapus</a>
                                            </td>
                                        </tr>

                                        <?php 
                                            }
                                        ?>
                                    </tbody>

                                        </div> 
                                 </div>    
                        </div>
                </di>
        </div>