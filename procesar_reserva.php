<?php
include 'conectar.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Obtener y sanitizar los datos del formulario
    $cliente_id = isset($_POST['cliente_id']) && $_POST['cliente_id'] !== '' ? (int)$_POST['cliente_id'] : 0;
    $nombre_cliente = $conexion->real_escape_string($_POST['nombre_reserva']);
    $apellido_cliente = $conexion->real_escape_string($_POST['apellido_reserva']);
    $identificacion_cliente = isset($_POST['identificacion_nuevo']) ? $conexion->real_escape_string($_POST['identificacion_nuevo']) : $conexion->real_escape_string($_POST['identificacion_reserva']);
    $email_cliente = $conexion->real_escape_string($_POST['email_reserva']);
    $telefono_cliente = $conexion->real_escape_string($_POST['telefono_reserva']); // Número de teléfono
    $fecha_cita = $conexion->real_escape_string($_POST['fecha_reserva']);
    $hora_cita = $conexion->real_escape_string($_POST['hora_reserva']);
    $servicio = $conexion->real_escape_string($_POST['servicio']);

    // 2. Procesar el cliente (buscar o insertar)
    if ($cliente_id === 0) {
        // Es un cliente nuevo o no encontrado por cédula, intentar insertar
        // Primero, verificar si el email ya existe para evitar duplicados si se ingresa manualmente
        $stmt_check_email = $conexion->prepare("SELECT id FROM clientes WHERE email = ? LIMIT 1");
        $stmt_check_email->bind_param("s", $email_cliente);
        $stmt_check_email->execute();
        $stmt_check_email->store_result();
        $stmt_check_email->bind_result($existing_cliente_id);
        $stmt_check_email->fetch();

        if ($stmt_check_email->num_rows > 0) {
            // El email ya existe, usar el ID de ese cliente
            $cliente_id = $existing_cliente_id;
            // Opcional: Actualizar nombre, apellido, identificación y teléfono si son diferentes
            $stmt_update_cliente = $conexion->prepare("UPDATE clientes SET nombre = ?, apellido = ?, identificacion = ?, telefono = ? WHERE id = ?");
            $stmt_update_cliente->bind_param("ssssi", $nombre_cliente, $apellido_cliente, $identificacion_cliente, $telefono_cliente, $cliente_id);
            $stmt_update_cliente->execute();
            $stmt_update_cliente->close();
        } else {
            // Insertar nuevo cliente
            $stmt_insert_cliente = $conexion->prepare("INSERT INTO clientes (nombre, apellido, identificacion, email, telefono) VALUES (?, ?, ?, ?, ?)");
            $stmt_insert_cliente->bind_param("sssss", $nombre_cliente, $apellido_cliente, $identificacion_cliente, $email_cliente, $telefono_cliente);
            
            if ($stmt_insert_cliente->execute()) {
                $cliente_id = $conexion->insert_id; // Obtener el ID del cliente recién insertado
            } else {
                echo "Error al registrar el cliente: " . $stmt_insert_cliente->error;
                $stmt_insert_cliente->close();
                $conexion->close();
                exit();
            }
            $stmt_insert_cliente->close();
        }
        $stmt_check_email->close();
    }
    // Si $cliente_id ya tenía un valor (cliente existente), no se hace nada en esta sección

    // 3. Insertar la cita en la tabla 'citas'
    if ($cliente_id > 0) { // Asegurarse de que tenemos un ID de cliente válido
        $stmt_insert_cita = $conexion->prepare("INSERT INTO citas (cliente_id, fecha_cita, hora_cita, servicio) VALUES (?, ?, ?, ?)");
        $stmt_insert_cita->bind_param("isss", $cliente_id, $fecha_cita, $hora_cita, $servicio);

        if ($stmt_insert_cita->execute()) {
            // Obtener el ID de la cita recién creada
            $cita_id = $conexion->insert_id;
            
            // Guardar los datos de la reserva en la sesión para mostrarlos en la página de confirmación
            session_start();
            $_SESSION['reserva_exitosa'] = true;
            $_SESSION['datos_reserva'] = [
                'nombre' => $nombre_cliente,
                'apellido' => $apellido_cliente,
                'fecha' => $fecha_cita,
                'hora' => $hora_cita,
                'servicio' => $servicio,
                'cita_id' => $cita_id
            ];
            
            // Redireccionar a la página de confirmación
            header("Location: confirmacion_reserva.php");
            exit();
        } else {
            // En caso de error, redirigir con mensaje de error
            session_start();
            $_SESSION['reserva_error'] = "Error al realizar la reserva: " . $stmt_insert_cita->error;
            header("Location: confirmacion_reserva.php");
            exit();
        }
        $stmt_insert_cita->close();
    } else {
        echo "Error: No se pudo obtener o crear el ID del cliente.";
    }

    $conexion->close();
} else {
    echo "Acceso no permitido.";
}
?>