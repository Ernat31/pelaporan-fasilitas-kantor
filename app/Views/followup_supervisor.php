<!DOCTYPE html>
<html>
<head>
    <title>Follow Up Supervisor</title>

    <style>

        body{
            font-family:Arial,sans-serif;
            background:#eef4ff;
            padding:30px;
        }

        .container{
            width:650px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,.1);
        }

        h2{
            text-align:center;
            color:#2563eb;
        }

        label{
            font-weight:bold;
        }

        input,textarea{
            width:100%;
            padding:12px;
            margin-top:8px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:8px;
            box-sizing:border-box;
        }

        textarea{
            height:130px;
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

<h2>Follow Up Supervisor</h2>

<form action="/followup/<?= $laporan['id_laporan']; ?>" method="post">

<label>Nama Fasilitas</label>

<input type="text"
value="<?= $laporan['nama_fasilitas']; ?>"
readonly>

<label>Teknisi</label>

<input type="text"
value="<?= $laporan['nama_teknisi']; ?>"
readonly>

<label>Arahan Supervisor</label>

<textarea
name="arahan_supervisor"
placeholder="Masukkan arahan kepada teknisi..."
required></textarea>

<button type="submit">

Kirim Arahan

</button>

</form>

</div>

</body>
</html>