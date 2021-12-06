<?php
session_start();
function connect(){

    $database = new \PDO('mysql:host=localhost:3306; dbname=thomas-dellacase_livre-or; charset=utf8', 'thomas-dellacase', 'ProjetPP2' );

    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $database;
}
?>