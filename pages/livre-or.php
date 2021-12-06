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

//var_dump($_SESSION['user']);

?>
<?php
require '../template/header.php';
?>
<body id="bodyliv">
    <main id="mainLiv"> 
        <article id="arth1">
            <section>
                <h1 id = "h1Liv">Livre d'or</h1>
            </section>
        </article>
        <article id="articleTable">
            <scetion>
                <table id = "tableLiv">
                    <thead>
                        <th> Commentaire </th>
                        <th> Posté le </th>
                        <th> Par l'utilisateurs </th>   
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
        </article id="artText">
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