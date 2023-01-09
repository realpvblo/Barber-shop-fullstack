<?php
  // Set the month and year to display
  $month = 1;
  $year = 2023;
  
  // Connect to the database
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $dbname = 'projekt';
  $conn = mysqli_connect($host, $user, $password, $dbname);
  
  // Get the first day of the month
  $firstDay = mktime(0,0,0,$month,1,$year);
  
  // Get the month and year as text
  $monthName = date('F',$firstDay);
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
          td, th {
            border: 1px solid black;
            text-align: center;
            padding: 0.5em;
          }
          th {
            background-color: lightgray;
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
  echo "<td>S</td><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td><td>S</td>";
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
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Service</th>
    <th>Barber</th>
    <th>Date</th>
    <th>Time</th>
  </tr>
</body>
  <?php
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

  // select all reservations from database
  $sql = "SELECT * FROM rezerwacje";
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
    echo "0 results";
  }


  // close connection
  mysqli_close($conn);

  ?>
</table>
<script>
            document.getElementById("view-reservations-button").addEventListener("click", function() {
                document.getElementById("reservations-table").style.display = "block";
              });
            </script>
</h2>
</body>
</html>