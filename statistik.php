<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include 'koneksiuts.php';

/* Total Pendaki Aktif */
$pendaki = mysqli_query($conn,
"SELECT COUNT(*) as total FROM pendaki");

$total_pendaki = mysqli_fetch_assoc($pendaki);

/* Total Riwayat */
$riwayat = mysqli_query($conn,
"SELECT COUNT(*) as total FROM riwayat");

$total_riwayat = mysqli_fetch_assoc($riwayat);

/* Rata-rata Umur */
$umur = mysqli_query($conn,
"SELECT AVG(umur) as rata FROM pendaki");

$rata_umur = mysqli_fetch_assoc($umur);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Statistik Pendaki</title>

    <style>

        body{
            font-family: Arial;
            background: #f1f8e9;
            margin: 0;
        }

        .navbar{
            background: green;
            color: white;
            padding: 15px;
            font-size: 22px;
            font-weight: bold;
        }

        .container{
            width: 90%;
            margin: 30px auto;
        }

        .card{
            width: 280px;
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .card h2{
            color: green;
            font-size: 40px;
        }

        .flex{
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn{
            background: green;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 20px;
        }

    </style>

</head>
<body>

<div class="navbar">
    Statistik Pendaki
</div>

<div class="container">

    <a href="dashboard.php" class="btn">
        ← Kembali ke Dashboard
    </a>

    <div class="flex">

        <div class="card">
            <h3>Total Pendaki Aktif</h3>
            <h2><?php echo $total_pendaki['total']; ?></h2>
        </div>

        <div class="card">
            <h3>Total Riwayat Pendakian</h3>
            <h2><?php echo $total_riwayat['total']; ?></h2>
        </div>

        <div class="card">
            <h3>Rata-rata Umur</h3>
            <h2><?php echo round($rata_umur['rata']); ?></h2>
        </div>

    </div>

</div>

</body>
</html>