<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perbaikan</title>

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
            height:120px;
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

<h2>Hasil Perbaikan</h2>

<form action="/simpan-hasil/<?= $laporan['id_laporan']; ?>"
      method="post"
      enctype="multipart/form-data">

<label>Foto Hasil Perbaikan</label>

<input type="file" name="foto_hasil" required>

<label>Catatan Perbaikan</label>

<textarea name="catatan_perbaikan" required></textarea>

<button type="submit">

Simpan

</button>

</form>

</div>

</body>
</html>