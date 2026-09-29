<?php
function connect()
{
  $host = "localhost";
  $db = "gestion_agricola";
  $user = "root";
  $pass = "";

  $dsn = "mysql:host=$host;dbname=$db";
  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ];
  // crea y devuelve un PDO conectado a mysql:host=localhost;dbname=curso (usuario 'root', sin contraseña)
  try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    return $pdo;
  } catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int) $e->getCode());
  }
}