<?php
if(!isset($_POST["id"]) || empty(trim($_POST["id"])) ){
    $error_msg = "ID nije prosledjen";
    header("Location:./panel.php?panel=proizvodi&error=$error_msg");
    exit();
}

if(!isset($_POST["ime_proizvoda"]) || empty(trim($_POST["ime_proizvoda"])) ){
    $error_msg = "Ime proizvoda nije prosledjeno";
    header("Location:./panel.php?panel=proizvodi&error=$error_msg");
    exit();
}

if(!isset($_POST["cena_proizvoda"]) || empty(trim($_POST["cena_proizvoda"])) ){
    $error_msg = "Cena proizvoda nije prosledjeno";
    header("Location:./panel.php?panel=proizvodi&error=$error_msg");
    exit();
}

if(!isset($_POST["kolicina_proizvoda"]) || empty(trim($_POST["kolicina_proizvoda"])) ){
    $error_msg = "Kolicina proizvoda nije prosledjeno";
    header("Location:./panel.php?panel=proizvodi&error=$error_msg");
    exit();
}
require_once "../src/database.php";
$id = $_POST["id"];
$ime_proizvoda = $_POST["ime_proizvoda"];
$cena_proizvoda = $_POST["cena_proizvoda"];
$kolicina_proizvoda = $_POST["kolicina_proizvoda"];

$result = $db->query("UPDATE proizvodi SET ime_proizvoda='$ime_proizvoda',cena_proizvoda='$cena_proizvoda',kolicina_proizvoda='$kolicina_proizvoda' WHERE id='$id'");


if(!$result){
    $error_msg = "Molim vas pokusajte ponovo";
    header("Location:./panel.php?panel=proizvodi&error=$error_msg");
    exit();
}

    $msg = "Uspesno ste izmenili podatke";
    header("Location:./panel.php?panel=proizvodi&success=$msg");
    exit();



?>