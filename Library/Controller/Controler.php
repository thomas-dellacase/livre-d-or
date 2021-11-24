<?php
//function generique 

class Controller{


    function deco(){
        session_unset();
        session_destroy();
        header('location:../index.php');
    }
    

}
?>