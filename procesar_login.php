<?php
session_start();
include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conexion->prepare("SELECT id, nombre, email, password, rol FROM usuarios WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['rol'] = $usuario['rol'];
if ($usuario['rol'] === 'admin') {
    header("Location: panel_admin.php");
} else {
    header("Location: index.php");
}
            exit();
        } else {
            $_SESSION['error_login'] = "Contraseña incorrecta.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error_login'] = "El usuario no existe.";
        header("Location: login.php");
        exit();
    }

    $stmt->close();
    $conexion->close();
} else {
    header("Location: login.php");
    exit();
}
?>