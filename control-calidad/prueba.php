<?php
require "conexion.php";
echo "Productos: " . $pdo->query("SELECT COUNT(*) FROM productos")->fetchColumn();
