<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Karyawan</title>

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
            box-shadow:0 0 15px rgba(0,0,0,0.1);
            text-align:center;
            margin-bottom:25px;
        }

        .header h1{
            color:#2563eb;
            margin:0;
        }

        .stats{
            display:flex;
            gap:20px;
            margin-bottom:25px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
            margin-bottom:20px;
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
            color:#2563eb;
            margin:0;
            font-size:40px;
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

        .laporan{
            border:1px solid #ddd;
            border-radius:10px;
            padding:15px;
            margin-top:15px;
        }

        .status{
            font-weight:bold;
        }

        .menunggu{
            color:#f59e0b;
        }

        .proses{
            color:#2563eb;
        }

        .selesai{
            color:#16a34a;
        }

        .ditolak{
            color:#dc2626;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="header">
        <h1> Dashboard Karyawan</h1>
        <p>Selamat datang di Pelaporan Fasilitas Kantor</p>
    </div>

    <div class="stats">

        <div class="stat-card">
            <h2><?= count($laporan); ?></h2>
            <p>Total Laporan Saya</p>
        </div>

    </div>

    <div class="card">

        <h2>➕ Buat Laporan Baru</h2>

        <a href="/laporan" class="menu">
            Buat Laporan
        </a>

    </div>

    <div class="card">

        <h2>📋 Status Laporan Saya</h2>

        <?php if(empty($laporan)): ?>

            <p>Belum ada laporan.</p>

        <?php else: ?>

            <?php foreach($laporan as $row): ?>

                <div class="laporan">

                    <b><?= $row['nama_fasilitas']; ?></b><br><br>

                    Lokasi :
                    <?= $row['lokasi']; ?><br>

                    Jenis Kerusakan :
                    <?= $row['jenis_kerusakan']; ?><br>

                    Status :

                    <?php
                    $status = $row['status_laporan'];

                    if($status == "Menunggu Verifikasi"){
                        echo "<span class='status menunggu'>$status</span>";
                    }
                    elseif($status == "Dalam Perbaikan"){
                        echo "<span class='status proses'>$status</span>";
                    }
                    elseif($status == "Selesai"){
                        echo "<span class='status selesai'>$status</span>";
                    }
                    elseif($status == "Ditolak"){
                        echo "<span class='status ditolak'>$status</span>";
                    }
                    else{
                        echo "<span class='status'>$status</span>";
                    }
                    ?>
                    <?php if($row['status_laporan'] == "Selesai"): ?>

<hr style="margin:15px 0;">

<b>👷 Teknisi :</b>
<?= $row['nama_teknisi']; ?>

<br><br>

<b>📷 Bukti Hasil Perbaikan</b><br><br>

<?php if(!empty($row['foto_hasil'])): ?>

<img src="/uploads/<?= $row['foto_hasil']; ?>"
     style="
        width:280px;
        border-radius:10px;
        border:1px solid #ddd;
        box-shadow:0 2px 8px rgba(0,0,0,.15);
     ">

<?php else: ?>

Belum ada foto.

<?php endif; ?>

<br><br>

<b>📝 Catatan Teknisi</b><br>

<?= !empty($row['catatan_perbaikan']) ? $row['catatan_perbaikan'] : '-' ?>

<?php endif; ?>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

    <div class="card">

        <a href="/logout" class="menu logout">
            Logout
        </a>

    </div>

</div>

</body>
</html>