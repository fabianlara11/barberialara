<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SESSION['rol'] !== 'cliente') {
    header("Location: panel_admin.php");
    exit();
}
?>