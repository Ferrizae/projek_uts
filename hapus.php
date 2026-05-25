<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksiuts.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // ambil data dari tabel pendaki
    $ambil = mysqli_query($conn,
    "SELECT * FROM pendaki WHERE id='$id'");

    $row = mysqli_fetch_assoc($ambil);

    // simpan ke variabel
    $nama = $row['nama'];
    $umur = $row['umur'];
    $asal = $row['asal'];
    $tanggal_naik = $row['tanggal_naik'];
    $tanggal_turun = $row['tanggal_turun'];
    $no_hp = $row['no_hp'];

    // masukkan ke tabel riwayat
    $insert = mysqli_query($conn,
    "INSERT INTO riwayat
    (nama, umur, asal, tanggal_naik, tanggal_turun, no_hp)

    VALUES
    ('$nama','$umur','$asal',
    '$tanggal_naik','$tanggal_turun','$no_hp')
    ");

    // kalau berhasil masuk riwayat
    if($insert){

        // hapus data asli
        mysqli_query($conn,
        "DELETE FROM pendaki WHERE id='$id'");

        header("Location: dashboard.php");

    } else {

        echo "Gagal memindahkan data ke riwayat";

    }

} else {

    echo "ID tidak ditemukan";

}

?>