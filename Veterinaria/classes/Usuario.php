<?php

class Usuario
{
  public string $id;
  public string $nombre;
  public string $email;
  public string $passwordHash;
  public string $rol;
  public bool $activo;

  public function __construct($id, $nombre, $email, $passwordHash, $rol, $activo)
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->email = $email;
    $this->passwordHash = $passwordHash;
    $this->rol = $rol;
    $this->activo = $activo;
  }

  public function verificarPassword($password)
  {
    return password_verify($password, $this->passwordHash);
  }

  public function esAdministrador()
  {
    return $this->rol === 'administrador';
  }

  public function estaActivo()
  {
    return $this->activo;
  }
}