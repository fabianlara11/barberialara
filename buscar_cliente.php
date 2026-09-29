<?php
include 'conectar.php'; // Incluye el archivo de conexión a la base de datos

header('Content-Type: application/json'); // Indica que la respuesta será JSON

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['identificacion'])) {
    $identificacion_buscada = $conexion->real_escape_string($_POST['identificacion']);

    // Verifica que la conexión esté activa
    if ($conexion->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos.']);
        exit;
    }

    // Prepara la consulta
    $stmt = $conexion->prepare("SELECT id, nombre, apellido, email, telefono, identificacion FROM clientes WHERE identificacion = ? LIMIT 1");
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Error en la consulta SQL.']);
        $conexion->close();
        exit;
    }

    $stmt->bind_param("s", $identificacion_buscada);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        $cliente = $resultado->fetch_assoc();
        echo json_encode(['success' => true, 'cliente' => $cliente]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Cliente no encontrado.']);
    }

    $stmt->close();
    $conexion->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Solicitud inválida.']);
}
?>