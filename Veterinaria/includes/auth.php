<?php
session_start();
require('data/usuarios.php');
require('classes/Usuario.php');

function EncontrarUsuarioPorEmail($email): ?Usuario
{
  global $usuarios;

  $usuarioEncontrado = null;
  foreach ($usuarios as $usuario) {
    if ($usuario['email'] === $email) {
      $usuarioEncontrado = new Usuario($usuario['id'], $usuario['nombre'], $usuario['email'], $usuario['clave'], $usuario['rol'], $usuario['activo']);
      break;
    }
  }
  return $usuarioEncontrado;
}

function encontrarUsuarioPorID($id): ?Usuario
{
  global $usuarios;

  $usuarioEncontrado = null;
  foreach ($usuarios as $usuario) {
    if ($usuario['id'] === $id) {
      $usuarioEncontrado = new Usuario($usuario['id'], $usuario['nombre'], $usuario['email'], $usuario['clave'], $usuario['rol'], $usuario['activo']);
      break;
    }
  }
  return $usuarioEncontrado;
}

function requireLogin()
{
  if (!isset($_SESSION['ID'])) {
    header("Location: ../index.php");
    exit();
  }
}

function redirectIfLoggedIn()
{
  if (isset($_SESSION['ID'])) {
    header("Location: dashboard.php");
    exit();
  }
}