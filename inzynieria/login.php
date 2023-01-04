<?php
session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Retrieve the form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate the form data
  if (empty($username) || empty($password)) {
    $error = "Username or Password is invalid";
  } else {
    // Connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'projekt');

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 1) {
      // Start a new session and store the username in a session variable
      session_start();
      $_SESSION["loggedin"] = true;
      $_SESSION["username"] = $username; 
      header("location: welcome.php");
      
      
    } else {
      $error = "Username or Password is invalid";
    }
  }
}

?>

<!-- Display the login form -->
<form method="post" action="login.php">
  <label for="username">Username:</label><br>
  <input type="text" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" name="password"><br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<!-- Display an error message, if one exists -->
<?php if (isset($error)) { echo $error; } ?>
