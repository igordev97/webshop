<?php
$pretraga = $_GET["pretraga"];
$result = $db->query("SELECT * FROM proizvodi WHERE ime_proizvoda LIKE '%$pretraga%' OR opis_proizvoda LIKE '%$pretraga%' OR kategorija_proizvoda LIKE '%$pretraga%'");

if($result){
    $proizvodi = $result->fetch_all(MYSQLI_ASSOC);
}

?>