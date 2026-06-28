<!DOCTYPE html>
<html>
<head>
    <title>Login Pelaporan Kerusakan Fasilitas Kantor</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f8ff;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            margin:0;
        }

        .container{
            background:white;
            padding:40px;
            border-radius:15px;
            width:350px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            margin-bottom:30px;
        }

        input{
            width:100%;
            padding:12px;
            margin-top:5px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:8px;
            box-sizing:border-box;
        }

        button{
            width:100%;
            background:#2563eb;
            color:white;
            border:none;
            padding:12px;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
        }

        button:hover{
            background:#1d4ed8;
        }
    </style>

</head>
<body>

<div class="container">

    <h2>Login Pelaporan Kerusakan Fasilitas Kantor</h2>

    <form action="/login/auth" method="post">

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

    </form>

</div>

</body>
</html>