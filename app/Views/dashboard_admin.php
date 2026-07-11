
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin Facility</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>

        body{
    font-family:'Poppins',sans-serif;
    background:#eef4ff;
    margin:0;
    padding:18px;
}
        .container{
            width:95%;
            max-width:1400px;
            margin:auto;
        }

        .header{
            background:white;
            padding:18px;
            border-radius:15px;
            text-align:center;
            margin-bottom:25px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        .header h1{
            margin:0;
            color:#2563eb;
            font-size:42px;
            margin-bottom:8px;
        }
        .header p{
         font-size:22px;
         margin:0;
        }
        .stats{
            display:flex;
            gap:20px;
            margin-bottom:25px;
        }

        .stat-card{

        flex:1;

        background:white;

        padding:15px;

        border-radius:15px;

        text-align:center;

        box-shadow:0 5px 15px rgba(0,0,0,.08);

        transition:.3s;

        }

        .stat-card h2{
            font-size:50px;
            margin-botton:5px;
            color:#2563eb;
        }
        .stat-card p{

        font-size:18px;

        margin:0;

        color:#666;

        }
        .stat-card:hover{

        transform:translateY(-5px);
        }
       
        .card{

        background:white;

        padding:18px;

        border-radius:18px;

        margin-bottom:18px;

        box-shadow:0 5px 15px rgba(0,0,0,.08);

        }

       .menu{

display:block;

text-decoration:none;

background:#2563eb;

color:white;

padding:14px;

border-radius:12px;

margin-top:12px;

text-align:center;

font-size:18px;

font-weight:600;

transition:.3s;

}

.menu:hover{

transform:translateY(-3px);

opacity:.92;

}
.grid-card{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
    margin-bottom:20px;
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

<div class="grid-card">
<div class="card">

    <h2>📋 Verifikasi Laporan</h2>

    <a href="/data-laporan" class="menu">
        Verifikasi Laporan Kerusakan
    </a>
     <a href="/laporan-admin" class="menu" style="background:#16a34a;">
        📄 Laporan
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

</div> <!-- penutup card reminder -->

</div> <!-- penutup grid-card -->


<div style="text-align:right;">

    <a href="/logout" class="menu logout"
       style="width:180px; display:inline-block;">
        Logout
    </a>

</div>

</div>

</body>
</html>