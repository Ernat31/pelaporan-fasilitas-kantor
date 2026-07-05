<!DOCTYPE html>
<html>
<head>

<title>Laporan Kerusakan Fasilitas</title>

<style>

body{
    font-family:Arial,sans-serif;
    background:#eef4ff;
    margin:0;
    padding:30px;
}

.container{
    width:95%;
    max-width:1300px;
    margin:auto;
}

.header{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 0 15px rgba(0,0,0,.1);
    margin-bottom:25px;
    text-align:center;
}

.header h1{
    margin:0;
    color:#2563eb;
}

.card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 0 15px rgba(0,0,0,.1);
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

.menu{
    display:inline-block;
    text-decoration:none;
    background:#2563eb;
    color:white;
    padding:12px 18px;
    border-radius:8px;
    margin-right:10px;
}

.print{
    background:#16a34a;
}

.kembali{
    background:#dc2626;
}

.badge{
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
}

.kuning{background:#f59e0b;}
.biru{background:#2563eb;}
.ungu{background:#7c3aed;}
.orange{background:#ea580c;}
.hijau{background:#16a34a;}
.merah{background:#dc2626;}

@media print{

.menu{
display:none;
}

body{
background:white;
padding:0;
}

.card,
.header{
box-shadow:none;
}

}

</style>

</head>

<body>

<div class="container">

<div class="header">

<h1>📄 Laporan Kerusakan Fasilitas Kantor</h1>

<p>Data seluruh laporan yang masuk ke dalam sistem.</p>

</div>

<div class="card">

<a href="#" onclick="window.print()" class="menu print">

🖨 Cetak Laporan

</a>

<a href="/dashboard-admin" class="menu kembali">

⬅ Kembali

</a>

<table>

<tr>

<th>No</th>

<th>ID</th>

<th>Fasilitas</th>

<th>Lokasi</th>

<th>Jenis</th>

<th>Teknisi</th>

<th>Status</th>

</tr>

<?php $no=1; ?>

<?php foreach($laporan as $row): ?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['id_laporan']; ?></td>

<td><?= $row['nama_fasilitas']; ?></td>

<td><?= $row['lokasi']; ?></td>

<td><?= $row['jenis_kerusakan']; ?></td>

<td><?= $row['nama_teknisi'] ?? '-'; ?></td>

<td>

<?php

$status=$row['status_laporan'];

if($status=="Menunggu Verifikasi"){
echo "<span class='badge kuning'>$status</span>";
}
elseif($status=="Disetujui"){
echo "<span class='badge biru'>$status</span>";
}
elseif($status=="Diterima"){
echo "<span class='badge ungu'>$status</span>";
}
elseif($status=="Dalam Perbaikan"){
echo "<span class='badge orange'>$status</span>";
}
elseif($status=="Menunggu Pemeriksaan Admin"){
echo "<span class='badge orange'>$status</span>";
}
elseif($status=="Selesai"){
echo "<span class='badge hijau'>$status</span>";
}
else{
echo "<span class='badge merah'>$status</span>";
}

?>

</td>

</tr>

<?php endforeach; ?>

</table>

</div>

</div>

</body>
</html>