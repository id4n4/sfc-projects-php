<?php
session_start();


function requireLogin()
{
  if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
    exit;
  }
}

function redirectIfLoggedIn()
{
  if (isset($_SESSION['user_id'])) {
    header('location: projects.php');
    exit;
  }
}
