<?php
namespace Model;
require 'Model.php';


class InscriptionMd extends Model{

    function Database(){
        $inscription = new PDO($bdd, $username, $password);
        $inscription->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_);
    }
     public function insertUser(){
        $sql = "INSERT INTO utilisateurs (login, password) VALUES (':login', ':password')";
        $stmt = $inscription->prepare($sql);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        
        if($stmt->execute()){
            echo "Success";
        }
        else{
            $error = "Error". $e->getMessage();
            echo $error;
        }
    }
}


?>