<?php
require('../Library/Controller/Controler.php');
//require('../Library/Controller/ControllerInscrip.php');
// require('../Library/Model/Model.php');
// require('../Library/Model/ModelInscrip.php');

// require des different class
// Configurqtion du fichier php et des templates 
//require les template header ect

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>

    <form method="POST">
    <input type="text" name="login" palceholder="Login"></input>
    <input type="password" name="pwd" palceholder="Password"></input>
    <input type="password" name="confpwd" palceholder="Confirm Password"></input>
    <input type="submit" name="submit" placeholder="Inscription"></input>
    </form>

</main>

<!-- require footer  -->

</body>
</html>
