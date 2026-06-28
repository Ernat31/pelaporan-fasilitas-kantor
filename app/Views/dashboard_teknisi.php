
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Teknisi</title>

    <style>
        body{
            font-family:Arial,sans-serif;
            background:#eef4ff;
            margin:0;
            padding:30px;
        }

        .container{
            width:90%;
            max-width:1000px;
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
            margin:0;
            color:#2563eb;
        }

        .header p{
            color:#666;
        }

       .stats{
        display:flex;
        justify-content:center;
        margin-bottom:25px;
        }

        .stat-card{
        width:250px;
        background:white;
        padding:20px;
        border-radius:15px;
        box-shadow:0 0 15px rgba(0,0,0,0.1);
        text-align:center;
        }

        .stat-card h2{
            margin:0;
            color:#2563eb;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
            margin-bottom:20px;
        }

        .menu{
            display:inline-block;
            text-decoration:none;
            background:#2563eb;
            color:white;
            padding:10px 15px;
            border-radius:8px;
            margin-top:10px;
        }

        .logout{
            background:#dc2626;
        }
    </style>

</head>
<body>

<div class="container">
    
<?php foreach($tugas as $row): ?>

<?php if(!empty($row['reminder_admin'])): ?>

<div style="
background:#FEF3C7;
border-left:6px solid #F59E0B;
padding:18px;
margin-bottom:20px;
border-radius:10px;
">

<h3 style="margin:0;color:#92400E;">
🔔 Reminder Admin
</h3>

<p style="margin-top:12px;">

<?= $row['reminder_admin']; ?>

</p>

</div>

<?php endif; ?>

<?php endforeach; ?>
    <div class="header">
        <h1> Dashboard Teknisi</h1>

        <p>
            Selamat Datang,
            <b><?= session()->get('nama'); ?></b>
        </p>

        <p>
            Keahlian:
            <b><?= session()->get('keahlian'); ?></b>
        </p>
    </div>

   <div class="stats">

    <div class="stat-card">
        <h2><?= count($tugas); ?></h2>
        <p>Total Tugas</p>
    </div>

</div>

    

    <div class="card">

        <h2>🛠️ Tugas Saya</h2>

        <?php if(empty($tugas)): ?>

            <p>Belum ada tugas yang ditugaskan.</p>

        <?php else: ?>

            <?php foreach($tugas as $t): ?>

                <div style="border:1px solid #ddd;padding:15px;border-radius:10px;margin-bottom:15px;">

                    <b><?= $t['nama_fasilitas']; ?></b><br><br>

                    Lokasi:
                    <?= $t['lokasi']; ?><br>

                    Status:
                    <b><?= $t['status_laporan']; ?></b>

                    <br><br>
                    <?php if(!empty($t['arahan_supervisor'])): ?>

<div style="
    margin-top:15px;
    background:#fff8db;
    border-left:5px solid #f59e0b;
    padding:12px;
    border-radius:8px;
">

    <b>⚠ Arahan Supervisor</b><br><br>

    <?= $t['arahan_supervisor']; ?>

</div>

<br>

<?php endif; ?>

                    <?php if($t['status_laporan'] == 'Disetujui'): ?>

                        <a href="/terima-tugas/<?= $t['id_laporan']; ?>" class="menu">
                            Terima Tugas
                        </a>

                    <?php elseif($t['status_laporan'] == 'Diterima'): ?>

                        <a href="/dalam-perbaikan/<?= $t['id_laporan']; ?>" class="menu">
                            Dalam Perbaikan
                        </a>

                  <?php elseif($t['status_laporan'] == 'Dalam Perbaikan'): ?>

    <a href="/hasil-perbaikan/<?= $t['id_laporan']; ?>" class="menu">
        Selesai
    </a>

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

