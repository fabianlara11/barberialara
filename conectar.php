<?php
// Configuración de la base de datos
$host = 'localhost';
$usuario = 'root'; // Tu usuario de MySQL
$contrasena = ''; // Tu contraseña de MySQL
$base_datos = 'barberia_db'; // Cambia por el nombre real de tu base de datos

// Crear conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die('Conexión fallida: ' . $conexion->connect_error);
}
?>