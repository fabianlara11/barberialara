<?php
include 'verificar_admin.php';
include 'conectar.php';
require('fpdf/fpdf.php'); // Ajusta esta ruta si hace falta

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

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(197, 157, 95);
        $this->Cell(0, 10, 'BARBERAP', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, 'Reporte de Citas Reservadas', 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 15);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 8, utf8_decode('Fecha del reporte: ') . $fecha, 0, 1, 'L');
$pdf->Cell(0, 8, 'Generado el: ' . date('d/m/Y H:i:s'), 0, 1, 'L');
$pdf->Ln(4);

// Encabezados
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(17, 17, 17);
$pdf->SetTextColor(255, 255, 255);

$pdf->Cell(15, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(60, 10, 'Cliente', 1, 0, 'C', true);
$pdf->Cell(35, 10, utf8_decode('Cédula'), 1, 0, 'C', true);
$pdf->Cell(30, 10, utf8_decode('Teléfono'), 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Fecha', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Hora', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Servicio', 1, 0, 'C', true);
$pdf->Cell(35, 10, 'Estado', 1, 1, 'C', true);

// Filas
$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(0, 0, 0);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $cliente = utf8_decode($fila['nombre'] . ' ' . $fila['apellido']);
        $servicio = utf8_decode($fila['servicio']);
        $estado = utf8_decode($fila['estado']);

        $pdf->Cell(15, 8, $fila['id'], 1, 0, 'C');
        $pdf->Cell(60, 8, $cliente, 1, 0, 'L');
        $pdf->Cell(35, 8, $fila['identificacion'], 1, 0, 'C');
        $pdf->Cell(30, 8, $fila['telefono'], 1, 0, 'C');
        $pdf->Cell(25, 8, $fila['fecha_cita'], 1, 0, 'C');
        $pdf->Cell(25, 8, $fila['hora_cita'], 1, 0, 'C');
        $pdf->Cell(50, 8, $servicio, 1, 0, 'L');
        $pdf->Cell(35, 8, $estado, 1, 1, 'C');
    }
} else {
    $pdf->Cell(275, 10, utf8_decode('No hay citas reservadas para esta fecha.'), 1, 1, 'C');
}

$pdf->Output('I', 'reporte_citas_' . $fecha . '.pdf');

$stmt->close();
$conexion->close();
exit();
?>