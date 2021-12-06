<?php
require 'class/classUser.php';
require 'class/classComment.php';
require 'function/db.php';

// if(isset($_SESSION['user'])){
// var_dump($_SESSION['user']);
// }
?>
<?php
require 'template/headerIndex.php'
?>
<body>
    <main>
        <h1><?php if(isset($_SESSION['user']) && $_SESSION['user'] != ''){
        echo "Bienvenue ". $_SESSION['user']['login'];} ?> </h1>

        <article id="art">
            <section id = "secH">
                <h2>Weyland-Yutani Corporation</h2>
                <p>"Building better worlds."</p>
            </section>
            <section id="sectext">
                <p>Join us now! The Weyland-Yutani Corporation, 
                    commonly referred to as Wey-Yu or simply “The Company”, 
                    is a large multinational conglomerate.The Weyland-Yutani Corporation was formed when Weyland Corp absorbed the Yutani Corporation in a hostile takeover in 2099. 
                    Following the merger, Weyland-Yutani opened with the largest share value ever recorded on the Systems Exchange. 
                    The company would go on to buy out numerous other businesses, investing in almost every sector, 
                    and had a controlling stake in a vast number of diverse corporations. According to some, 
                    Weyland-Yutani owned “pretty much everything” by the 2150s. 
                    Many of the companies wholly or partly owned by Weyland-Yutani continued to operate under their own brand.
                </p>
            </section>
        </article>
        
    </main>
</body>
<?php
require 'template/footer.php';
?>