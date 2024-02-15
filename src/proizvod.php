<?php
if(!isset($_GET["id"]) || empty(trim($_GET["id"]))){
    die("Stranica ne postoji");
}  
$id = $_GET["id"];
$result = $db->query("SELECT * FROM proizvodi WHERE id='$id'");
if(!$result->num_rows > 0){
    die("Nismo pronasli proizvod u bazi");
}
$proizvod = $result->fetch_assoc();

?>