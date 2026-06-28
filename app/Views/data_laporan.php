
<!DOCTYPE html>
<html>
<head>
    <title>Data Laporan</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f8ff;
            margin:0;
            padding:30px;
        }

        .container{
            width:90%;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#2563eb;
            color:white;
            padding:12px;
        }

        td{
            padding:12px;
            border-bottom:1px solid #ddd;
        }

        .btn{
            display:inline-block;
            background:#2563eb;
            color:white;
            text-decoration:none;
            padding:10px 15px;
            border-radius:8px;
            margin-bottom:15px;
        }

        .approve{
            background:#16a34a;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:8px;
        }

        .tolak{
            background:#dc2626;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:8px;
        }

        .assign{
            background:#2563eb;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:8px;
        }

        .eskalasi{
            background:#f59e0b;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:8px;
        }

        .badge{
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:bold;
}

.kuning{
    background:#facc15;
    color:black;
}

.biru{
    background:#2563eb;
}

.ungu{
    background:#7c3aed;
}

.orange{
    background:#f97316;
}

.hijau{
    background:#16a34a;
}

.merah{
    background:#dc2626;
}
    </style>

</head>
<body>

<div class="container">

<h2>Data Laporan Kerusakan Fasilitas</h2>


<table>

<tr>
    <th>ID</th>
    <th>Fasilitas</th>
    <th>Lokasi</th>
    <th>Foto Kerusakan</th>
    <th>Status</th>
    <th>Teknisi</th>

    <th>Aksi</th>
</tr>

<?php foreach($laporan as $row): ?>

<tr>

    <td><?= $row['id_laporan']; ?></td>

    <td><?= $row['nama_fasilitas']; ?></td>

    <td><?= $row['lokasi']; ?></td>
   
 <td>

<?php if(!empty($row['foto_kerusakan'])): ?>

<a href="/uploads/<?= $row['foto_kerusakan']; ?>" target="_blank">
    📷 Lihat Foto
</a>

<?php else: ?>

-

<?php endif; ?>

</td>

    <td>

<?php
$status = $row['status_laporan'];

if($status == 'Menunggu Verifikasi'){
    echo '<span class="badge kuning">Menunggu</span>';
}
elseif($status == 'Disetujui'){
    echo '<span class="badge biru">Disetujui</span>';
}
elseif($status == 'Diterima'){
    echo '<span class="badge ungu">Diterima</span>';
}
elseif($status == 'Dalam Perbaikan'){
    echo '<span class="badge orange">Dalam Perbaikan</span>';
}
elseif($status == 'Menunggu Pemeriksaan Admin'){
    echo '<span class="badge orange">Menunggu Pemeriksaan</span>';
}
elseif($status == 'Selesai'){
    echo '<span class="badge hijau">Selesai</span>';
}
elseif($status == 'Ditolak'){
    echo '<span class="badge merah">Ditolak</span>';
}
?>

</td>

    <td><?= $row['nama_teknisi'] ?? '-'; ?></td>


<td>

<?php if($row['status_laporan'] == 'Menunggu Verifikasi'): ?>

    <a class="approve"
       href="/approve/<?= $row['id_laporan']; ?>">
        Approve
    </a>

    <a class="tolak"
       href="/tolak/<?= $row['id_laporan']; ?>">
        Tolak
    </a>

<?php elseif($row['status_laporan'] == 'Menunggu Pemeriksaan Admin'): ?>

    <a class="assign"
       href="/pemeriksaan/<?= $row['id_laporan']; ?>">
        Periksa Hasil
    </a>

<?php else: ?>

    -

<?php endif; ?>

</td>
</tr>

<?php endforeach; ?>

</table>

</div>

</body>
</html>

