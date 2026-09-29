<?php
include 'verificar_admin.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador - BARBERIA BARBERAP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #c59d5f;
            --primary-hover: #b38d4f;
            --secondary-color: #111;
            --text-color: #333;
            --light-color: #f4f4f4;
            --white: #ffffff;
            --overlay: rgba(0, 0, 0, 0.72);
            --card-bg: rgba(255, 255, 255, 0.96);
            --shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            color: var(--white);
            background-image: url('img/clientes.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: var(--overlay);
            z-index: -1;
        }

        .topbar {
            width: 100%;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(5px);
        }

        .logo {
            font-size: 1.6rem;
            font-weight: bold;
            color: var(--primary-color);
            letter-spacing: 1px;
        }

        .user-box {
            font-size: 1rem;
            color: var(--light-color);
        }

        .main-container {
            flex: 1;
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .hero-panel {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 35px;
            text-align: center;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .hero-panel h1 {
            font-size: 2.4rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .hero-panel p {
            font-size: 1.05rem;
            color: #f1f1f1;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        .card {
            background: var(--card-bg);
            color: var(--text-color);
            border-radius: 14px;
            padding: 28px 22px;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.28);
        }

        .card i {
            font-size: 2.7rem;
            color: var(--primary-color);
            margin-bottom: 16px;
        }

        .card h3 {
            font-size: 1.3rem;
            margin-bottom: 12px;
            color: var(--secondary-color);
        }

        .card p {
            font-size: 0.98rem;
            margin-bottom: 20px;
            color: #555;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: var(--white);
            text-decoration: none;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 0.95rem;
            font-weight: bold;
            transition: 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background: var(--primary-hover);
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn-danger:hover {
            background: #bb2d3b;
        }

        .footer {
            text-align: center;
            color: #ddd;
            padding: 20px;
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .topbar {
                flex-direction: column;
                gap: 10px;
                padding: 18px 20px;
                text-align: center;
            }

            .hero-panel h1 {
                font-size: 2rem;
            }

            .hero-panel {
                padding: 25px 18px;
            }
        }
    </style>
</head>
<body>

    <header class="topbar">
        <div class="logo">BARBERIA BARBERAP</div>
        <div class="user-box">
            <i class="fa-solid fa-user-shield"></i>
            Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['nombre']); ?></strong>
        </div>
    </header>

    <main class="main-container">
        <section class="hero-panel">
            <h1>Panel del Administrador</h1>
            <p>Administra el sistema de reservas, consulta reportes y supervisa toda la información de la barbería.</p>
        </section>

        <section class="cards">
            <div class="card">
                <i class="fa-solid fa-calendar-check"></i>
                <h3>Reporte de Citas</h3>
                <p>Consulta todas las citas registradas por fecha, servicio, cliente y estado.</p>
                <a href="reporte_citas.php" class="btn">Ver Reporte</a>
            </div>

          <!---  <div class="card">
                <i class="fa-solid fa-users"></i>
                <h3>Clientes</h3>
                <p>Visualiza la información de los clientes registrados en la barbería.</p>
                <a href="clientes_admin.php" class="btn">Ver Clientes</a>
            </div> 

            <div class="card">
                <i class="fa-solid fa-scissors"></i>
                <h3>Reservas</h3>
                <p>Gestiona las reservas creadas en el sistema y controla su estado.</p>
                <a href="gestionar_reservas.php" class="btn">Gestionar</a>
            </div>--->

            <div class="card">
                <i class="fa-solid fa-right-from-bracket"></i>
                <h3>Cerrar Sesión</h3>
                <p>Salir de forma segura del panel administrativo del sistema.</p>
                <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> BARBERIA BARBERAP - Panel Administrativo</p>
    </footer>

</body>
</html>