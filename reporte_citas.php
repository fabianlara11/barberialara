<?php
include 'verificar_admin.php';
include 'conectar.php';

$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');

$stmt = $conexion->prepare("
    SELECT 
        c.id,
        cl.nombre,
        cl.apellido,
        cl.identificacion,
        cl.telefono,
        c.fecha_cita,
        c.hora_cita,
        c.servicio,
        c.estado
    FROM citas c
    INNER JOIN clientes cl ON c.cliente_id = cl.id
    WHERE c.fecha_cita = ?
      AND c.estado IN ('Pendiente', 'Confirmada', 'Completada')
    ORDER BY c.hora_cita ASC
");
$stmt->bind_param("s", $fecha);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Citas - BARBERAP</title>
    <style>
        body{font-family:Arial,sans-serif;background:#f4f4f4;margin:0}
        header{background:#111;color:#fff;padding:20px 30px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap}
        header h1{margin:0;color:#c59d5f}
        .btn{text-decoration:none;padding:10px 16px;border-radius:6px;color:#fff;font-weight:bold;margin-left:8px;display:inline-block}
        .btn-volver{background:#6c757d}
        .btn-pdf{background:#c59d5f}
        .container{max-width:1200px;margin:30px auto;background:#fff;padding:25px;border-radius:10px;box-shadow:0 5px 18px rgba(0,0,0,.08)}
        input[type="date"]{padding:10px;border:1px solid #ccc;border-radius:6px}
        button{padding:10px 16px;background:#c59d5f;color:#fff;border:none;border-radius:6px;cursor:pointer;font-weight:bold}
        table{width:100%;border-collapse:collapse;margin-top:20px}
        th,td{border:1px solid #ddd;padding:10px;text-align:center}
        th{background:#111;color:#fff}
        tr:nth-child(even){background:#f9f9f9}
        .empty{background:#fff3cd;padding:15px;border-radius:6px;color:#856404;margin-top:20px}
    </style>
</head>
<body>

<header>
    <h1>BARBERAP - Reporte de Citas</h1>
    <div>
        <a href="panel_admin.php" class="btn btn-volver">Volver</a>
        <a href="generar_reporte_pdf.php?fecha=<?php echo urlencode($fecha); ?>" class="btn btn-pdf" target="_blank">Descargar PDF</a>
    </div>
</header>

<div class="container">
    <h2>Consultar citas por fecha</h2>

    <form method="GET" action="reporte_citas.php">
        <label><strong>Fecha:</strong></label>
        <input type="date" name="fecha" value="<?php echo htmlspecialchars($fecha); ?>" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if ($resultado->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Cédula</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Servicio</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fila['id']); ?></td>
                        <td><?php echo htmlspecialchars($fila['nombre'] . ' ' . $fila['apellido']); ?></td>
                        <td><?php echo htmlspecialchars($fila['identificacion']); ?></td>
                        <td><?php echo htmlspecialchars($fila['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($fila['fecha_cita']); ?></td>
                        <td><?php echo htmlspecialchars($fila['hora_cita']); ?></td>
                        <td><?php echo htmlspecialchars($fila['servicio']); ?></td>
                        <td><?php echo htmlspecialchars($fila['estado']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="empty">No hay citas reservadas para la fecha seleccionada.</div>
    <?php endif; ?>
</div>

</body>
</html>

<?php
$stmt->close();
$conexion->close();
?>