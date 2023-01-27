<?php
$date = $_POST['date'];
$conn = mysqli_connect("loclhost", "root", "", "projekt");

// get all the time columns
$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'godziny_rezerwacji' AND COLUMN_NAME LIKE 'time_%'";
$result = mysqli_query($conn, $query);

$times = array();
while($row = mysqli_fetch_assoc($result)){
  $column_name = $row['COLUMN_NAME'];
  // check availability for each time column
  $check_query = "SELECT $column_name FROM godziny_rezerwacji WHERE date = '$date' AND $column_name IS NULL";
  $check_result = mysqli_query($conn, $check_query);
  if(mysqli_num_rows($check_result) > 0){
    // if the column is empty, add the column name to the list of available times
    $times[] = str_replace("time_", "", $column_name);
  }
}
// return the available times as a json object
echo json_encode($times);
?>