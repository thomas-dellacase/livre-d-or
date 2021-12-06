<?php
//session_start();
require '../class/classUser.php';
require '../function/db.php';

if(isset($_POST['submit'])){
    $connecter = new User();
    $connecter->inscription($_POST['login'], $_POST['pwd'], $_POST['confpwd']);
    header("Location:../index.php");
}

//var_dump($_SESSION['user']);
?>
<?php
require '../template/header.php'
?>
<body id="bodyIns">
    <main id="mainIns">
        <article>
            <h1 id ="h1Ins"><?php
                if(isset($regfailed)){
                    echo $regfailed;
                }
                if(isset($pdwfailed)){
                    echo $pdwfailed;
                }
            ?></h1>
        </article>
    <form method="POST">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input class="form-control" type="text" name="login" placeholder="Login" required="required"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input class="form-control" type="password" name="pwd" placeholder="Password" required="required"></input>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input class="form-control" type="password" name="confpwd" placeholder=" Confim Password" required="required"></input>
                            </div>
                        </div>
                    </div>
                    <div class="col" id="divbtn">
                        <button class="btn btn-success from-group" type="submit" name="submit">Inscripiption</button>
                    </div>
                </div>
            </form>
    </main>
</body>
<?php
require '../template/footer.php';
?>