<?php

@include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'użytkownik już istnieje!';
   } else {

      if ($pass != $cpass) {
         $error[] = 'hasła nie są takie same!';
      } else {
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- Link to CSS -->
   <link rel="stylesheet" href="style.css">
   <!-- Box Icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- MDB -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
   <!-- MDB -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>

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
                     <a class="nav-link active" href="login_form.php">Zaloguj się</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="register_form.php">Stwórz konto</a>
                  </li>
               </ul>
            </form>
         </div>
      </div>
   </nav>

   <!-- Section: Design Block -->
   <section class="text-center text-lg-start">
      <style>
         .cascading-right {
            margin-right: -50px;
         }

         @media (max-width: 991.98px) {
            .cascading-right {
               margin-right: 0;
            }
         }
      </style>

      <div class="container py-4">
         <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
               <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">

                  <div class="card-body p-5 shadow-5 text-center">
                     <h2 class="fw-bold mb-5">Zarejestruj się</h2>

                     <form action="" method="post">
                        <?php
                        if (isset($error)) {
                           foreach ($error as $error) {
                              echo '<span class="error-msg">' . $error . '</span>';
                           };
                        };
                        ?>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="form-outline mb-4">
                           <div class="form-outline">
                              <input type="text" name="name" id="form3Example1" class="form-control" />
                              <label class="form-label" for="form3Example1">Imię</label>
                           </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                           <input type="email" name="email" id="form3Example3" class="form-control" />
                           <label class="form-label" for="form3Example3">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                           <input type="password" name="password" id="form3Example4" class="form-control" />
                           <label class="form-label" for="form3Example4">Hasło</label>
                        </div>

                        <!-- Confirm Password input -->
                        <div class="form-outline mb-4">
                           <input type="password" name="cpassword" id="form3Example4" class="form-control" />
                           <label class="form-label" for="form3Example4">Potwierdź Hasło</label>
                        </div>

                        <!-- Submit button -->
                        <!-- <button type="submit" class="btn btn-primary btn-block mb-4">
                           <input type="submit" name="submit" value="" class="form-btn">
                           Zarejestruj
                        </button> -->
                        
                        <input type="submit" name="submit" value="Zarejestruj" class="btn btn-primary btn-block mb-4">

                        <select name="user_type">
                           <option value="user">użytkownik</option>
                           <option value="admin">administrator</option>
                        </select>

                        <!-- Register Link -->
                        <p style="margin-top: 20px;">Posiadasz już konto? <a href="login_form.php">Zaloguj się</a></p>

                     </form>
                  </div>
               </div>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
               <img src="img/img/lambo_register2.jpg" class="w-100 rounded-4 shadow-4" alt="" />
            </div>
         </div>
      </div>
      <!-- Jumbotron -->
   </section>
   <!-- Section: Design Block -->
</body>

</html>