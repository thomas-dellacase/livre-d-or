<?php
//require 'classDb.php';

class User {

    private $id;
    public $login;
    public $password;
    public $bdd;

    public function __construct(){
        $this->bdd = connect();
    }

//------------------------------------Connexion-----------------------------------------
    public function connectUser($login, $password){
        // if(!(isset($_SESSION['user']))){
        //     $_SESSION['user'] = '';
        // }
        //$passwordU = $_POST['pwd'];
        
        $_SESSION['user'] = "";
        

        $login =  htmlspecialchars(trim($login));
        $password = htmlspecialchars(trim($password));

        $hpwd = password_hash($password, PASSWORD_BCRYPT);

        $connectUser = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = :login ");
        $connectUser->bindValue(':login', $login, PDO::PARAM_STR);
        $connectUser->execute();
        $user = $connectUser->fetch(PDO::FETCH_ASSOC);
        //var_dump($user);

        if(!(empty($user))){
            $checkPwd = $user['password'];
            if(password_verify($password, $checkPwd)){
                $this-> id = $user['id'];
                $this-> login = $user['login'];
                $this-> password = $user['password'];
                $_SESSION['user'] = [
                    'id'=>$this-> id,
                    'login'=>$this-> login,
                    'password'=>$this-> password,
                ];
                //var_dump($user);
                //header('location:index.php')
            }
            else{
                echo "Login ou mot de passe erroné1 <br>";
            }
        }
        else{
            echo "Login ou mot de passe erroné2 <br>";
        }

    }

// ---------------------------------- DECONNEXION -----------------------------

    public function Disconnect(){

        session_unset();
        session_destroy();
        header('location:../index.php'); // ou autres pages 

    }
//------------------------------------Inscription--------------------------------------------
    public function inscription($login, $password, $confPass){

        $login = $_POST['login'];
        $password = $_POST['pwd'];
        $confPass = $_POST['confpwd'];

        $login = htmlspecialchars(trim($login));
        $password = htmlspecialchars(trim($password));
        $confPass = htmlspecialchars(trim($confPass));
        
        
        if(!(empty($login)) && !(empty($password)) && !(empty($confPass))){

            $loglenght = strlen($login);
            $passlenght = strlen($password);
            $cpasslenght = strlen($confPass);

            if(($loglenght >= 3) && ($passlenght >=3) && ($cpasslenght >=3)){
                $check = $this->bdd->prepare("SELECT COUNT(login) AS num FROM utilisateurs WHERE login = :login");
                $check->bindValue(':login', $login);
                $check ->execute();
                

                $row = $check->fetch(PDO::FETCH_ASSOC);

                if($row['num'] > 0){
                    echo 'Ce login est deja pris veuillez un choisir un autres';
                }
                elseif($_POST['pwd'] != $_POST['confpwd']){
                    echo 'Les 2 mots de passe ne sont pas les memes';
                }
                else{
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $register = $this->bdd->prepare("INSERT INTO utilisateurs(login, password) VALUES(:login, :password)");
                    $register->bindValue(':login', $login);
                    $register->bindValue(':password', $password);
                    
                    //$user = $register->fetch(PDO::FETCH_ASSOC);

                    if($register->execute()){
                        echo "Inscription reussi";
                    }
                    else{
                        $error = "Error". $e->getMessage();
                        echo $error;
                    }
                }

            }
            else{
                echo 'login ou mot de passe trop cours';
            }
        }
        else{ 
            echo 'veuillez remplir tout les champs';
        }
    }
//-------------------------------------------UPDATE-------------------------------------------------
        public function update($login, $password, $confPass){

            $oldlogin = $_SESSION['user']['login'];

            //var_dump($oldlogin);

            if(empty($_POST['login'])){
                $login = $_SESSION['user']['login'];
            }
            if(empty($_POST['pwd'])){
                $password = $_SESSION['user']['password'];
            }

            $login = htmlspecialchars(trim($login));
            $password = htmlspecialchars(trim($password));
            $confPass = htmlspecialchars(trim($confPass));

            $checklog =$this->bdd->prepare("SELECT COUNT(login) AS num FROM utilisateurs WHERE login = :login");
            $checklog->bindValue(':login',$login, PDO::PARAM_STR);
            $checklog->execute();

            $row = $checklog->fetch(PDO::FETCH_ASSOC);

            if($row['num'] > 0 && $login != $oldlogin){
                $logUp = 'Ce login existe deja.';
            }
            elseif($_POST['pwd'] != $_POST['confpwd']){
                $logPwd = 'Les 2 ,ots de passe ne sont pas les memes';
            }
            else{
                $password = password_hash($password, PASSWORD_BCRYPT);
                $update = $this->bdd->prepare("UPDATE utilisateurs SET login = :login, password = :password WHERE login = :oldlogin");
                $update->bindValue(':login', $login, PDO::PARAM_STR);
                $update->bindValue(':password', $password, PDO::PARAM_STR);
                $update->bindValue(':oldlogin', $oldlogin, PDO::PARAM_STR);
                $update->execute();

                $stmt = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = :login");
                $stmt->bindValue(':login', $login, PDO::PARAM_STR);
                $stmt->execute();

                $upUser = $stmt->fetch(PDO::FETCH_ASSOC);

                if (isset($upUser)){
                    $_SESSION['user'] = $upUser;
                    // $this-> id = $user['id'];
                    // $this-> login = $user['login'];
                    // $this-> password = $user['password'];
                    // $_SESSION['user'] = [
                    //     'id'=>$this-> id,
                    //     'login'=>$this-> login,
                    //     'password'=>$this-> password,
                    // ];
                    $winUp = 'Update reussi'. $_SESSION['user']['login'];
                }
                else{
                    $error = "Erreur: ". $e->getMessage();
                    echo $error;
                }
            }

        }

        
    




}



?>