<?php
    require_once "./src/database.php";
    require_once "./src/load_session.php";
    require_once "./src/proizvod.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$proizvod["ime_proizvoda"]?></title>
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
                    <div class="collapse navbar-collapse d-flex justify-content-evenly" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Pocetna</a>
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
                        <input class="form-control me-2" type="search" name="pretraga" placeholder="Pretrazi proizvod" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Pretraga</button>
                    </form>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5">

                        <?php if(!isset($_SESSION["korisnik"])):?>
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
                            <a href="./korpa.php" class="nav-link cart"><img src="./svg_icons/cart.svg" alt="" class="icon"> Korpa</a>
                        </li>
                        <?php endif;?>

                        <?php if(isset($_SESSION["korisnik"]) && $_SESSION["korisnik"] == 'admin'):?>
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./admin_panel/panel.php">Admin Panel</a>
                        </li>
                        <?php endif;?>
                    </ul>
                    </div>
                    
                    
                </div>
            </nav>


            <div class="container">
                <div class="row">
                  <div class="col-8 mx-auto d-flex justify-content-center align-items-center p-5 gap-3">
                            <div class="col-4">
                                <img src="./products_img/<?=$proizvod["slika_proizvoda"]?>" alt="" class="img-fluid">
                            </div>
                            <div class="col-8">
                                <h1><?=$proizvod["ime_proizvoda"]?></h1>
                                <p class="p-5 lead"><?=$proizvod["opis_proizvoda"]?></p>
                                <p class="text-info">Na stanju: <?=$proizvod["kolicina_proizvoda"]?> komada</p>
                                <h5>Cena: <?=$proizvod["cena_proizvoda"]?> RSD</h5>
                                <p>Kategorija: <a href="./kategorija.php?kategorija=<?=$proizvod["kategorija_proizvoda"]?>"><?=$proizvod["kategorija_proizvoda"]?></a></p>
                                <form action="./src/dodaj_u_korpu.php" method="post">
                                    <input type="hidden" name="id" value="<?=$proizvod["id"]?>">
                                    <input type="number" name="kolicina_proizvoda" min="1" value="1">
                                        <button class="btn btn-primary">Dodaj u Korpu</button>
                                    </form>
                            </div>
                  </div>
                </div>
            </div>



    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="./js/app.css"></script>
</body>
</html>