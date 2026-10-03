<?php

// - **Archivo:** `classes/Paciente.php`.
// - **Propiedades:** `id`, `nombre`, `especie`, `raza`, `fechaNacimiento`, `sexo`, `microchip`, `responsableId`.
// - **Funciones:** `calcularEdad()`, `actualizarDatos(...)`, `resumen()`.
// - La edad debe calcularse desde la fecha de nacimiento, no guardarse como un valor fijo.

class Paciente
{
  public string $id;
  public string $nombre;
  public string $especie;
  public string $raza;
  public string $fechaNacimiento;
  public string $sexo;
  public string $microchip;
  public string $responsableId;

  public function __construct(string $id, string $nombre, string $especie, string $raza, string $fechaNacimiento, string $sexo, string $microchip, string $responsableId)
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->especie = $especie;
    $this->raza = $raza;
    $this->fechaNacimiento = $fechaNacimiento;
    $this->sexo = $sexo;
    $this->microchip = $microchip;
    $this->responsableId = $responsableId;
  }

  public function calcularEdad(): int
  {
    $fechaNacimiento = new DateTime($this->fechaNacimiento);
    $hoy = new DateTime();
    $edad = $hoy->diff($fechaNacimiento)->y;
    return $edad;
  }

  public function actualizarDatos(string $nombre, string $especie, string $raza, string $fechaNacimiento, string $sexo, string $microchip, string $responsableId): void
  {
    $this->nombre = $nombre;
    $this->especie = $especie;
    $this->raza = $raza;
    $this->fechaNacimiento = $fechaNacimiento;
    $this->sexo = $sexo;
    $this->microchip = $microchip;
    $this->responsableId = $responsableId;
  }

  public function resumen(): string
  {
    return "Paciente: {$this->nombre}, Especie: {$this->especie}, Raza: {$this->raza}, Edad: {$this->calcularEdad()} años, Sexo: {$this->sexo}, Microchip: {$this->microchip}";
  }
}