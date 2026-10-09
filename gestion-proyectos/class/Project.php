<?php
class Project
{

  public function __construct(
    public string $name,
    public string $description,
    public string $client,
    public string $status,
  ) {}
}
