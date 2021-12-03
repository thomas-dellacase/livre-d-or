<?php

class Comment{

    private $id;
    public $comment;
    public $date;
    private $idUser;

    public function __construct(){
        $this->bdd = connect();
    }
    //public DateTime::__construct(string $datetime = "now", ?DateTimeZone $timezone = null);
//--------------------------------------------Ajouts de commentaire-----------------------------------------------------------
    public function postComment($comment, $idUser){

        $secureComment = htmlspecialchars(trim($comment));
        

        if(!empty($comment)){
            $comLenght = strlen($comment);

            if($comLenght <= 240){
                $insertComment =$this->bdd->prepare("INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES (:commentaire, :id, NOW())");
                $insertComment->bindValue(':commentaire', $comment , PDO::PARAM_STR);
                $insertComment->bindValue(':id', $_SESSION['user']['id'] , PDO::PARAM_STR);
                //$insertComment->bindValue(":date", date->format("Y-m-d H:i:s"), PDO::PARAM_STR);
                $insertComment->execute();
            }
            else{
                $errorLenght = 'Le commentaire est trop long 240 characters MAX';
            }
        }
    }
//-----------------------------------------------------------------display commentaire-----------------------------------------------

    public function displayComment(){

        $comment = $this->bdd->prepare("SELECT commentaire, date, login FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur ORDER BY Date LIMIT 5");    
        //$comment->bindValue(':id', $id, PDO::PARAM_INT);
        $comment->execute();
        $result = $comment->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['commentaire'] = $result;

        // echo '<pre>';
        // var_dump($result);
        // echo '</pre>';

        // echo '<pre>';
        // var_dump($_SESSION['commentaire']);
        // echo '</pre>';

}

}
?>