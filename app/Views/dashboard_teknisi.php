<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Teknisi</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            background:#eef4ff;
            margin:0;
            padding:12px;
        }

        .container{
            width:96%;
            max-width:1500px;
            margin:auto;
        }


        .header{
            background:white;
            padding:14px 20px;
            border-radius:14px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
            text-align:center;
            margin-bottom:14px;
        }

        .header h1{
            margin:0 0 4px 0;
            color:#2563eb;
            font-size:32px;
        }

        .header-info{
            display:flex;
            justify-content:center;
            gap:30px;
            font-size:14px;
            color:#555;
        }

        .header-info p{
            margin:0;
        }


       .dashboard-grid{
    display:flex;
    flex-direction:column;
    gap:14px;
}
       .left-panel{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:14px;
}


        .card{
            background:white;
            padding:16px;
            border-radius:14px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
        }

        .card h2{
            margin:0 0 10px 0;
            font-size:20px;
        }


        .stat-card{
            background:white;
            padding:18px;
            min-height:115px;
            border-radius:14px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
            text-align:center;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .stat-card h2{
            margin:0 0 6px 0;
            color:#2563eb;
            font-size:38px;
            line-height:1;
        }

        .stat-card p{
            margin:0;
            font-size:14px;
            color:#666;
        }


        .reminder{
            background:#fef3c7;
            border-left:5px solid #f59e0b;
            padding:14px;
            border-radius:10px;
            font-size:13px;
        }

        .reminder h3{
            margin:0 0 7px 0;
            color:#92400e;
            font-size:16px;
        }

        .reminder p{
            margin:0;
            line-height:1.6;
        }


        .task-card{
            height:330px;
            overflow-y:auto;
        }

        .tugas{
            border:1px solid #e5e7eb;
            background:#f8fafc;
            padding:12px;
            border-radius:10px;
            margin-bottom:10px;
            font-size:13px;
            line-height:1.7;
        }

        .tugas-title{
            font-size:15px;
            color:#111827;
        }

        .status{
            color:#2563eb;
        }


        .arahan{
            margin-top:10px;
            background:#fff8db;
            border-left:4px solid #f59e0b;
            padding:10px;
            border-radius:7px;
            font-size:12px;
        }


        .menu{
            display:inline-block;
            text-decoration:none;
            background:#2563eb;
            color:white;
            padding:9px 14px;
            border-radius:8px;
            margin-top:8px;
            font-size:13px;
            font-weight:600;
            transition:.2s;
        }

        .menu:hover{
            transform:translateY(-2px);
            opacity:.92;
        }

        .logout{
    display:inline-block;
    background:#dc2626;
    text-align:center;
    width:150px;
}
.left-panel .card{
    display:flex;
    align-items:center;
    justify-content:flex-end;
}

.tugas{
    position:relative;
}

.task-card{
    min-height:250px;
}

        @media(max-width:800px){

            .dashboard-grid{
                grid-template-columns:1fr;
            }

            .header-info{
                display:block;
            }

            .task-card{
                height:auto;
                max-height:470px;
            }

        }

    </style>

</head>

<body>

<div class="container">


    <div class="header">

        <h1>Dashboard Teknisi</h1>

        <div class="header-info">

            <p>
                Selamat Datang,
                <b><?= session()->get('nama'); ?></b>
            </p>

            <p>
                Keahlian:
                <b><?= session()->get('keahlian'); ?></b>
            </p>

        </div>

    </div>


    <div class="dashboard-grid">



        <div class="left-panel">

            <div class="stat-card">

                <h2><?= count($tugas); ?></h2>

                <p>Total Tugas</p>

            </div>


            <?php foreach($tugas as $row): ?>

                <?php if(!empty($row['reminder_admin'])): ?>

                    <div class="reminder">

                        <h3>🔔 Reminder Admin</h3>

                        <p>
                            <?= $row['reminder_admin']; ?>
                        </p>

                    </div>

                <?php endif; ?>

            <?php endforeach; ?>


            <div class="card">

                <a href="/logout" class="menu logout">
                    Logout
                </a>

            </div>

        </div>



        <div class="card task-card">

            <h2>🛠️ Tugas Saya</h2>


            <?php if(empty($tugas)): ?>

                <p>Belum ada tugas yang ditugaskan.</p>


            <?php else: ?>


                <?php foreach($tugas as $t): ?>


                    <div class="tugas">


                        <b class="tugas-title">
                            <?= $t['nama_fasilitas']; ?>
                        </b>

                        <br>

                        Lokasi:
                        <?= $t['lokasi']; ?>

                        <br>

                        Status:
                        <b class="status">
                            <?= $t['status_laporan']; ?>
                        </b>


                        <?php if(!empty($t['arahan_supervisor'])): ?>

                            <div class="arahan">

                                <b>⚠ Arahan Supervisor</b>

                                <br>

                                <?= $t['arahan_supervisor']; ?>

                            </div>

                        <?php endif; ?>


                        <?php if($t['status_laporan'] == 'Disetujui'): ?>


                            <a
                                href="/terima-tugas/<?= $t['id_laporan']; ?>"
                                class="menu"
                            >
                                Terima Tugas
                            </a>


                        <?php elseif($t['status_laporan'] == 'Diterima'): ?>


                            <a
                                href="/dalam-perbaikan/<?= $t['id_laporan']; ?>"
                                class="menu"
                            >
                                Dalam Perbaikan
                            </a>


                        <?php elseif($t['status_laporan'] == 'Dalam Perbaikan'): ?>


                            <a
                                href="/hasil-perbaikan/<?= $t['id_laporan']; ?>"
                                class="menu"
                            >
                                Selesai
                            </a>


                        <?php endif; ?>


                    </div>


                <?php endforeach; ?>


            <?php endif; ?>


        </div>


    </div>

</div>

</body>
</html>