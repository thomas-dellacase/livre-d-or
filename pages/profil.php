<?php

require '../class/classUser.php';
require '../function/db.php';

if(isset($_POST['submit'])){
    $updateUser = new User();
    $updateUser->update($_POST['login'], $_POST['pwd'], $_POST['confpwd']);
}

?>
<?php
require '../template/header.php'
?>
<body>
    <main>
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
    </main>
</body>
<?php
require '../template/footer.php';
?>