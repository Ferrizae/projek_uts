<?php
include 'koneksiuts.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM pendaki WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $asal = $_POST['asal'];
    $tanggal_naik = $_POST['tanggal_naik'];
    $tanggal_turun = $_POST['tanggal_turun'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($conn, "UPDATE pendaki SET

    nama='$nama',
    umur='$umur',
    asal='$asal',
    tanggal_naik='$tanggal_naik',
    tanggal_turun='$tanggal_turun',
    no_hp='$no_hp'

    WHERE id='$id'
    ");

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>

    <style>

        body{
            background: #f1f8e9;
            font-family: Arial;
        }

        .box{
            width: 400px;
            background: white;
            margin: 50px auto;
            padding: 25px;
            border-radius: 10px;
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
            background: orange;
            color: white;
            border: none;
        }

    </style>

</head>
<body>

<div class="box">

<h2>Edit Data Pendaki</h2>

<form method="POST">

<input type="text" name="nama" value="<?= $row['nama']; ?>">

<input type="number" name="umur" value="<?= $row['umur']; ?>">

<input type="text" name="asal" value="<?= $row['asal']; ?>">

<label>Tanggal Naik</label>
<input type="date" name="tanggal_naik" value="<?= $row['tanggal_naik']; ?>">

<label>Tanggal Turun</label>
<input type="date" name="tanggal_turun" value="<?= $row['tanggal_turun']; ?>">

<input type="text" name="no_hp" value="<?= $row['no_hp']; ?>">

<button type="submit" name="update">
    Update Data
</button>

</form>

</div>

</body>
</html>