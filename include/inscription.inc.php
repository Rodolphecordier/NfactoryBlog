<h1>inscription</h1>
<?php
if(isset($_POST["formulaire"])){
    $taberreur=array();

$nom = $_POST["nom"
$prenom =$_POST["prenom"]
$mail =$_POST["email"]
$mdp =$_POST["password"]


    if($_POST["nom"] == "")
    array_push($taberreur,"veuillez saisir un nom");

    if($_POST["prenom"] == "")
    array_push($taberreur,"veuillez saisir un prenom");

    if($_POST["email"] == "")
    array_push($taberreur,"veuillez saisir un email");
    if($_POST["password"] == "")
    array_push($taberreur,"veuillez saisir un mot de passe");
var_dump($taberreur);


if(count($taberreur) != 0) {
    $message = "<ul>";

    for($i = 0 ; $i < count($taberreur) ; $i++) {
        $message .= "<li>" . $taberreur[$i] . "</li>";
    }

    $message .= "</ul>";
    echo($message);

    include("./include/forinscription.php");
}

else {
    echo("<p>Pas d'erreurs</p>");
$connexion = mysqli_connect("localhost","root","","blog");
$requete = "INSERT INTO `t_users` (`ID_USER`, `USERNOM`, `USERPRENOM`, `USERMAIL`, `USERPASSWORD`) VALUES (null,$nom, $prenom, $mail, $mdp);";
    }
}

else {
echo("Je viens d'ailleurs");
include("./include/forinscription.php");
}