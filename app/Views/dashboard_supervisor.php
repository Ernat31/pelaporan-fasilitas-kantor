<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Supervisor</title>

    <style>

        body{
            font-family:Arial,sans-serif;
            background:#eef4ff;
            padding:30px;
        }

        .container{
            width:90%;
            max-width:1200px;
            margin:auto;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,.1);
            margin-bottom:20px;
        }

        h1{
            text-align:center;
            color:#2563eb;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        th{
            background:#2563eb;
            color:white;
            padding:12px;
        }

        td{
            padding:12px;
            border-bottom:1px solid #ddd;
            text-align:center;
        }

        .btn{
            display:inline-block;
            background:#2563eb;
            color:white;
            padding:8px 15px;
            text-decoration:none;
            border-radius:8px;
        }

        .logout{
            display:block;
            text-align:center;
            background:#dc2626;
            color:white;
            padding:15px;
            border-radius:10px;
            text-decoration:none;
        }

    </style>

</head>

<body>

<div class="container">

<div class="card">

<h1>Dashboard Supervisor</h1>

<p align="center">

Selamat Datang,

<b><?= session()->get('nama'); ?></b>

</p>

</div>
<div style="display:flex; gap:20px; margin-bottom:20px;">

    <div class="card" style="flex:1; text-align:center;">
        <h2><?= $total; ?></h2>
        <p>Total Eskalasi</p>
    </div>

    <div class="card" style="flex:1; text-align:center;">
        <h2><?= $belum; ?></h2>
        <p>Belum Ditindaklanjuti</p>
    </div>

    <div class="card" style="flex:1; text-align:center;">
        <h2><?= $sudah; ?></h2>
        <p>Sudah Ditindaklanjuti</p>
    </div>

</div>
<div class="card">

<h2>🚨 Laporan Keterlambatan</h2>

<?php if(empty($laporan)): ?>

<p>Tidak ada laporan keterlambatan.</p>

<?php else: ?>

<table>

<tr>

<th>ID</th>
<th>Fasilitas</th>
<th>Teknisi</th>
<th>Status Eskalasi</th>
<th>Aksi</th>

</tr>

<?php foreach($laporan as $row): ?>

<tr>

<td><?= $row['id_laporan']; ?></td>

<td><?= $row['nama_fasilitas']; ?></td>

<td><?= $row['nama_teknisi']; ?></td>

<td><?= $row['status_eskalasi']; ?></td>

<td>

<a href="/followup/<?= $row['id_laporan']; ?>" class="btn">

Follow Up

</a>

</td>

</tr>

<?php endforeach; ?>

</table>

<?php endif; ?>

</div>

<div class="card">

<a href="/logout" class="logout">

Logout

</a>

</div>

</div>

</body>
</html>