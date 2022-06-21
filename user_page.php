<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Strona Użytkownika</title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!-- Link to CSS -->
   <link rel="stylesheet" href="style.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
         <a class="navbar-brand" href="index.php">
            <img src="img/logoCarWash.png" alt="" width="30" height="24">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Strona Główna</a>
               </li>
            </ul>
            <form class="d-flex">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link active" href="logout.php">Wyloguj się</a>
                  </li>
               </ul>
            </form>
         </div>
      </div>
   </nav>

<div class="container">

   <div class="content">
      <h3>cześć, <span>użytkowniku</span></h3>
      <h1>Witaj <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>to jest strona użytkownika</p>
      <a href="login_form.php" class="btn">Zaloguj</a>
      <a href="register_form.php" class="btn">Zarejestruj</a>
      <a href="logout.php" class="btn">Wyloguj</a>
   </div>

</div>

</body>
</html>