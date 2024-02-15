<?php
require_once "./database.php";

if(!isset($_POST["id"])){
    $msg = "Nismo pronasli proizvod sa tim id-jem";
    exit() ;
}

$id = $_POST["id"];

$result = $db->query("DELETE FROM korpa WHERE id='$id'");

if($result){
    header("Location:../korpa.php");
    exit() ;
}


?>