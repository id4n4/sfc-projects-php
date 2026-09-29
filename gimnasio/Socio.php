<?php
class Socio
{
  public string $email;
  public string $nombre;
  public string $tipoCuota;
  public function __construct(string $email, string $nombre, string $tipoCuota)
  {
    $this->email = $email;
    $this->nombre = $nombre;
    $this->tipoCuota = $tipoCuota;
  }

  public function resumen(): string
  {
    return "{$this->nombre} - cuota " . ucfirst($this->tipoCuota);
  }

  public function esPremium(): bool
  {
    return $this->tipoCuota === 'premium';
  }
}