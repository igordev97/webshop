<?php
require_once "./database.php";
    if(!isset($_POST["id_korpa"]) || empty(trim($_POST["id_korpa"]))) {
        $error= "Doslo je do greske 1";
         header("Location:../korpa.php?error=$error");
        exit();
    }

    if(!isset($_POST["kolicina_proizvod"]) || empty(trim($_POST["kolicina_proizvod"]))) {
        $error= "Doslo je do greske 2";
         header("Location:../korpa.php?error=$error");
        exit();
    }
    if(!isset($_POST["id_proizvod"]) || empty(trim($_POST["id_proizvod"]))) {
        $error= "Doslo je do greske 2";
         header("Location:../korpa.php?error=$error");
        exit();
    }



    $korpaId = $_POST["id_korpa"];
    $novaKolicina = $_POST["kolicina_proizvod"];
    $proizvodId = $_POST["id_proizvod"];

    $result = $db->query("SELECT * FROM proizvodi WHERE id='$proizvodId'");

    if($result->num_rows == 0) {
        $error= "Doslo je do greske";
        header("Location:../korpa.php?error=$error");
       exit();
    }

    $proizvod = $result->fetch_assoc();
    $novaCena = $proizvod["cena_proizvoda"] * $novaKolicina;

    $result = $db->query("SELECT * FROM korpa WHERE id='$korpaId'");
    if($result->num_rows == 0) {
        $error= "Doslo je do greske";
         header("Location:../korpa.php?error=$error");
        exit();
    }
    
    $result = $db->query("UPDATE korpa SET kolicina_proizvod='$novaKolicina',cena_proizvod='$novaCena' WHERE id='$korpaId'");

    if(!$result){
    $error= "Doslo je do greske";
         header("Location:../korpa.php?error=$error");
        exit();
}
header("Location:../korpa.php");


    

?>