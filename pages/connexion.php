<?php
//session_start();
require '../class/classUser.php';
require '../function/db.php';
//$bdd = new Db;


if(isset($_POST['submit'])){
    $connecter = new User();
    $connecter->connectUser($_POST['login'], $_POST['pwd']);
    header("Location:../Index.php");
}
//var_dump($_SESSION['user']);

?>
<?php
require '../template/header.php'
?>
<body id="bodyCo">
    <main id="mainCo">
    <h1 id="h1Co"><?php if(isset($_SESSION['user']['login']) && $_SESSION['user']['login'] != ''){echo "Vous etes deja connecter ". $_SESSION['user']['login']. "<br>";
      }elseif(isset($failedlog)){echo $failedlog;} ?></h1>

        <article id="artco">
            <div class="container">
                <h2 class="text-center">Connexion</h2>
            <form method="POST" action="connexion.php">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input class="form-control" type="text" name="login" placeholder="Login" required="required"></input>
                        </div>
                    </div>
                    <div class="col">
                            <div class="form-group">
                                <input class="form-control" type="password" name="pwd" placeholder="Password" required="required"></input>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div id="divbtn" class="col">
                        <button class="btn btn-success from-group" type="submit" name="submit">Connexion</button>
                    </div>
                </div>
            </form>
    
        </article>
    </main>
</body>
<?php
require '../template/footer.php';
?>