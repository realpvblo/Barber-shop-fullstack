<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'projekt');

// Check for a successful connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    // Get the form data
    $email = $db->real_escape_string($_POST['email']);
    $username = $db->real_escape_string($_POST['username']);
    $password = $db->real_escape_string($_POST['password']);

    // Insert the data into the database
    $query = "INSERT INTO users (email, username,password) VALUES ('$email', '$username','$password')";
    if ($db->query($query) === TRUE) {
        echo "Registration successful!";
        header("location: login.php");
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
}

?>



 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zarejestruj się</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Zarejestruj się</h2>
        <!-- Formularz rejestracji -->
        <form method="post" action="register.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
<input type="password" id="password" name="password" required>
    <input type="submit" name="submit" value="Register">
</form>
    </div>    
</body>
</html>
<?php

