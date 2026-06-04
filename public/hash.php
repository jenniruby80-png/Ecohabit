<?php
// HASH PASSWORD UNTUK ADMIN (atau user lain)

$password = "12345";

// generate hash
$hash = password_hash($password, PASSWORD_DEFAULT);

// tampilkan hasil
echo "<h3>Password asli:</h3>";
echo $password;

echo "<h3>Password hash:</h3>";
echo $hash;
?>