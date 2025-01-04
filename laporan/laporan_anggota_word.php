<?php 
$koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");

// Set filename untuk file Word
$filename = "Data_anggota_word-(" . date('d-m-Y') . ").doc";

// Set header untuk mengunduh file Word
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");

// Pastikan tidak ada output sebelum header
?>

<h2>Laporan Anggota</h2>

<table border="1" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nis</th>
        <th>Tempat lahir</th>
        <th>Tanggal lahir</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
    </tr>

    <?php 
    $no = 1;
    $sql = $koneksi->query("SELECT * FROM tb_anggota");

    while ($data = $sql->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data["nama"]; ?></td>
            <td><?php echo $data["nis"]; ?></td>
            <td><?php echo $data["tempat_lahir"]; ?></td>
            <td><?php echo $data["tanggal_lahir"]; ?></td>
            <td><?php echo $data["jk"]; ?></td>
            <td><?php echo $data["kelas"]; ?></td>
        </tr>
    <?php 
    }
    ?>
</table>
