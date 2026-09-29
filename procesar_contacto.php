<?php
// Incluir archivo de conexión a la base de datos
include 'conectar.php';

// Verificar que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';
    
    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        $response = [
            'success' => false,
            'message' => 'Todos los campos son obligatorios'
        ];
    } else {
        // Preparar la consulta SQL para insertar el mensaje
        $sql = "INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)";
        
        // Preparar la sentencia
        $stmt = $conexion->prepare($sql);
        
        if ($stmt) {
            // Vincular parámetros
            $stmt->bind_param("sss", $nombre, $email, $mensaje);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                $response = [
                    'success' => true,
                    'message' => '¡Mensaje enviado correctamente!'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Error al guardar el mensaje: ' . $stmt->error
                ];
            }
            
            // Cerrar la sentencia
            $stmt->close();
        } else {
            $response = [
                'success' => false,
                'message' => 'Error en la preparación de la consulta: ' . $conexion->error
            ];
        }
    }
    
    // Devolver la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
} else {
    // Si no es una solicitud POST, redirigir a la página principal
    header('Location: index.html');
    exit;
}
?>
