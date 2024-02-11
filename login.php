<?php
    require_once "./src/load_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GG Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./svg_icons/shop.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/app.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="./">GG Shop</a>
                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Pocetna</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategorije
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item" href="./kategorija.php?kategorija=procesori">Procesori</a></li>
                            <li><a class="dropdown-item" href="./kategorija.php?kategorija=maticne_ploce">Maticne Ploce</a></li>
                            <li><a class="dropdown-item" href="./kategorija.php?kategorija=graficke">Graficke Kartice</a></li>
                            <li><a class="dropdown-item" href="./kategorija.php?kategorija=ram_memorije">Ram Memorija</a></li>
                            <li><a class="dropdown-item" href="./kategorija.php?kategorija=ssd">SSD Diskovi</a></li>
                            <li><a class="dropdown-item" href="./kategorija.php?kategorija=napajanje">Napajanja</a></li>
                            <li><a class="dropdown-item" href="./kategorija.php?kategorija=kucista">Pc Kucista</a></li>

                           
                        </ul>
                        </li>
                        
                    </ul>
                    <form class="d-flex" role="search" method="get" action="./pretraga.php">
                        <input class="form-control me-2" type="search" placeholder="Pretrazi proizvod" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Pretraga</button>
                    </form>
               
                    </div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5">
                    <?php if(!isset($_SESSION['korisnik'])):?>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Uloguj se</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./registracija.php">Registruj se</a>
                    </li>
                    <?php else:?>
                        <li class="nav-item d-flex align-items-center">
                        <span><img src="./svg_icons/user.svg" class="icon" alt=""></span>
                        <span class="text-light mx-2"><?=$_SESSION["korisnik"]?></span>
                        <a class="nav-link mx-3" aria-current="page" href="./src/logout.php">Odjavi se </a>
                    </li>
                    <?php endif;?>
                    <?php if(isset($_SESSION["korisnik"]) && $_SESSION["korisnik"] == 'admin'):?>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./dodajproizvod.php">Dodaj Proizvod</a>
                    </li>
                    <?php endif;?>
                    </ul>
                </div>
            </nav>


            <div class="container">
        <div class="row vh-100 d-flex align-items-center">
            <div class="col-6 mx-auto">
                <h1 class="text-center mb-5">Uloguj se</h1>
                <form action="./src/login.php" method="post">
                    <div class="form-group my-3">
                        <label for="email" class="form-label">Vase Korisniko ime ili Email:</label>
                        <input type="text" name="email_korisnikco_ime" class="form-control">
                    </div>

                    <div class="form-group my-3">
                        <label for="lozinka" class="form-label">Vasa Lozinka:</label>
                        <input type="password" name="lozinka" class="form-control">
                    </div>
                    <button class="btn btn-primary">Uloguj se</button>
                </form>
                <?php if(isset($_GET["error"])):?>
                
                    <p class="text-danger"><?= $_GET["error"]?></p>
                <?php endif;?>

                <?php if(isset($_GET["success"])):?>
                
                <p class="text-success"><?= $_GET["success"]?></p>
            <?php endif;?>

            </div>
        </div>
    </div>




    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="./js/app.css"></script>
</body>
</html>