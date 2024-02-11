<?php
   

    if(!isset($_POST["email_korisnikco_ime"]) || empty(trim($_POST["email_korisnikco_ime"]))){
        $error = "Niste uneli korisnicko ime ili email";
        header("Location:../login.php?error=$error");
        exit();
    }
        if(!isset($_POST["lozinka"]) || empty(trim($_POST["lozinka"]))){
            $error = "Niste uneli ime";
            header("Location:../login.php?error=$error");
            exit();
        }
    
        
    
        $email_korisnickoIme = $_POST["email_korisnikco_ime"];
        $lozinka = $_POST["lozinka"];
    
        require_once "./database.php";
        $result = $db->query("SELECT * FROM users WHERE email='$email_korisnickoIme' OR  korisnicko_ime ='$email_korisnickoIme'");
    
        if($result->num_rows == 0){
            $error = "Email ili korisnicko ime nisu tacni";
            header("Location:../login.php?error=$error");
            exit();
        }
        $korisnik = $result->fetch_assoc();
        if(!password_verify($lozinka, $korisnik["lozinka"])){
            $error = "Netacna lozinka";
            header("Location:../login.php?error=$error");
            exit();
        }
    
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        $_SESSION["korisnik"] = $korisnik["korisnicko_ime"];
        header("Location:../");
        
        

?>  