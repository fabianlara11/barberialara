<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - BARBERAP</title>
</head>
<body>

<h2>Iniciar sesión</h2>

<form action="procesar_login.php" method="POST">
    <input type="email" name="email" placeholder="Correo" required><br><br>
    <input type="password" name="password" placeholder="Contraseña" required><br><br>
    <button type="submit">Ingresar</button>
</form>

</body>
</html>