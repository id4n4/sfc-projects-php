<?php

function getInitials($name)
{
  $words = explode(" ", $name);
  $initials = "";

  foreach ($words as $word) {
    $initials .= strtoupper(substr($word, 0, 1));
  }

  return $initials;
}

function getToday()
{
  $today = date("d F Y");

  $months = [
    "January" => "enero",
    "February" => "febrero",
    "March" => "marzo",
    "April" => "abril",
    "May" => "mayo",
    "June" => "junio",
    "July" => "julio",
    "August" => "agosto",
    "September" => "septiembre",
    "October" => "octubre",
    "November" => "noviembre",
    "December" => "diciembre"
  ];

  $today = str_replace(array_keys($months), array_values($months), $today);

  return $today;
}