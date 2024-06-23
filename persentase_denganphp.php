<?php
// Jumlah surat dalam proses dan selesai
// Saya memiliki data surat yang sedang dalam proses sebanyak 150 dan data surat yang sudah diarsipkan ada 65
// saya ingin menghitungnya dalam bentuk persentase
$jumlah_proses = 150;
$jumlah_selesai = 65;

// Total surat
$total_surat = $jumlah_proses + $jumlah_selesai;

// Persentase surat dalam proses
$persentase_proses = ($jumlah_proses / $total_surat) * 100;

// Persentase surat selesai dan diarsipkan
$persentase_selesai = ($jumlah_selesai / $total_surat) * 100;

// Tampilkan hasil
echo "Persentase surat dalam proses: " . round($persentase_proses, 2) . "%<br>";
echo "Persentase surat selesai dan diarsipkan: " . round($persentase_selesai, 2) . "%";

// Variabel $jumlah_proses menyimpan jumlah surat yang dalam proses (150 surat).
// Variabel $jumlah_selesai menyimpan jumlah surat yang sudah selesai dan diarsipkan (65 surat).
// Variabel $total_surat menghitung total surat (jumlah proses + jumlah selesai).
// Variabel $persentase_proses menghitung persentase surat dalam proses dengan formula (jumlah proses / total surat) * 100.
// Variabel $persentase_selesai menghitung persentase surat yang selesai dan diarsipkan dengan formula (jumlah selesai / total surat) * 100.
// Fungsi round() digunakan untuk membulatkan hasil ke dua tempat desimal.
// Hasil ditampilkan menggunakan echo.


// Kode ini akan menghasilkan output seperti:
// Persentase surat dalam proses: 69.77%
// Persentase surat selesai dan diarsipkan: 30.23%


// PUDIN.MY.ID
?>
