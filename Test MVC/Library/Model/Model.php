<?php
namespace Model;
//require "../Controller/Controler.php";


//Class mere herite tout les autres modele class abstraite jamais instentier
//Appelable de partout san new 
//FULL SQL
abstract class Model{
    function __construct(){
        $host = 'localhost';
        $username = 'root';
        $Dbpassword = 'root';
        $database = 'livreor';
        $bdd = '';

        try{
            $bdd = 'mysql:host='.$host.';dbname='. $database;
            new PDO($bdd, $username, $Dbpassword);

        }
        catch(PDOException $e){
            echo "failed". $e->getMessage();
        }
    }

    function selectAll(){
        $sql = "SELECT * FROM 'utilisateurs'";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();

        $result->fetch(PDO::FETCH_ASSOC);
    }

    function oneUser(){
        $sql2 = "SELECT * FROM 'utilisateurs' WHERE login = :login";
        $stmt2 = $bdd->prepare($sql2);
        $stmt2->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt2->execute($sql2);
    }


}

?>