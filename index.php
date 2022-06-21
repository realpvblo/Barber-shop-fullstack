<?php

@include 'config.php';

if(isset($_POST['submit2'])){

   $location = ($_POST['location']);
   $date = ($_POST['date']);

    $insert = "INSERT INTO rezerwacja(location, date) VALUES('$location','$date')";
    mysqli_query($conn, $insert);
    header('location:login_form.php');

};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myjnia Samochodowa</title>
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
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logoCarWash.png" alt="" width="30" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#glowna">Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jakdzialamy">Jak Działamy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#uslugi">Usługi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#efekty">Efekty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#onas">O Nas</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"></li>
                        <a href="" class="material-symbols-outlined">
                        
                        </a>
                        </li>
                        <li class="nav-item">
                            <a id="userlink" class="nav-link active" href="login_form.php">Zaloguj się</a>
                        </li>
                        <li class="nav-item">
                            <a id="singoutlink" class="nav-link active" href="register_form.php">Stwórz konto</a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>

    <!-- Główna -->
    <section class="glowna" id="glowna">
        <div class="text">
            <svg class="blob" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#C4DDFF"
                    d="M16.9,-22.2C24,-9.7,33.5,-4.9,34.7,1.3C36,7.4,29.1,14.8,21.9,28.7C14.8,42.7,7.4,63.1,-3.8,66.9C-15,70.7,-30,57.8,-43.2,43.9C-56.4,30,-67.8,15,-68.2,-0.5C-68.7,-15.9,-58.2,-31.8,-45,-44.3C-31.8,-56.7,-15.9,-65.6,-5.5,-60.1C4.9,-54.5,9.7,-34.6,16.9,-22.2Z"
                    transform="translate(100 100)" />
            </svg>
            <h1><span>Najlepsza</span><br>myjnia samochodowa</h1>
            <p>Najwyższej jakości produkty, które działają, zapewniają serwis i wsparcie, którym możesz zaufać <br>i na
                których możesz polegać, wraz z cenami, które zapewniają konkurencyjność.</p>

        </div>

    </section>

    <div class="form-container">
        <form action="" method="post">
            <div class="input-box">
                <span>Lokalizacja</span>
                <input type="text" name="location" id="" placeholder="Search Places">
            </div>
            <div class="input-box">
                <span>Termin</span>
                <input type="date" name="date" id="">
            </div>
            <input type="submit" name="submit2" value="Zarezerwuj" class="btn">
        </form>
    </div>

    <!-- Jak Działamy -->
    <section class="jakdzialamy" id="jakdzialamy">
        <div class="heading">
            <span>Zobacz jak to działa</span>
            <h1>Zarezerwuj Mycie Samochodu</h1>
        </div>
        <div class="ride-container">
            <div class="box">
                <i class='bx bx-map-pin'></i>
                <h2>Wybierz lokalizację</h2>
                <!-- <p>Wybierz miejscowość, w której<br>chcesz umówić się na mycie auta</p> -->
                <p></p>
            </div>

            <div class="box">
                <i class='bx bx-calendar-star'></i>
                <h2>Ustal Datę</h2>
                <!-- <p>Wybierz odpowiadającą<br>dla siebie datę odbioru</p> -->
                <p></p>
            </div>

            <div class="box">
                <i class='bx bx-car'></i>
                <h2>Przywieź Samochód</h2>
                <!-- <p>Przywieź nam samochód,<br>a my zajmiemy się resztą</p> -->
                <p></p>
            </div>
        </div>
    </section>

    <!-- Usługi -->
    <section class="uslugi" id="uslugi">
        <div class="heading">
            <span>Nasze usługi</span>
            <h1>Najlepsza Oferta <br> Dla Twojego Samochodu</h1>
        </div>
        <div class="services-container">
            <div class="box">
                <div class="box-img">
                    <img src="img/img/car1.jpg" alt="">
                </div>
                <h3>MYCIE AKTYWNĄ PIANĄ</h3>
                <p>Aktywną pianę uznaje się za skuteczny środek do bezdotykowego czyszczenia pojazdów.</p>
                <h2>100 zł</h2>
                <a href="#" class="btn">Zarezerwuj</a>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/img/car2.jpg" alt="">
                </div>
                <h3>POLEROWANIE</h3>
                <p>Obróbka wykańczająca, która ma na celu uzyskanie żądanej gładkości i połysku powierzchni.</p>
                <h2>300 zł</h2>
                <a href="#" class="btn">Zarezerwuj</a>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="img/img/car3.png" alt="">
                </div>
                <h3>WOSKOWANIE</h3>
                <p>Wosk to idealny środek do nabłyszczania lakieru, który jednocześnie zabezpiecza karoserię auta.</p>
                <h2>500 zł</h2>
                <a href="#" class="btn">Zarezerwuj</a>
            </div>
        </div>
    </section>

    <!-- Efekty -->
    <section class="efekty" id="efekty">
        <div class="heading" style="margin-bottom: 20px;">
            <span>Nasze Efekty</span>
            <h1>Tylko U Nas</h1>
        </div>
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-f3a1f678-1710-46ac-9468-a530238f9f4a"></div>
    </section>

    <!-- O Nas -->
    <section class="onas" id="onas">
        <div class="heading">
            <span>O Nas</span>
            <h1>Najlepsza Obsługa Klienta</h1>
        </div>
        <div class="onas-container">
            <div class="onas-img">
                <img src="img/img/about.png" alt="">
            </div>
            <div class="onas-text">
                <span>O Nas</span>
                <p>Wyróżnia nas to, że jesteśmy myjnią serwisową „Flex”. Oznacza to dla Ciebie, że jesteśmy jedyną
                    myjnią, jakiej będziesz potrzebować. Nasze podejście łączy najnowszą technologię myjni samochodowych
                    z ludzkim dotykiem, aby zapewnić jak najlepsze wrażenia z mycia samochodu.</p>
                <p>Wierzymy, że zadowolenie klienta jest najwyższym priorytetem. Jesteśmy właścicielami pojazdów tak jak
                    Ty i rozumiemy, że powierzenie swojego pojazdu komuś innemu może być stresującym doświadczeniem. U
                    nas możesz mieć pewność, że potraktujemy Twój pojazd jak własny. Myjemy jeden pojazd na raz, dzięki
                    czemu możemy mieć pewność, że każdy pojazd otrzyma najlepszą możliwą pielęgnację.</p>
                <a href="#" class="btn">Dowiedz się więcej</a>
            </div>
        </div>
    </section>

    <!-- Our script must be loaded after firebase references -->
    <script src="main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>