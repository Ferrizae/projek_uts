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
    <title>The Mountainman</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font-family: Arial;
            background-image: url('rinjani.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .overlay{
            background: rgba(0,0,0,0.5);
            min-height: 100vh;
        }

        /* NAVBAR */

        .navbar{
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 20px 50px;

            background: rgba(0,0,0,0.3);
            backdrop-filter: blur(5px);
        }

        .judul{
            display: flex;
            align-items: center;

            color: white;
            font-size: 32px;
            font-weight: bold;
        }

        .logo{
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .nav-right a{
            color: white;
            text-decoration: none;
            margin-left: 15px;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .menu{
            background: rgba(255,255,255,0.2);
        }

        .logout{
            background: green;
        }

        .nav-right a:hover{
            opacity: 0.8;
        }

        /* HERO */

        .hero{
            text-align: center;
            color: white;
            padding-top: 80px;
        }

        .hero h1{
            font-size: 65px;
            margin-bottom: 15px;
        }

        .hero p{
            font-size: 24px;
        }

        /* CONTAINER */

        .container{
            width: 90%;
            margin: 50px auto;
            background: rgba(255,255,255,0.95);
            padding: 30px;
            border-radius: 20px;
        }

        .container h2{
            margin-bottom: 20px;
        }

        /* BUTTON */

        .btn{
            background: green;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn:hover{
            opacity: 0.9;
        }

        /* SEARCH */

        .search-box{
            margin-top: 20px;
        }

        input{
            padding: 12px;
            width: 260px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        /* TABLE */

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        table, th, td{
            border: 1px solid #ddd;
        }

        th{
            background: green;
            color: white;
        }

        th, td{
            padding: 14px;
            text-align: center;
        }

        tr:hover{
            background: #f5f5f5;
        }

        /* AKSI */

        .edit{
            background: orange;
            color: white;
            padding: 7px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-right: 5px;
        }

        .hapus{
            background: red;
            color: white;
            padding: 7px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

    </style>

</head>
<body>

<div class="overlay">

    <!-- NAVBAR -->

    <div class="navbar">

        <div class="judul">

            <img src="logo.jpeg" class="logo">

            <span>The Mountainman</span>

        </div>

        <div class="nav-right">

            <a href="riwayat.php" class="menu">
                Riwayat
            </a>

            <a href="statistik.php" class="menu">
            Statistik
            </a>

            <a href="logout.php" class="logout">
                Logout
            </a>

        </div>

    </div>

    <!-- HERO -->

    <div class="hero">

        <h1>Explore The Mountain</h1>

        <p>Sistem Pendataan Pendaki Gunung Modern</p>

    </div>

    <!-- CONTENT -->

    <div class="container">

        <h2>Data Pendaki The Mountainman</h2>

        <a href="tambah.php" class="btn">
            + Tambah Data
        </a>

        <!-- SEARCH -->

        <form method="GET" class="search-box">

            <input type="text"
            name="cari"
            placeholder="Cari nama atau asal pendaki"
            value="<?= $cari; ?>">

            <button type="submit" class="btn">
                Cari
            </button>

        </form>

        <!-- TABLE -->

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

                    <a href="hapus.php?id=<?= $row['id']; ?>"
                    class="hapus"
                    onclick="return confirm('Yakin ingin menghapus data?')">

                        Hapus

                    </a>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>