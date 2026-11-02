<?php
require_once 'config.php';

function conectar()
{
  global $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS;
  static $pdo = null;
  if ($pdo === null) {
    $dns = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8";
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dns, $DB_USER, $DB_PASS, $options);
  }
  return $pdo;
}

function e(?string $text): string
{
  return htmlspecialchars($text ?? '', ENT_QUOTES, 'UTF-8');
}
