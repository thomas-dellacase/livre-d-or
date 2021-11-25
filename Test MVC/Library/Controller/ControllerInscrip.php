<?php
namespace controller;
require "controller.php";

// class controler exetand controler 
//verifie les poste taille validiter utiliser fontion model pour verif 
//appelle de fonction final

class InscriptionCtrl extends Controller{

    public $login;
    public $password;
    public $confPass;

    $login = $_POST['login'];
    $password = $_POST['pwd'];
    $confPass = $_POST['confpwd'];

    function htmlSpé(){
        $login = htmlspecialchars(trim($login));
        $password = htmlspecialchars(trim($password));
        $confPass = htmlspecialchars(trim($confPass));
    }

    function lenght(){
        $lenghtLog = strlen($login);
        $lenghtPass = strlen($password);
        $lenghtConfPass = strlen($confPass);
        if(($lenghtLog >= 4) && ($lenghtPass >= 4) && ($lenghtConfPass >= 4)){
            $lenghtOk = "longeur ok";
        }
        else{
            $lenghtFailded = "longeur pas ok ";
        }
    }

    function passwordHash(){
        $password = passwordHash($password, PASSWORD_BCRYPT);
    }


}

?>