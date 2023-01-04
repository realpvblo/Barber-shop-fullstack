<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EraFresh - Barbershop</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link to CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Google Fonts & Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
<a class="aEraFreshLogo" href=""><img class="eraFreshLogo" src="Bootstrap\assets\img\logoERAfresh.png" alt=""></a>
                <a class="navbar-brand fw-bold" href="index.php">ERA Fresh</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<style>
      body {
        background-image: url('https://images.unsplash.com/photo-1634449571010-02389ed0f9b0?ixlib=rb-4.0.3&ixid=mnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80&fbclid=IwAR3ridpkd3SJg01b6mUk0ylka86dD8rcTFYo8AjQmP-8mX5QZpfoBvDd39E');
        background-size: cover;
        background-repeat: no-repeat;
        
      }
    </style>
  </head>
  <body>
    <!-- Your content goes here -->
  </body>
<form id="reservation-form" method="POST">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="phone">Phone:</label><br>
  <input type="tel" id="phone" name="phone" required><br>
  <label for="service">Service:</label><br>
  <select id="service" name="service" required>
  <option value="haircut">buzzcut</option>
    <option value="beard-trim">quiff</option>
    <option value="haircut-and-beard-trim">combo(włosy + broda)</option>
  </select><br>
  <label for="fryzjerzy">Fryzjerzy:</label><br>
  <select id="fryzjerzy" name="fryzjerzy" required>
  <option value="Paweł">Paweł</option>
    <option value="Mateusz">Mateusz</option>
  </select><br>
  <label for="date">Date:</label><br>
  <input type="date" id="date" name="date" required><br>
  <label for="time">Time:</label><br>
  <input type="time" id="time" name="time" required><br>
  <input type="submit" value="Make Reservation">
</form>
</body>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $service = $_POST['service'];
  $fryzjerzy = $_POST['fryzjerzy'];
  $date = $_POST['date'];
  $time = $_POST['time'];

  // validate form data
  if (empty($name) || empty($email) || empty($phone) || empty($service) || empty($date) || empty($time) || empty($fryzjerzy)) {
    $error = 'All fields are required';
  } else {
    // connect to database
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "projekt";

    // create connection
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // insert reservation into database
    $sql = "INSERT INTO rezerwacje (name, email, phone, service, date, time, fryzjerzy) VALUES ('$name', '$email', '$phone', '$service', '$date', '$time', '$fryzjerzy')";

    if (mysqli_query($conn, $sql)) {
      $success = "Reservation made successfully";
    } else {
      $error = "Error: " . $sql . " " . mysqli_error($conn);
    }

    // close connection
    mysqli_close($conn);
  }
}

?>