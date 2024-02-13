<?php
require_once "../src/database.php";
require_once "../src/load_session.php";
require_once "../src/ucitajproizvode.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./svg_icons/shop.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
            <?php if(isset($_SESSION["korisnik"]) && $_SESSION["korisnik"] == 'admin'):?>
                <nav class="navbar navbar-expand-lg bg-dark">
                    <div class="container-fluid">
                    <h3 class="navbar-brand text-light">Admin Panel</h3>
                    <a class="nav-link" aria-current="page" href="../">Vrati se nazad</a>
                    </div>
                </nav>
                <div class="container-fluid vh-100 p-0 d-flex">
                    <div class="col-2 bg-dark vh-100">
                        <ul class="admin-menu">
                            <li>
                                <a href="./panel.php?panel=proizvodi" class="nav-link text-light">Proizvodi</a>
                            </li>

                            <li>
                            <a href="./panel.php?panel=dodaj_proizvod" class="nav-link text-light">Dodaj proizvod</a>
                            </li>
                            
                            <hr>
                        </ul>
                    </div> 
                    <div class="col-9 vh-100 mx-auto" id="lista-proizvoda">
                    <?php if(isset($_GET["panel"])  && $_GET["panel"] == "proizvodi"):?>

                        <?php if(isset($_GET["success"])):?>
                            <p class="text-success"><?=$_GET["success"]?></p>
                         <?php endif;?>
                         <?php if(isset($_GET["error"])):?>
                            <p class="text-danger"><?=$_GET["error"]?></p>
                            <?php endif;?>
                            
                            <?php if(empty($proizvodi)):?>
                                <p class="text-warning">Trenutno nemate proizvode na sajtu</p>
                            <?php else:?>
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Slika</th>
                                    <th>ID</th>
                                    <th>Ime</th>
                                    <th>Cena</th>
                                    <th>Kolicina</th>
                                    <th></th>
                                    <th></th>


                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($proizvodi as $proizvod):?>
                            <tr>
                                <form action="./update.php" method="post">
                                <td><img src="../products_img/<?=$proizvod["slika_proizvoda"]?>" alt="" width="30px"></td>

                                <td><input type="hidden" name="id" value="<?=$proizvod["id"]?>"><?=$proizvod["id"]?></td>

                                <td><input type="text" name="ime_proizvoda" value="<?=$proizvod["ime_proizvoda"]?>"></td>

                                <td><input type="number" name="cena_proizvoda" value="<?=$proizvod["cena_proizvoda"]?>"></td>
                                <td><input type="number" name="kolicina_proizvoda" value="<?=$proizvod["kolicina_proizvoda"]?>"></td>
                                <td><button class="btn btn-warning">Update</button> </td>
                                </form>
                                <td>
                                    <form action="./delete.php" method="post">
                                    <input type="hidden" name="id" value="<?=$proizvod["id"]?>">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>


                                
                            <?php endforeach;?> 
                            

                        </tbody>
                        </table>
                          
                        <?php endif;?> 
                   <?php endif;?>   


                   <?php if(isset($_GET["panel"])  && $_GET["panel"] == "dodaj_proizvod"):?>
                     
                           <div class="container">
                            <div class="row mt-5">
                                <div class="col-6 mx-auto">
                                    <h1 class="text-center">Dodavanje proizvoda</h1>
                                    <form action="./dodajproizvod.php" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group my-3">
                                        <label for="ime_proizvoda" class="form-label">Naslov proizvoda:</label>
                                        <input type="text" name="ime_proizvoda" class="form-control">
                                    </div>

                                    <div class="form-group my-3">
                                        <label for="opis_proizvoda" class="form-label">Opis</label>                               
                                        <div class="form-floating">
                                            <textarea name="opis_proizvoda" class="form-control" placeholder="Opis" id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Unesite opis proizvodaxv </label>
                                        </div>
                                    </div>

                                    <div class="form-group my-3">
                                        <label for="cena_proizvoda" class="form-label">Cena proizvoda</label>      
                                        <div class="form-floating">                         
                                        <input type="number" name="cena_proizvoda" class="form-control" id="floatingTextare3" >
                                        <label for="floatingTextare3">RSD</label>
                                     </div>
                                    </div>

                                    <div class="form-group my-3">
                                        <label for="kolicina_proizvoda" class="form-label">Kolicina:</label>
                                        <input type="number" name="kolicina_proizvoda" class="form-control">
                                    </div>

                                    <div class="form-group my-3">
                                        <label for="kategorija_proizvoda" class="form-label">Kategorija:</label>
                                        <select name="kategorija_proizvoda" id="kategorija_proizvoda" class="form-select">
                                            <option value="procesori">Procesori</option>
                                            <option value="maticne_ploce">Maticne ploze</option>
                                            <option value="graficke">Graficke kartice</option>
                                            <option value="ram_memorije">Ram Memorije</option>
                                            <option value="ssd">SSD / HDD</option>
                                            <option value="napajanje">Napajanje</option>
                                            <option value="kucista">Kucista</option>
                                        </select>
                                    </div>

                                    <div class="form-group my-3">
                                        <label for="fileToUpload" class="form-label">Slika Proizvoda: </label>
                                        <input type="file" name="fileToUpload">
                                    </div>


                                    <button class="btn btn-primary">Ubaci proizvod</button>
                
                                    </form>
                                    <?php if(isset($_GET['error_message'])) :?>
                                        <p class="text-danger"><?=$_GET['error_message']?></p>
                                    <?php endif;?>    
                                    <?php if(isset($_GET['success_message'])) :?>
                                        <p class="text-success"><?=$_GET['success_message']?></p>
                                    <?php endif;?>    
                                </div>
                            </div>
                           </div>
               
                   <?php endif;?>
                    </div>

                </div>







                

            <?php else:?>    
                <div class="container">
                <div class="row">
                    <div class="col-6 mx-auto">
                        <h1 class="text-danger">MORATE BITI ULOGOVANI KAO ADMIN</h1>
                    </div>
                </div>
            </div>  
            <?php endif;?>

            

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="./js/app.css"></script>
</body>
</html>