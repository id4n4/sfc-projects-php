<?php
class Cliente
{
  private $email;
  private $nombre;

  public function __construct($email, $nombre)
  {
    $this->email = $email;
    $this->nombre = $nombre;
  }

  public function getEmail()
  {
    return $this->email;
  }


  public function getNombre()
  {
    return $this->nombre;
  }


  public function resumen(): string
  {
    return "Cliente: {$this->nombre} ({$this->email})";
  }

}