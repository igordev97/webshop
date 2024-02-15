<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

$korisnicko_ime = $_SESSION["korisnik"];

$result = $db->query("SELECT * FROM users WHERE korisnicko_ime = '$korisnicko_ime'");
if($result->num_rows > 0){
    $korisnik = $result->fetch_assoc();
    $id_korisnika = $korisnik["id"];
}

$result = $db->query("SELECT * FROM korpa WHERE id_korisnik = '$id_korisnika'");

$proizvodi = $result->fetch_all(MYSQLI_ASSOC);
$ukupna_cena = 0;

foreach($proizvodi as $proizvod){
    $ukupna_cena+= $proizvod["cena_proizvod"];
}






?>