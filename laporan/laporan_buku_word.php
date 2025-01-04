<?php 
$koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");

// Set filename untuk file Excel
$filename = "Data_Buku_word-(" . date('d-m-Y') . ").doc";

// Set header untuk mengunduh file Excel
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-word");

// Pastikan tidak ada output sebelum header
?>

<h2>Laporan buku</h2>

<table border="1">
<tr>
        <th>No</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>isbn</th>
        <th>Jumlah Buku</th>
         
</tr>

<?php 

$no =1;

$sql = $koneksi->query("select*from tb_buku");

while($data=$sql->fetch_assoc()) {

?>
<tr>
<td><?php echo $no++?></td>
<td><?php echo $data["judul"];?></td>
<td><?php echo $data["pengarang"];?></td>
<td><?php echo $data["penerbit"];?></td>
<td><?php echo $data["isbn"];?></td>
<td><?php echo $data["jumlah_buku"];?></td>

</tr>

<?php 
}
?>
</table>