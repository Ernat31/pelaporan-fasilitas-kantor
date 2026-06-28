<!DOCTYPE html>
<html>
<head>
    <title>Penugasan Teknisi</title>

    <style>

    body{
        font-family:Arial;
        background:#eef4ff;
        padding:30px;
    }

    .container{
        width:600px;
        margin:auto;
        background:white;
        padding:30px;
        border-radius:15px;
        box-shadow:0 0 15px rgba(0,0,0,.1);
    }

    select{
        width:100%;
        padding:12px;
        margin-top:10px;
        margin-bottom:20px;
        border-radius:8px;
    }

    button{
        background:#2563eb;
        color:white;
        border:none;
        padding:12px 20px;
        border-radius:8px;
        cursor:pointer;
    }

    </style>

</head>

<body>

<div class="container">

<h2>Penugasan Teknisi</h2>

<p><b>Fasilitas :</b> <?= $laporan['nama_fasilitas']; ?></p>

<p><b>Lokasi :</b> <?= $laporan['lokasi']; ?></p>

<p><b>Jenis Kerusakan :</b> <?= $laporan['jenis_kerusakan']; ?></p>

<hr>

<form action="/simpan-penugasan/<?= $laporan['id_laporan']; ?>" method="post">

<label>Pilih Teknisi</label>

<select name="teknisi">

<?php if($laporan['jenis_kerusakan'] == 'AC' || $laporan['jenis_kerusakan'] == 'Komputer'): ?>

    <option value="Andi">Andi (Teknisi AC)</option>

<?php elseif($laporan['jenis_kerusakan'] == 'Listrik' || $laporan['jenis_kerusakan'] == 'Printer'): ?>

    <option value="Rian">Rian (Teknisi Listrik)</option>

<?php endif; ?>

</select>

<button type="submit">

Simpan Penugasan

</button>

</form>

</div>

</body>
</html>