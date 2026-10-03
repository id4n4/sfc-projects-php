<?php
class Responsable
{
  private string $id;
  private string $nombre;
  private string $telefono;
  private string $email;
  private string $direccion;

  public function __construct(string $id, string $nombre, string $telefono, string $email, string $direccion)
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->telefono = $telefono;
    $this->email = $email;
    $this->direccion = $direccion;
  }

  public function actualizarContacto(string $telefono, string $email, string $direccion): void
  {
    $this->telefono = $telefono;
    $this->email = $email;
    $this->direccion = $direccion;
  }

  public function nombreCompleto(): string
  {
    return $this->nombre;
  }
}