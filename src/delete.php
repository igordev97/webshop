<?php
require_once "../src/database.php";

if(!isset($_POST["id"])){
    $msg = "Nismo pronasli proizvod sa tim id-jem";
    exit() ;
}

$id = $_POST["id"];

$result = $db->query("DELETE FROM proizvodi WHERE id='$id'");

if($result){
    $msg = "Uspespno ste izbrisali proizvod";
    header("Location:./panel.php?panel=proizvodi&success=$msg");
    exit() ;
}


?>