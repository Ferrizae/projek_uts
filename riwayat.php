<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksiuts.php';

$data = mysqli_query($conn,
"SELECT * FROM riwayat");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pendakian</title>

    <style>

        body{
            font-family: Arial;
            background: #f1f8e9;
            padding: 20px;
        }

        .container{
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid #ddd;
        }

        th{
            background: green;
            color: white;
        }

        th, td{
            padding: 10px;
            text-align: center;
        }

        .btn{
            background: green;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

    </style>

</head>
<body>

<div class="container">

<h2>Riwayat Pendakian</h2>

<a href="dashboard.php" class="btn">
    Kembali
</a>

<table>

<tr>

<th>No</th>
<th>Nama</th>
<th>Umur</th>
<th>Asal</th>
<th>Tanggal Naik</th>
<th>Tanggal Turun</th>
<th>No HP</th>

</tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($data)){
?>

<tr>

<td><?php echo $no++; ?></td>
<td><?php echo $row['nama']; ?></td>
<td><?php echo $row['umur']; ?></td>
<td><?php echo $row['asal']; ?></td>
<td><?php echo $row['tanggal_naik']; ?></td>
<td><?php echo $row['tanggal_turun']; ?></td>
<td><?php echo $row['no_hp']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>