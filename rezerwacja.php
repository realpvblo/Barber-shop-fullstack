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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="Bootstrap\css\styles.css">
    <link rel="icon" type="image/x-icon" href="Bootstrap/assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="aEraFreshLogo" href="index.php"><img class="eraFreshLogo"
                    src="Bootstrap\assets\img\logoERAfresh.png" alt=""></a>
            <a class="navbar-brand fw-bold" href="index.php">ERA Fresh</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3" href="login.php">Zaloguj się</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="register.php">Stwórz konto</a></li>
                </ul>
                <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal"
                    data-bs-target="#feedbackModal">
                    <span class="d-flex align-items-center">
                        <a href="rezerwacja.php">
                            <i class="bi-chat-text-fill me-2"></i>
                            <span class="small">Umów wizytę</span></a>
                    </span>
                </button>
            </div>
        </div>
    </nav>

    <link rel="stylesheet" href="style-rezerwacja.css">

    <!-- Your content goes here -->

    <div class="hero-image">
        <div class="hero-text">
            <h1>Zerezerwuj wizytę</h1>
        </div>
    </div>

    <form id="reservation-form" method="POST">
        <label for="name">Imię:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Telefon:</label><br>
        <input type="tel" id="phone" name="phone" required><br>
        <label for="service">Usługa:</label><br>
        <select id="service" name="service" required>
            <option value="haircut">Strzyżenie włosów - 70zł</option>
            <option value="beard-trim">Strzyżenie brody - 50zł</option>
            <option value="haircut-and-beard-trim">Combo (włosy + broda) - 100zł</option>
        </select><br>
        <label for="fryzjerzy">Fryzjerzy:</label><br>
        <select id="fryzjerzy" name="fryzjerzy" required>
            <option value="Paweł">Paweł</option>
            <option value="Mateusz">Mateusz</option>
        </select><br>
        <label for="date">Data:</label><br>
        <input type="date" id="date" name="date" required min="<?php echo date("Y-m-d")?>" max="2024-12-31"
            onchange="checkDate()">
        <select id="godzina" name="godzina" required>
            <option value="10">10</option>
            <option value="11">11</option>
        </select><br>

        <input type="submit" value="Zarezerwuj wizytę">
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
  $time = $_POST['godzina'];
  

  // validate form data
  if (empty($name) || empty($email) || empty($phone) || empty($service) || empty($date) || empty($time) || empty($fryzjerzy)) {
    $error = 'All fields are required';
  } else {
    // connect to database
    $host = "localhost";
    $user = "root";
    $password = "root";
    $dbname = "projekt";

    // create connection
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // insert reservation into database
    
    $sql = "INSERT INTO rezerwacje (name, email, phone, service, date, time, fryzjerzy) VALUES ('$name', '$email', '$phone', '$service', '$date', '$time', '$fryzjerzy')";
    $col_name = "time_$time";
      $query = "INSERT INTO godziny_rezerwacji(email, data, $col_name)
      VALUES ('$email','$date','$time')";
      $result = mysqli_query($conn, $query);
    
   


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
<script>
function checkDate() {
    var selectedDate = new Date(document.getElementById("date").value);
    var today = new Date();
    if (selectedDate < today) {
        alert("You cannot select a date in the past!");
        document.getElementById("date").value = "";
    }
}
</script>
<script>
$(function() {
    $("#date").datepicker();
});
</script>