<!DOCTYPE html>
<html>
<head>
    <title>Register EcoHabit</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#c8e6c9,#a5d6a7);
            padding:15px;
        }

        .container{
            width:100%;
            max-width:420px;
        }

        .card{
            background:white;
            padding:25px 30px;
            border-radius:25px;
            box-shadow:0 15px 35px rgba(0,0,0,.15);
            text-align:center;
        }

        .logo{
            font-size:55px;
            margin-bottom:10px;
        }

        h2{
            color:#2e7d32;
            font-size:30px;
            margin-bottom:8px;
        }

        .subtitle{
            color:#666;
            margin-bottom:25px;
            font-size:15px;
        }

        .form-group{
            margin-bottom:15px;
        }

        input{
            width:100%;
            padding:14px 16px;
            border:2px solid #dcedc8;
            border-radius:12px;
            font-size:15px;
            outline:none;
            transition:.3s;
        }

        input:focus{
            border-color:#4caf50;
            box-shadow:0 0 8px rgba(76,175,80,.2);
        }

        .btn{
            width:100%;
            padding:14px;
            border:none;
            border-radius:12px;
            background:#43a047;
            color:white;
            font-size:18px;
            font-weight:bold;
            cursor:pointer;
            transition:.3s;
            margin-top:5px;
        }

        .btn:hover{
            background:#2e7d32;
        }

        .login-link{
            margin-top:20px;
        }

        .login-link a{
            text-decoration:none;
            color:#43a047;
            font-weight:bold;
        }

        .login-link a:hover{
            text-decoration:underline;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="logo">🌿</div>

        <h2>Daftar EcoHabit</h2>

        <p class="subtitle">
            Buat akun dan mulai kebiasaan ramah lingkunganmu
        </p>

        <form method="POST">

            <div class="form-group">
                <input type="text" name="nama"
                       placeholder="Masukkan Nama" required>
            </div>

            <div class="form-group">
                <input type="email" name="email"
                       placeholder="Masukkan Email" required>
            </div>

            <div class="form-group">
                <input type="password" name="password"
                       placeholder="Masukkan Password" required>
            </div>

            <div class="form-group">
                <input type="password" name="confirm_password"
                       placeholder="Konfirmasi Password" required>
            </div>

            <button type="submit" class="btn">
                Register
            </button>

        </form>

        <div class="login-link">
            <a href="index.php?url=login">
                Sudah punya akun? Login
            </a>
        </div>

    </div>

</div>

</body>
</html>