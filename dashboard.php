<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include 'koneksiuts.php';

$cari = "";

if(isset($_GET['cari'])){

    $cari = $_GET['cari'];

    $data = mysqli_query($conn,
    "SELECT * FROM pendaki
    WHERE nama LIKE '%$cari%'
    OR asal LIKE '%$cari%'");

} else {

    $data = mysqli_query($conn,
    "SELECT * FROM pendaki");

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pendaki</title>

    <style>

        body{
            margin: 0;
            font-family: Arial;
            background: #f1f8e9;
        }

        .navbar{
            background: green;
            color: white;
            padding: 15px;
            font-size: 20px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .judul{
            display: flex;
            align-items: center;
            font-weight: bold;
        }

        .menu{
            color: green;
            text-decoration: none;
            background: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .logo{
            width: 40px;
            height: 40px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .container{
            width: 90%;
            margin: auto;
            margin-top: 30px;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        .btn{
            background: green;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
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
            padding: 12px;
            text-align: center;
        }

        .logout{
            color: green;
            text-decoration: none;
            background: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-left: 15px;
        }
        .edit{
            background: yellow;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .hapus{
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        input{
            padding: 10px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

</style>

</head>
<body>

<div class="navbar">

    <div class="judul">

        <img src="logo.jpeg" class="logo">

        <span>The Mountainman

    </div>

    <div>

    <a href="riwayat.php" class="menu">
        Riwayat Pendakian
    </a>

    <a href="logout.php" class="logout">
        Logout
    </a>

</div>

</div>

<div class="container">

    <h2>Data Pendaki The Mountainman</h2>

    <a href="tambah.php" class="btn">
        + Tambah Data
    </a>

    <form method="GET" style="margin-top:20px;">

    <input type="text"
    name="cari"
    placeholder="Cari nama atau asal pendaki"
    value="<?= $cari; ?>">

    <button type="submit" class="btn">
        Cari
    </button>

</form>

    <table>

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Asal</th>
            <th>Tanggal Naik</th>
            <th>Tanggal Turun</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while($row = mysqli_fetch_assoc($data)){
        ?>

        <tr>

            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['umur']; ?></td>
            <td><?= $row['asal']; ?></td>
            <td><?= $row['tanggal_naik']; ?></td>
            <td><?= $row['tanggal_turun']; ?></td>
            <td><?= $row['no_hp']; ?></td>
            <td>

<a href="edit.php?id=<?= $row['id']; ?>" class="edit">
    Edit
</a>

<a href="hapus.php?id=<?php echo $row['id']; ?>" 
class="hapus"
onclick="return confirm('Yakin ingin menghapus data?')">

    Hapus

</a>

</td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>