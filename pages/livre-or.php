<?php
require '../class/classUser.php';
require '../class/classComment.php';
require '../function/db.php';

if(isset($_POST['submitCom'])){
    $postComment = new Comment();
    $postComment->postComment($_POST['comment'], $_SESSION['user']['id']);
}
$dComment = new Comment();
$dComment->displayComment();

?>
<?php
require '../template/header.php';
?>
<body>
    <main>
        <article>
            <section>
                <h1>Livre d'or</h1>
            </section>
        </article>
        <article>
            <scetion>
                <table>
                    <thead>
                        <tr> Commentaire </tr>
                        <tr> Date </tr>
                        <tr> Login </tr>   
                </thead>
                <tbody>
                <?php
                    foreach($_SESSION['commentaire'] as $key => $value){
                        echo '<tr>';
                        foreach($value as $key1 => $comment1){
                        echo '<td>'. $comment1 .'</td>';
                        }
                        echo '</tr>';
                    }
                ?>
                </tbody>
                </table>
            </scetion>
        </article>
        <?php
            if(isset($_SESSION['user'])){
                require 'commentaire.php';
            }
        ?>
    </main>
</body>
<?php
require '../template/footer.php';
?>