
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin Facility</title>

    <style>

        body{
            font-family:Arial,sans-serif;
            background:#eef4ff;
            margin:0;
            padding:30px;
        }

        .container{
            width:90%;
            max-width:1100px;
            margin:auto;
        }

        .header{
            background:white;
            padding:25px;
            border-radius:15px;
            text-align:center;
            margin-bottom:25px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        .header h1{
            margin:0;
            color:#2563eb;
        }

        .stats{
            display:flex;
            gap:20px;
            margin-bottom:25px;
        }

        .stat-card{
            flex:1;
            background:white;
            padding:20px;
            border-radius:15px;
            text-align:center;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        .stat-card h2{
            font-size:40px;
            margin:0;
            color:#2563eb;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:15px;
            margin-bottom:20px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        .menu{
            display:block;
            text-decoration:none;
            background:#2563eb;
            color:white;
            padding:15px;
            border-radius:10px;
            margin-top:15px;
            text-align:center;
        }

        .logout{
            background:#dc2626;
        }

    </style>

</head>
<body>

<div class="container">
    <?php if(session()->getFlashdata('success')): ?>

<div style="
background:#dcfce7;
color:#166534;
padding:15px;
border-radius:10px;
margin-bottom:20px;
">

<?= session()->getFlashdata('success'); ?>

</div>

<?php endif; ?>

<div class="header">

    <h1> Dashboard Admin Facility</h1>

    <p>
        Selamat Datang,
        <b><?= session()->get('nama'); ?></b>
    </p>

</div>

<div class="stats">

    <div class="stat-card">
        <h2><?= $total; ?></h2>
        <p>Total Laporan</p>
    </div>

    <div class="stat-card">
        <h2><?= $menunggu; ?></h2>
        <p>Menunggu Verifikasi</p>
    </div>

    <div class="stat-card">
        <h2><?= $proses; ?></h2>
        <p>Dalam Perbaikan</p>
    </div>

    <div class="stat-card">
        <h2><?= $selesai; ?></h2>
        <p>Selesai</p>
    </div>

</div>

<div class="card">

    <h2>📋 Verifikasi Laporan</h2>

    <a href="/data-laporan" class="menu">
        Verifikasi Laporan Kerusakan
    </a>

</div>

<div class="card">

    <h2>🔔 Reminder Keterlambatan</h2>

    <p>
        Simulasi laporan yang belum ditangani selama 1 jam.
    </p>

    <a href="/simulasi-reminder" class="menu">
        Kirim Reminder ke Teknisi
    </a>
    <br><br>

    <a href="/simulasi-eskalasi" class="menu" style="background:#dc2626;">
    🚨 Simulasi Keterlambatan 2 Jam
    </a>

</div>

<div class="card">

    <a href="/logout" class="menu logout">
        Logout
    </a>

</div>

</div>

</body>
</html>

