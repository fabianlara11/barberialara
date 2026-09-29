<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BARBERAP</title>

    <style>
        :root {
            --primary: #c59d5f;
            --primary-hover: #a8844f;
        }

        body{
            font-family: Arial, sans-serif;
            background: url('img/clientes.jpg') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        body::before{
            content:"";
            position:absolute;
            width:100%;
            height:100%;
            background: rgba(0,0,0,0.7);
            z-index:-1;
        }

        .login-box{
            background: #fff;
            color: #333;
            padding: 35px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        h2{
            text-align: center;
            margin-bottom: 25px;
            color: var(--primary);
        }

        input{
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button{
            width: 100%;
            padding: 12px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover{
            background: var(--primary-hover);
        }

        .error{
            background: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>BARBERIA BARBERAP</h2>

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