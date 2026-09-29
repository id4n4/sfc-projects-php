<?php
session_start();
function requireLogin()
{
  if (!isset($_SESSION["isLogin"])) {
    header("location: index.php");
    exit();
  }
}

function justAdmin()
{
  if ($_SESSION["userType"] !== 'admin') {
    header('location: index.php');
  }
}

function justEmployee()
{
  if ($_SESSION['userType'] !== 'empleado') {
    header('location: index.php');
    exit();
  }
}

function redirectIfLoggedIn()
{
  if (isset($_SESSION["isLogin"])) {
    if (isset($_SESSION["userType"]) && $_SESSION['userType'] === 'admin') {
      header("location: ./admin/dashboard.php");
    } else if (isset($_SESSION["userType"]) && $_SESSION["userType"] === 'empleado') {
      header('location: ./empleado/dashboard.php');
    }
    exit();
  }
}
