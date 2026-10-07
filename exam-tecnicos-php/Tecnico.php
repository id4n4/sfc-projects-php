<?php
class Tecnico
{
  public string $nombre;
  public string $email;
  public string $especialidad;

  public function __construct(string $nombre, string $email, string $especialidad)
  {
    $this->nombre = $nombre;
    $this->email = $email;
    $this->especialidad = $especialidad;
  }

  public function resumen(): string
  {
    return "{$this->nombre} ({$this->especialidad})";
  }

  public function esHardware(): bool
  {
    return $this->especialidad === 'hardware';
  }
}
