<?php
include 'koneksiuts.php';

if (isset($_POST['kirim'])) {

    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $asal = $_POST['asal'];
    $tanggal_naik = $_POST['tanggal_naik'];
    $tanggal_turun = $_POST['tanggal_turun'];
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO pendaki
    (nama, umur, asal, tanggal_naik, tanggal_turun, no_hp)

    VALUES
    ('$nama','$umur','$asal','$tanggal_naik','$tanggal_turun','$no_hp')";

    $query = mysqli_query($conn, $sql);

    if ($query) {

        header("Location: dashboard.php");

    } else {

        echo "Data gagal ditambahkan";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Pendaki</title>

    <style>

        body{
            background: #e8f5e9;
            font-family: Arial;
        }

        .container{
            width: 400px;
            background: white;
            margin: 50px auto;
            padding: 25px;
            border-radius: 10px;
        }

        h2{
            text-align: center;
        }

        input{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        button{
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: green;
            color: white;
            border: none;
            border-radius: 5px;
        }

        a{
            text-decoration: none;
        }

    </style>

</head>
<body>

<div class="container">

<h2>Tambah Data Pendaki</h2>

<form method="POST">

    <input type="text" name="nama" placeholder="Nama Pendaki" required>

    <input type="number" name="umur" placeholder="Umur" required>

    <input type="text" name="asal" placeholder="Asal" required>

    <label>Tanggal Naik</label>
    <input type="date" name="tanggal_naik" required>

    <label>Tanggal Turun</label>
    <input type="date" name="tanggal_turun" required>

    <input type="text" name="no_hp" placeholder="No HP" required>

    <button type="submit" name="kirim">
        Simpan Data
    </button>

</form>

<br>

<a href="dashboard.php">
    ← Kembali ke Dashboard
</a>

</div>

</body>
</html>