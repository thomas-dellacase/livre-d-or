<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>  
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <?php
                    if(!(isset($_SESSION['user']))){
                    echo "<a class='nav-item nav-link' href='pages/connexion.php'>Connexion</a>";
                    }else{ echo "";}?>
                    <?php
                    if(!(isset($_SESSION['user']))){
                    echo "<a class='nav-item nav-link' href='pages/inscription.php'>Inscription</a>";
                    }else{ echo "";}?>
                    <?php
                    if(isset($_SESSION['user'])){
                    echo "<a class='nav-item nav-link' href='pages/profil.php'>Profil</a>";
                    }else{ echo "";}?>
                                        <?php
                    if(isset($_SESSION['user'])){ 
                    echo "<a class='nav-item nav-link' href='pages/deconnexion.php'>Deconnexion</a>";
                    }else{ echo "";}?>
                    <a class="nav-item nav-link" href="pages/livre-or.php">Livre d'or</a>
                </div>
            </div>
        </nav>
    </header>