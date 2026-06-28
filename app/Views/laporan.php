<!DOCTYPE html>
<html>
<head>
    <title>Form Laporan Kerusakan</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f8ff;
            margin:0;
            padding:30px;
        }

        .container{
            width:600px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
        }

        input, textarea, select{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:8px;
            margin-top:5px;
            margin-bottom:15px;
            box-sizing:border-box;
        }

        textarea{
            height:120px;
            resize:none;
        }

        button{
            background:#2563eb;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:8px;
            cursor:pointer;
        }

        button:hover{
            background:#1d4ed8;
        }

        .link{
            text-decoration:none;
            color:#2563eb;
        }
    </style>

</head>
<body>

<div class="container">

<h2>Form Laporan Kerusakan Fasilitas</h2>

<form action="/laporan/simpan"
      method="post"
      enctype="multipart/form-data">
    <label>Nama Fasilitas</label>
    <input type="text" name="nama_fasilitas">

    <label>Lokasi</label>
    <input type="text" name="lokasi">

    <label>Jenis Kerusakan</label>

<select name="jenis_kerusakan" required>

    <option value="">-- Pilih Jenis Kerusakan --</option>

    <option value="AC">AC</option>

    <option value="Listrik">Listrik</option>

    <option value="Printer">Printer</option>

    <option value="Komputer">Komputer</option>

</select>

    <label>Deskripsi Kerusakan</label>
    <textarea name="deskripsi_kerusakan"></textarea>

    <label>Foto Kerusakan</label>
    <input type="file" name="foto_kerusakan">

    <button type="submit">Kirim Laporan</button>

</form>

<br>

<a href="/dashboard" class="link">← Kembali ke Dashboard</a>

</div>

</body>
</html>