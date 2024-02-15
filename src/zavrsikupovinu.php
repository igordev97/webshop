<?php
$result = $db->query("SELECT * FROM korpa ");

if( $result->num_rows > 0){
    $dbProizvodi = $db->query("SELECT * FROM proizvodi")->fetch_all(MYSQLI_ASSOC);
    
    $korpa = $result->fetch_all(MYSQLI_ASSOC);
    foreach($korpa as $moja_korpa){
        $korpa_proizvod_id = $moja_korpa["id_proizvod"];
        $korpa_proizvod_kolicina  = $moja_korpa["kolicina_proizvod"];
        foreach($dbProizvodi as $proizvod){
            if($proizvod["id"] == $korpa_proizvod_id){
               $kolicina =  $proizvod["kolicina_proizvoda"]- $korpa_proizvod_kolicina;
                $db->query("UPDATE proizvodi SET kolicina_proizvoda='$kolicina' WHERE id='$korpa_proizvod_id'");
            }
        }
    }
        
}



$db->query("DELETE FROM korpa");

?>