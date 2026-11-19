<?php
// conexion.php · Conecta con la base de datos calidad_bd usando PDO
$host = "localhost";
$bd = "calidad_bd";
$usuario = "root";
$clave = "";   // en XAMPP el usuario root no tiene contraseña

try {
    $pdo = new PDO("mysql:host=$host;dbname=$bd;charset=utf8mb4", $usuario, $clave);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}