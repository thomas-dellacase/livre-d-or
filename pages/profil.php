<?php

require '../class/classUser.php';
require '../function/db.php';

if(isset($_POST['submit'])){
    $updateUser = new User();
    $updateUser->update($_POST['login'], $_POST['pwd'], $_POST['confpwd']);
    header('Location:../Index.php');
    if(isset($winUp)){
         $erreur = $winUp ;
    }elseif(isset($logUp)){
         $erreur = $logUp ;
    }elseif(isset($logPdw)){
         $erreur = $logPdw;
    }
}
//var_dump($_SESSION['user']);
?>
<?php
require '../template/header.php'
?>
<body id='bodyPro'>
    <main id="mainPro">
        <article>
            <h1 id="h1Pro"><?php if(isset($erreur)){echo $erreur;}?></h1>
        </article>
         <article id="artPro">
            <form method="POST">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                                <input class="form-control" type="text" name="login" placeholder=<?php if(isset($_SESSION['user']['login'])){
                                                                                                            echo $_SESSION['user']['login'];} ?>></input>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="pwd" placeholder="New Password"></input>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="confpwd" placeholder="New Confim Password"></input>
                                </div>
                            </div>
                        </div>
                        <div class="col" id="divbtn">
                            <button class="btn btn-success from-group" type="submit" name="submit">Update</button>
                        </div>
                    </div>
            </form>
        </article>
    </main>
</body>
<?php
require '../template/footer.php';
?>