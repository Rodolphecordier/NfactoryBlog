<header>
<<<<<<< HEAD
    <ul>
        <li><a href="index.php?page=accueil">Accueil</a></li>

        <?php
        if(!isset($_SESSION['login'])){
            echo("<li><a href=\"index.php?page=inscription\">Inscription</a></li>");
            echo("<li><a href=\"index.php?page=login\">Login</a></li>");

        }
        else{


            echo("<li><a href=\"index.php?page=article\">Article</a></li>");
            echo("<li><a href=\"index.php?page=logout\">Logout</a></li>");
        }
        ?>
        <?php
            if (isset($_SESSION['admin'])){
                echo ("<li><a href=\"index.php?page=admin\">Administration </a></li>");
            }
        ?>

    </ul>
    <hr>
=======
<ul>
    <li><a href="index.php?page=acceuil">Accueil</a></li>
    <li><a href="index.php?page=inscription">inscription</a></li>
    <li><a href="index.php?page=login">login</a></li>

</ul>

>>>>>>> origin/develop
</header>