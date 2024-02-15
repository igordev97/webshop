<?php


require_once "./database.php";
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

if(!isset($_POST["kolicina_proizvoda"]) || empty(trim($_POST["kolicina_proizvoda"]))){
    die("Doslo je do greske kolicina proizvoda");
}
 if(!isset($_POST["id"]) || empty(trim($_POST["id"]))){
     die("Doslo je do greske");
 }
 $id = $_POST["id"];

 $result = $db->query("SELECT * FROM proizvodi WHERE id='$id'");
 if($result->num_rows == 0){
    header("Location:../korpa.php");
    exit();
 }
 $proizvod = $result->fetch_assoc();

 $korisnik = $_SESSION["korisnik"];
 $result = $db->query("SELECT * FROM users WHERE korisnicko_ime = '$korisnik'");

 if($result->num_rows == 0){
    header("Location:../korpa.php");
    exit();
 }

 $user = $result->fetch_assoc();

 $id_korisnika = $user["id"];
 $db->real_escape_string($id_korisnika);

$id_proizvod = $proizvod["id"];
$db->real_escape_string($id_proizvod);

$ime_proizvod = $proizvod["ime_proizvoda"];
$db->real_escape_string($ime_proizvod);

$kolicina_proizvoda = $_POST["kolicina_proizvoda"];


$cena = $proizvod["cena_proizvoda"]*$kolicina_proizvoda;

$slika_proizvod = $proizvod["slika_proizvoda"];

$result = $db->query("SELECT * FROM korpa WHERE id_korisnik='$id_korisnika' AND id_proizvod='$id_proizvod'");


if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $kolicina_proizvoda = $row["kolicina_proizvod"]+1;
    $ukupnaCena = $cena * $kolicina_proizvoda;
    $result = $db->query("UPDATE korpa SET kolicina_proizvod='$kolicina_proizvoda',cena_proizvod='$ukupnaCena' WHERE id='$id'");

}
else{
    $result = $db->query("INSERT INTO korpa (id_korisnik,id_proizvod,ime_proizvod,kolicina_proizvod,cena_proizvod,slika_proizvod) VALUES ('$id_korisnika','$id_proizvod','$ime_proizvod','$kolicina_proizvoda','$cena','$slika_proizvod')");

}




 
if(!$result){
    $error = "Doslo je do greske pokusajte ponovo";
    header("Location:../korpa.php?error=$error");
    exit();
}
header("Location:../korpa.php");
exit();



?>




