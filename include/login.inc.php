
<h1>Login</h1>
<?php
if (isset($_POST['login'])) {
    $tabErreur = array();
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    if ($mail == "" || !filter_var($mail , FILTER_VALIDATE_EMAIL))
        array_push($tabErreur, "Veuillez saisir une adresse");
    if ($password == "")
        array_push($tabErreur, "Veuillez saisir un mot de passe");
    if (count($tabErreur) > 0) {
        $message = "<ul>";
        for ($i = 0 ; $i < count($tabErreur) ; $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }
        $message .= "</ul>";
        echo ($message);
        include ("./include/formLogin.php");
    }
    else {
        $dsn = "mysql:dbname=nfactoryblog;
        host=localhost;
        charsert=utf8";
        $username = "root";
        $mdp = "";



        try {
            $db = new PDO($dsn, $username, $mdp);
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
        if (!$db) {
            echo("erreur connexion");
        } else {
            $password = sha1($password);
            $requete = "SELECT * FROM t_users WHERE USERMAIL='$mail' AND USERPASSWORD='$password'";
            if ($result = $db->query($requete)) {
                var_dump($result);
                $ligne = $result->rowCount();
                if ($ligne > 0) {
                    $_SESSION['login'] = 1;
                    while ($donnees = $result->fetch(PDO::FETCH_ASSOC)) {
                        if ($donnees['T_ROLES_ID_ROLE'] == 1 || $donnees['T_ROLES_ID_ROLE'] == 2) {
                            echo("<script>redirection(\"index.php?page=admin\")</script>");
                            $_SESSION['admin'] = 1;
                        } else {
                            echo("<script>redirection(\"index.php?page=accueil\")</script>");
                        }
                    }
                    echo("<a href=\"index.php?page=accueil\">Vous êtes authentifié, viendez à la page d'accueil</a>");
                } else
                    //$_SESSION['login'] = 0;
                    echo("Votre e-mail ou mot de passe est érronné");
            }
        }
        unset($db);
    }}
else {
    include ("./include/formLogin.php");
}

