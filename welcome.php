<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
    
}
$email = $_SESSION['email'];
$username = $_SESSION['username'];

  
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-rezerwacja.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="Bootstrap/css/styles.css" rel="stylesheet" />
    <style>
    body {
        font: 14px sans-serif;
        text-align: center;
        color: black;
    }
    </style>
</head>

<body>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="aEraFreshLogo" href=""><img class="eraFreshLogo" src="Bootstrap\assets\img\logoERAfresh.png"
                    alt=""></a>
            <a class="navbar-brand fw-bold" href="#page-top">ERA Fresh</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <!-- <li class="nav-item"><a class="nav-link me-lg-3" href="login.php">Zaloguj się</a></li> -->

                    <li class="nav-item"><a href="rezerwacja.php" class="nav-link me-lg-3">Umów wizytę</a></li>
                    <li class="nav-item"><a href="usunrezerwacje.php" class="nav-link me-lg-3">Anuluj wizytę</a></li>
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal"
                        data-bs-target="#feedbackModal">
                        <span class="d-flex align-items-center">
                            <a href="logout.php">
                                <span class="small">Wyloguj się</span></a>
                        </span>
                    </button>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-image3">
        <div class="hero-text">
            <h1>Witaj, <b><?php echo htmlspecialchars($username); ?></b>.</h1>
            <div id="current-time">
                <?php
        echo "Obecna godzina: ";
        ?>
                <p id="time"></p>
            </div>
        </div>
    </div>

    <button id="show-calendar-button">Wyświetl kalendarz</button>

    <script>
    setInterval(function() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        document.getElementById("time").innerHTML = hours + ":" + minutes + ":" + seconds;
    }, 1000);
    </script>
    </div>

    <button id="view-reservations-button">Wyświetl rezerwacje</button>
    <?php

  setlocale(LC_ALL, 'pl_PL', 'pl', 'Polish_Poland.28592');
  // Set the month and year to display
  $month = 1;
  $year = 2023;
  
  // Connect to the database
  $host = 'localhost';
  $user = 'root';
  $password = 'root';
  $dbname = 'projekt';
  $conn = mysqli_connect($host, $user, $password, $dbname);
  
  // Get the first day of the month
  $firstDay = mktime(0,0,0,$month,1,$year);
  
  // Get the month and year as text
  setlocale(LC_ALL, 'pl_PL', 'pl', 'Polish_Poland.28592');
  $monthName = strftime('%B',$firstDay);
  $yearName = date('Y',$firstDay);
  
  // Get the number of days in the month
  $numDays = date('t',$firstDay);
  
  // Get the index value (0-6) of the first day of the month
  $startDay = date('w',$firstDay);
  
  // Create the calendar
  echo "<style>
          table {
            width: 100%;
            border-collapse: collapse;
          }
          tr:nth-of-type(odd) {
            background: #e9ecef;
          }
          tr:nth-child(2){
            font-weight: bold;
          }
          td, th {
            text-align: center;
            padding: 1em;
          }
          th {
            background: linear-gradient(45deg, #2937f0, #9f1ae2) !important;
            color: white;
          }
          .today {
            background-color: yellow;
          }
          .booked {
            background-color: red;
          }
        </style>";
  echo "<table>";
  echo "<tr><th colspan='7'>$monthName $yearName</th></tr>";
  echo "<tr>";
  echo "<td>Niedziela</td><td>Poniedziałek</td><td>Wtorek</td><td>Środa</td><td>Czwartek</td><td>Piątek</td><td>Sobota</td>";
  echo "</tr>";
  
  // Create the days of the month
  $day = 1;
  while ($day <= $numDays) {
    echo "<tr>";
    for ($i=0; $i<7; $i++) {
      if ($day <= $numDays && ($i > $startDay || $day > 1)) {
        // Check if the day is booked
        $date = "$year-$month-$day";
        $sql = "SELECT * FROM rezerwacje WHERE date='$date'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          // If booked, highlight the cell
          echo "<td class='booked'>$day</td>";
        } else {
          // If today, highlight the cell
          if (date('Y-m-d') == "$year-$month-$day") {
            echo "<td class='today'>$day</td>";
          } else {
            echo "<td>$day</td>";
          }
        }
        $day++;
      } else {
        echo "<td>&nbsp;</td>";
      }
    }
    echo "</tr>";
  }
  echo "</table>";
?>

    <table id="reservations-table" style="display: none;">
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>E-mail</th>
            <th>Telefon</th>
            <th>Usługa</th>
            <th>Barber</th>
            <th>Data</th>
            <th>Godzina</th>
        </tr>
</body>

<?php
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

// Start session

  // Get the user's information from the database
  $query = "SELECT type FROM users WHERE email = '$email'";
  $result = $conn->query($query);

  // Fetch the user's data
  $user = $result->fetch_assoc();

  // Assign the type to a variable
  $user_type = $user['type'];

  // select all reservations from the database
  if($user_type == "admin"){
      $sql = "SELECT * FROM rezerwacje";
  }
  elseif($user_type == "user"){
      $sql = "SELECT * FROM rezerwacje WHERE email = '$email'";
  }
  $result = mysqli_query($conn, $sql);
 
  // output data of each row
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
              <td>" . $row["id"]. "</td>
              <td>" . $row["name"]. "</td>
              <td>" . $row["email"]. "</td>
              <td>" . $row["phone"]. "</td>
              <td>" . $row["service"]. "</td>
              <td>" . $row["fryzjerzy"]. "</td>
              <td>" . $row["date"]. "</td>
              <td>" . $row["time"]. "</td>
            </tr>";
    }
    
  } else {
    echo "Brak rezerwacji";
  }

// close connection
mysqli_close($conn);
?>

</table>
<script>
document.getElementById("view-reservations-button").addEventListener("click", function() {
    document.getElementById("reservations-table").style.display = "table";
});
</script>

</body>

</html>