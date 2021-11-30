<?php

class Commment{

    private $id;
    public $comment;
    public $date;
    private $idUser;

    public function __construct(){
        $this->bdd = connect();
    }
//--------------------------------------------Ajouts de commentaire-----------------------------------------------------------
    public function postComment($login, $comment, $id){

        $secureComment = htmlspecialchars(trim($comment));

        if(!empty($comment)){
            $comLenght = strlen($comment);

            if($comLenght <= 240){
                $insertComment =$this->bdd->prepare("INSERT INTO commentaires (id_user, commentaire, date)VALUES (:login, :commentaire, NOW())");
                $insertComment->bindValue(':login', $login['id'], PDO::PARAM_STR);
                $insertComment->bindValue(':commentaire', $comment, PDO::PARAM_STR);
                $insertComment->execute();
            }
            else{
                $errorLenght = 'Le commentaire est trop long 240 characters MAX';
            }
        }
    }
//------------------------------------------------------------------------------Display commentaire----------------------------------------------------

    public function displayComment(){
        $getCommentaire = $this->bdd->prepare("SELECT c.commentaire, c.date, c.id_user, c.id_produit, p.id, u.login FROM commentaires c INNER JOIN produits p ON c.id_produit = p.id INNER JOIN user u ON c.id_user = u.id WHERE p.id = :id ORDER BY c.date DESC LIMIT 5 ")
    }
}

?>