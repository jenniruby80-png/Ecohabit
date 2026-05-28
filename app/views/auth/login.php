<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        .container {
            width: 250px;
            margin: 50px auto;
        }

        .form-input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Login</h2>

   <form method="POST">

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit">Login</button>

</form>

    <a href="index.php?url=register">Belum punya akun? Daftar</a>

</div>

</body>
</html>