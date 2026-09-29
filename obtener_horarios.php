<?php

require_once 'conectar.php';

header('Content-Type: application/json; charset=utf-8');

if (!isset($_GET['fecha']) || empty($_GET['fecha'])) {
    echo json_encode([
        'success' => false,
        'mensaje' => 'No se recibió una fecha.'
    ]);
    exit;
}

$fecha = $_GET['fecha'];

/*
 * Horario de atención de la barbería
 * Puedes cambiar estos valores posteriormente.
 */
$horaInicio = 9;
$horaFin = 18;
$intervalo = 30;

// Obtener citas ocupadas para esa fecha
$sql = "SELECT TIME_FORMAT(hora_cita, '%H:%i') AS hora
        FROM citas
        WHERE fecha_cita = ?
        AND estado IN ('Pendiente', 'Confirmada')";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $fecha);
$stmt->execute();

$resultado = $stmt->get_result();

$horasOcupadas = [];

while ($fila = $resultado->fetch_assoc()) {
    $horasOcupadas[] = $fila['hora'];
}

$stmt->close();


// Generar todos los horarios
$horarios = [];

$inicio = new DateTime($fecha . ' ' . sprintf('%02d:00:00', $horaInicio));
$fin = new DateTime($fecha . ' ' . sprintf('%02d:00:00', $horaFin));

while ($inicio < $fin) {

    $hora = $inicio->format('H:i');

    $horarios[] = [
        'hora' => $hora,
        'ocupada' => in_array($hora, $horasOcupadas)
    ];

    $inicio->modify("+{$intervalo} minutes");
}

echo json_encode([
    'success' => true,
    'horarios' => $horarios
]);

?>