<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
    if ($_SESSION['rol'] === 'admin') {
        header("Location: panel_admin.php");
    } else {
        header("Location: index.html");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BARBERAP</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: #111;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-box{
            background: #fff;
            color: #333;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
        }
        h2{
            text-align: center;
            margin-bottom: 20px;
        }
        input{
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        button{
            width: 100%;
            padding: 12px;
            background: #c59d5f;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover{
            background: #a8844f;
        }
        .error{
            background: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Iniciar Sesión</h2>

        <?php if (isset($_SESSION['error_login'])): ?>
            <div class="error">
                <?php 
                    echo $_SESSION['error_login']; 
                    unset($_SESSION['error_login']);
                ?>
            </div>
        <?php endif; ?>

        <form action="procesar_login.php" method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>