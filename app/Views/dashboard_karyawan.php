<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Karyawan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

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

*{
    box-sizing:border-box;
}

body{
    font-family:'Poppins',sans-serif;
    padding:12px;
}

.container{
    width:96%;
    max-width:1500px;
}

.header{
    padding:14px 20px;
    margin-bottom:14px;
    border-radius:14px;
}

.header h1{
    font-size:32px;
    margin:0 0 3px 0;
}

.header p{
    font-size:15px;
    margin:0;
}

.dashboard-grid{
    display:grid;
    grid-template-columns:320px 1fr;
    gap:14px;
    align-items:stretch;
}

.left-panel{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.stats{
    display:block;
    margin:0;
}

.stat-card{
    padding:18px;
    min-height:115px;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
}

.stat-card h2{
    font-size:38px;
    line-height:1;
    margin:0 0 8px 0;
}

.stat-card p{
    font-size:14px;
    margin:0;
}

.card{
    padding:16px;
    margin:0;
    border-radius:14px;
}

.card h2{
    font-size:20px;
    margin:0 0 10px 0;
}

.menu{
    padding:10px 12px;
    margin-top:8px;
    border-radius:8px;
    font-size:14px;
    font-weight:600;
    transition:.2s;
}

.menu:hover{
    transform:translateY(-2px);
    opacity:.92;
}

.status-card{
    height:500px;
    overflow-y:auto;
}

.laporan{
    padding:12px;
    margin-top:10px;
    font-size:13px;
    line-height:1.7;
    background:#f8fafc;
}

.laporan b{
    font-size:14px;
}

.laporan img{
    width:180px !important;
    max-height:130px;
    object-fit:cover;
}

.logout-box{
    text-align:center;
}

.logout{
    background:#dc2626;
}

@media(max-width:800px){

    .dashboard-grid{
        grid-template-columns:1fr;
    }

    .status-card{
        height:auto;
        max-height:500px;
    }
}
    </style>

</head>
<body>

<div class="container">

    <div class="header">
        <h1> Dashboard Karyawan</h1>
        <p>Selamat datang di Pelaporan Fasilitas Kantor</p>
    </div>

   <div class="dashboard-grid">

    <div class="left-panel">

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

        <div class="card logout-box">

            <a href="/logout" class="menu logout">
                Logout
            </a>

        </div>

    </div>


    <div class="card status-card">

        <h2>📋 Status Laporan Saya</h2>

        <?php if(empty($laporan)): ?>

            <p>Belum ada laporan.</p>

        <?php else: ?>

            <?php foreach($laporan as $row): ?>

                <div class="laporan">

                    <b><?= $row['nama_fasilitas']; ?></b>

                    <br>

                    Lokasi : <?= $row['lokasi']; ?>

                    <br>

                    Jenis Kerusakan : <?= $row['jenis_kerusakan']; ?>

                    <br>

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

                        <hr style="margin:10px 0;">

                        <b>👷 Teknisi :</b>
                        <?= $row['nama_teknisi']; ?>

                        <br>

                        <b>📷 Bukti Hasil Perbaikan</b>

                        <br>

                        <?php if(!empty($row['foto_hasil'])): ?>

                            <img
                                src="/uploads/<?= $row['foto_hasil']; ?>"
                                alt="Hasil Perbaikan"
                            >

                        <?php else: ?>

                            Belum ada foto.

                        <?php endif; ?>

                        <br>

                        <b>📝 Catatan Teknisi :</b>

                        <?= !empty($row['catatan_perbaikan'])
                            ? $row['catatan_perbaikan']
                            : '-' ?>

                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>


    </div>

</div>

</body>
</html>