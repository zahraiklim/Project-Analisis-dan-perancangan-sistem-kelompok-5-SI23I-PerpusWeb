<?php
function terlambat($tanggal_deadline, $tanggal_kembali) {
    // Konversi tanggal menjadi timestamp
    $tanggal_dateline_timestamp = strtotime($tanggal_deadline);
    $tanggal_kembali_timestamp = strtotime($tanggal_kembali);

    // Hitung selisih dalam detik, kemudian ubah ke hari
    $selisih = ($tanggal_kembali_timestamp - $tanggal_dateline_timestamp) / 86400;

    // Jika selisih lebih besar atau sama dengan 1 hari
    if ($selisih >=1) {
        return floor($selisih); // Kembalikan jumlah hari keterlambatan
    } else {
        return 0; // Tidak ada keterlambatan
    }
}
?>
