<?php
class Task
{
  public string $status;

  public function __construct(
    public string $id,
    public string $idProject,
    public string $name,
    public string $description,
    public string $startDate,
    public string $endDate
  ) {
    $this->status = $this->getStatus();
  }

  public function getStatus(): string
  {
    $currentDate = new DateTime();
    $startDate = new DateTime($this->startDate);
    $endDate = new DateTime($this->endDate);

    if ($currentDate > $endDate) return 'cerrada';
    else if ($currentDate > $startDate) return 'en progreso';
    else return 'pendiente';
  }
}
