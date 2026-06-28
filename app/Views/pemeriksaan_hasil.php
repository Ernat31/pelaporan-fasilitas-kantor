<!DOCTYPE html>
<html>
<head>
    <title>Pemeriksaan Hasil Perbaikan</title>

    <style>

        body{
            font-family:Arial,sans-serif;
            background:#eef4ff;
            padding:30px;
        }

        .container{
            width:700px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,.1);
        }

        h2{
            text-align:center;
            color:#2563eb;
            margin-bottom:30px;
        }

        p{
            margin:10px 0;
        }

        img{
            width:100%;
            max-height:350px;
            object-fit:cover;
            border-radius:10px;
            margin-top:10px;
        }

        .catatan{
            background:#f8fafc;
            padding:15px;
            border-radius:10px;
            margin-top:10px;
            margin-bottom:20px;
        }

        .btn{
            display:inline-block;
            background:#16a34a;
            color:white;
            padding:12px 20px;
            border-radius:8px;
            text-decoration:none;
        }

    </style>

</head>

<body>

<div class="container">

<h2>Pemeriksaan Hasil Perbaikan</h2>

<p>
<b>Fasilitas :</b>
<?= $laporan['nama_fasilitas']; ?>
</p>

<p>
<b>Lokasi :</b>
<?= $laporan['lokasi']; ?>
</p>

<p>
<b>Teknisi :</b>
<?= $laporan['nama_teknisi']; ?>
</p>

<hr>

<h3>📷 Foto Hasil Perbaikan</h3>

<?php if(!empty($laporan['foto_hasil'])): ?>

<img src="/uploads/<?= $laporan['foto_hasil']; ?>">

<?php else: ?>

<p>Belum ada foto.</p>

<?php endif; ?>

<hr>

<h3>📝 Catatan Teknisi</h3>

<div class="catatan">

<?= $laporan['catatan_perbaikan']; ?>

</div>

<a href="/tutup-laporan/<?= $laporan['id_laporan']; ?>" class="btn">

Tutup Laporan

</a>

</div>

</body>
</html>