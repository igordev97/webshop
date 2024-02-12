<?php
    require_once "../src/database.php";
    
    $ime_proizvoda = $_POST['ime_proizvoda'];
    $opis_proizvoda = $_POST['opis_proizvoda'];
    $cena_proizvoda = $_POST['cena_proizvoda'];
    $kolicina_proizvoda = $_POST['kolicina_proizvoda'];
    $kategorja_proizvoda = $_POST['kategorija_proizvoda'];
    $fileName = $_FILES['fileToUpload']["name"];
    $fileTmp = $_FILES['fileToUpload']["tmp_name"];

    $fileRoot = "../products_img/".$fileName;
    move_uploaded_file($fileTmp, $fileRoot);


    $result = $db->query("INSERT INTO proizvodi (ime_proizvoda,opis_proizvoda,cena_proizvoda,kolicina_proizvoda,kategorija_proizvoda,slika_proizvoda) VALUES ('$ime_proizvoda','$opis_proizvoda','$cena_proizvoda','$kolicina_proizvoda','$kategorja_proizvoda','$fileName')");


    if(!$result){
        $error_message = "Proizvod nije dodat u bazu";
        header("Location:./panel.php?panel=dodaj_proizvod&error_message=$error_message");
    }
    else{
        $success_message = "Uspesno ste dodali proizvod u korpu";
        header("Location:./panel.php?panel=dodaj_proizvod&success_message=$success_message");
    }

?>