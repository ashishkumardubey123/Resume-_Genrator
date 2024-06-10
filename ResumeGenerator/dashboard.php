<?php
include 'config.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
$email = $_SESSION['email'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <style>
        .fw-b{
            font-weight: 900;
        }
        body{
            background-image: url('./image/dashboard1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            background-position: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info ">
  <div class="container">
    <a class="navbar-brand text-light fw-b" href="#">Resume Generator</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto ">
        <li class="nav-item">
          <a class="active fw-b btn btn-outline-danger" aria-current="page" href="./dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-b" href="./addInformation.php">Add Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-b" href="./viewInformation.php?page=1">View Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-b" href="./editInformation.php?page=1">Edit Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-b" href="./deleteInformation.php?page=1">Delete Information</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="./logout.php" class="btn btn-danger">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<h1 class="text-center fw-b my-3">Dashboard</h1>
<div class="container my-4">
    <div class="row text-center">
        <div class="col-md-6 col-lg-3 mb-4">
            <a href="./addInformation.php" class="btn btn-light w-100 p-3 border border-danger"><i class="fa-solid btn btn-danger h3 fa-plus"></i>&nbsp;Add Information</a>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <a href="./viewInformation.php?page=1" class="btn btn-light w-100 p-3 border border-danger"><i class="fa-solid h3 btn btn-danger fa-eye"></i>&nbsp;View Information</a>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <a href="./editInformation.php?page=1" class="btn btn-light w-100 p-3 border border-danger"><i class="fa-solid h3 btn btn-danger fa-pencil"></i>&nbsp;Edit Information</a>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <a href="./deleteInformation.php?page=1" class="btn btn-light w-100 p-3 border border-danger"><i class="fa-solid h3 btn btn-danger fa-trash"></i>&nbsp;Delete Information</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
