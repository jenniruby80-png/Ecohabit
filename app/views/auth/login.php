<!DOCTYPE html>
<html>
<head>
    <title>Login EcoHabit</title>

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
            background:linear-gradient(135deg,#c8e6c9,#81c784);
        }

        .container{
            width:400px;
            background:white;
            padding:40px;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(0,0,0,.15);
            text-align:center;
        }

        .logo{
            font-size:60px;
            margin-bottom:10px;
        }

        h2{
            color:#2e7d32;
            margin-bottom:8px;
        }

        .subtitle{
            color:#666;
            margin-bottom:25px;
            font-size:14px;
        }

        .form-input{
            width:100%;
            padding:14px;
            border:1px solid #c8e6c9;
            border-radius:12px;
            margin-bottom:15px;
            font-size:15px;
            transition:.3s;
        }

        .form-input:focus{
            outline:none;
            border-color:#43a047;
            box-shadow:0 0 8px rgba(67,160,71,.3);
        }

        .btn-login{
            width:100%;
            padding:14px;
            background:#43a047;
            color:white;
            border:none;
            border-radius:12px;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:.3s;
        }

        .btn-login:hover{
            background:#2e7d32;
            transform:translateY(-2px);
        }

        .register-link{
            margin-top:20px;
            display:block;
            color:#43a047;
            text-decoration:none;
            font-weight:bold;
        }

        .register-link:hover{
            text-decoration:underline;
        }
    </style>

</head>

<body>

<div class="container">

    <div class="logo">🌿</div>

    <h2>EcoHabit</h2>

    <p class="subtitle">
        Login untuk melanjutkan aktivitas ramah lingkunganmu
    </p>

    <form method="POST">

        <input
            type="email"
            name="email"
            placeholder="Masukkan Email"
            class="form-input"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Masukkan Password"
            class="form-input"
            required
        >

        <button type="submit" class="btn-login">
            Login
        </button>

    </form>

    <a href="index.php?url=register" class="register-link">
        Belum punya akun? Daftar
    </a>

</div>

</body>
</html>