<?php
require_once "../src/database.php";

if(!isset($_POST["id_korpa"])){
    $msg = "Nismo pronasli proizvod sa tim id-jem";
    exit() ;
}

$id = $_POST["id_korpa"];

$result = $db->query("DELETE FROM korpa WHERE id='$id'");

if($result){
    header("Location:../korpa.php");
    exit() ;
}


?>