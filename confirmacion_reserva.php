<?php
session_start();

// Verificar si hay datos de reserva en la sesión
$reserva_exitosa = isset($_SESSION['reserva_exitosa']) && $_SESSION['reserva_exitosa'] === true;
$datos_reserva = isset($_SESSION['datos_reserva']) ? $_SESSION['datos_reserva'] : null;
$error_mensaje = isset($_SESSION['reserva_error']) ? $_SESSION['reserva_error'] : null;

// Formatear la fecha para mostrarla en formato más amigable
$fecha_formateada = "";
$hora_formateada = "";

if ($datos_reserva && isset($datos_reserva['fecha']) && isset($datos_reserva['hora'])) {
    // Convertir la fecha de YYYY-MM-DD a un formato más legible
    $fecha_obj = new DateTime($datos_reserva['fecha']);
    $fecha_formateada = $fecha_obj->format('d/m/Y');
    
    // Formatear la hora para mostrarla en formato 12h
    $hora_obj = new DateTime($datos_reserva['hora']);
    $hora_formateada = $hora_obj->format('h:i A');
}

// Limpiar las variables de sesión después de usarlas
unset($_SESSION['reserva_exitosa']);
unset($_SESSION['datos_reserva']);
unset($_SESSION['reserva_error']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Reserva - BARBERIA BARBERAP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        :root {
            --primary-color: #c59d5f;
            --secondary-color: #111;
            --text-color: #333;
            --light-color: #f4f4f4;
            --success-color: #28a745;
            --error-color: #dc3545;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: #f9f9f9;
            background-image: url('img/clientes.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: -1;
        }
        
        .container {
            width: 90%;
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        header {
            margin-bottom: 2rem;
        }
        
        h1 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .confirmation-icon {
            font-size: 5rem;
            color: var(--success-color);
            margin-bottom: 1.5rem;
        }
        
        .error-icon {
            font-size: 5rem;
            color: var(--error-color);
            margin-bottom: 1.5rem;
        }
        
        .reservation-details {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-left: 5px solid var(--primary-color);
            text-align: left;
        }
        
        .reservation-details p {
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
        }
        
        .reservation-details strong {
            color: var(--secondary-color);
        }
        
        .btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }
        
        .btn:hover {
            background-color: #b38d4f;
            transform: translateY(-3px);
        }
        
        footer {
            margin-top: 2rem;
            color: var(--light-color);
            text-align: center;
        }
        
        .footer-logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 1.5rem;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>BARBERIA BARBERAP</h1>
        </header>
        
        <?php if ($reserva_exitosa && $datos_reserva): ?>
            <i class="fas fa-check-circle confirmation-icon"></i>
            <h2>¡Reserva Confirmada!</h2>
            <p>Tu cita ha sido agendada exitosamente. Te esperamos en nuestra barbería.</p>
            
            <div class="reservation-details">
                <p><strong>Cliente:</strong> <?php echo htmlspecialchars($datos_reserva['nombre'] . ' ' . $datos_reserva['apellido']); ?></p>
                <p><strong>Fecha:</strong> <?php echo htmlspecialchars($fecha_formateada); ?></p>
                <p><strong>Hora:</strong> <?php echo htmlspecialchars($hora_formateada); ?></p>
                <p><strong>Servicio:</strong> <?php echo htmlspecialchars($datos_reserva['servicio']); ?></p>
                <p><strong>Número de Reserva:</strong> #<?php echo htmlspecialchars($datos_reserva['cita_id']); ?></p>
            </div>
            
            <p>Por favor, acércate a nuestra barbería a la hora reservada. Te recomendamos llegar 10 minutos antes.</p>
            <p>Si necesitas modificar o cancelar tu cita, contáctanos por teléfono.</p>
            
        <?php elseif ($error_mensaje): ?>
            <i class="fas fa-times-circle error-icon"></i>
            <h2>Error en la Reserva</h2>
            <p><?php echo htmlspecialchars($error_mensaje); ?></p>
            <p>Por favor, intenta nuevamente o contáctanos directamente.</p>
            
        <?php else: ?>
            <i class="fas fa-question-circle error-icon"></i>
            <h2>No hay información de reserva</h2>
            <p>No se encontró información de reserva. Por favor, realiza una nueva reserva desde nuestra página principal.</p>
            
        <?php endif; ?>
        
        <a href="index.html" class="btn">Volver a la Página Principal</a>
    </div>
    
    <footer>
        <div class="footer-logo">BARBERIA BARBERAP</div>
        <p>&copy; <?php echo date('Y'); ?> Todos los derechos reservados.</p>
    </footer>
</body>
</html>
