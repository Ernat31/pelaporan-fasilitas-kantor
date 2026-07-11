<!DOCTYPE html>
<html>
<head>

    <title>Dashboard Supervisor</title>

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

        .header p{
            margin:0;
            font-size:15px;
            color:#555;
        }


        .stats{
            display:grid;
            grid-template-columns:repeat(3, 1fr);
            gap:14px;
            margin-bottom:14px;
        }

        .stat-card{
            background:white;
            padding:16px;
            min-height:100px;
            border-radius:14px;
            box-shadow:0 5px 15px rgba(0,0,0,.08);
            text-align:center;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }

        .stat-card h2{
            margin:0 0 5px 0;
            color:#2563eb;
            font-size:36px;
            line-height:1;
        }

        .stat-card p{
            margin:0;
            color:#666;
            font-size:14px;
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


        .table-card{
            height:350px;
            overflow-y:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
            font-size:13px;
        }

        th{
            background:#2563eb;
            color:white;
            padding:10px;
            position:sticky;
            top:0;
        }

        td{
            padding:10px;
            border-bottom:1px solid #e5e7eb;
            text-align:center;
        }

        tr:hover{
            background:#f8fafc;
        }


        .btn{
            display:inline-block;
            background:#2563eb;
            color:white;
            padding:7px 13px;
            text-decoration:none;
            border-radius:7px;
            font-size:12px;
            font-weight:600;
            transition:.2s;
        }

        .btn:hover{
            transform:translateY(-2px);
            opacity:.92;
        }


        .logout-area{
            text-align:right;
            margin-top:12px;
        }

        .logout{
            display:inline-block;
            width:150px;
            text-align:center;
            background:#dc2626;
            color:white;
            padding:9px 14px;
            border-radius:8px;
            text-decoration:none;
            font-size:13px;
            font-weight:600;
        }

        .logout:hover{
            opacity:.92;
        }


        @media(max-width:800px){

            .stats{
                grid-template-columns:1fr;
            }

            .table-card{
                overflow-x:auto;
            }

        }

    </style>

</head>

<body>

<div class="container">



    <div class="header">

        <h1>Dashboard Supervisor</h1>

        <p>
            Selamat Datang,
            <b><?= session()->get('nama'); ?></b>
        </p>

    </div>



    <div class="stats">

        <div class="stat-card">

            <h2><?= $total; ?></h2>

            <p>Total Eskalasi</p>

        </div>


        <div class="stat-card">

            <h2><?= $belum; ?></h2>

            <p>Belum Ditindaklanjuti</p>

        </div>


        <div class="stat-card">

            <h2><?= $sudah; ?></h2>

            <p>Sudah Ditindaklanjuti</p>

        </div>

    </div>



    <div class="card table-card">

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

                        <td>
                            <?= $row['id_laporan']; ?>
                        </td>

                        <td>
                            <?= $row['nama_fasilitas']; ?>
                        </td>

                        <td>
                            <?= $row['nama_teknisi']; ?>
                        </td>

                        <td>
                            <?= $row['status_eskalasi']; ?>
                        </td>

                        <td>

                            <a
                                href="/followup/<?= $row['id_laporan']; ?>"
                                class="btn"
                            >
                                Follow Up
                            </a>

                        </td>

                    </tr>


                <?php endforeach; ?>


            </table>


        <?php endif; ?>


    </div>



    <div class="logout-area">

        <a href="/logout" class="logout">
            Logout
        </a>

    </div>


</div>

</body>
</html>