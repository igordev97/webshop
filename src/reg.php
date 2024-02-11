<?php

if(!isset($_POST["korisnicko_ime"]) || empty(trim($_POST["korisnicko_ime"]))){
    $error = "Niste uneli korisnicko ime";
    header("Location:../registracija.php?error=$error");
    exit();
}
    if(!isset($_POST["ime"]) || empty(trim($_POST["ime"]))){
        $error = "Niste uneli ime";
        header("Location:../registracija.php?error=$error");
        exit();
    }

    if(!isset($_POST["email"]) || empty(trim($_POST["email"]))){
        $error = "Niste uneli email";
        header("Location:../registracija.php?error=$error");
        exit();
    }

    if(!isset($_POST["lozinka"]) || empty(trim($_POST["lozinka"]))){
        $error = "Niste uneli lozinku";
        header("Location:../registracija.php?error=$error");
        exit();
    }

    $korisnicko_ime = $_POST["korisnicko_ime"];
    $ime = $_POST["ime"];
    $email = $_POST["email"];
    $lozinka = password_hash($_POST["lozinka"], PASSWORD_BCRYPT);

    require_once "./database.php";
    $result = $db->query("SELECT * FROM users WHERE email='$email' OR  korisnicko_ime ='$korisnicko_ime'");

    if($result->num_rows >0){
        $error = "Vec ste registrovani";
        header("Location:../registracija.php?error=$error");
        exit();
    }

    $result = $db->query("INSERT INTO users (korisnicko_ime,ime,email,lozinka) VALUES ('$korisnicko_ime','$ime','$email','$lozinka')");

    if(!$result){
        $error = "Molim vas pokusajte ponovo";
        header("Location:../registracija.php?error=$error");
        exit();
    }
    else{
        $msg = "Uspesno ste se registrovali";
        header("Location:../login.php?success=$msg");
        exit();
    }
?>