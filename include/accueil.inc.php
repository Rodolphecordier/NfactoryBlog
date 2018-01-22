<?php
$dsn = "mysql:dbname=nfactoryblog;
        host=localhost;
        charsert=utf8";
$username = "root";
$password = "";

//$db = new PDO($dsn, $username, $password);

try{
    $db = new PDO($dsn, $username, $password);
}

catch (PDOException $e) {
    echo ($e -> getMessage());
}

$requete = "SELECT * FROM `t_articles` ORDER BY `ARTDATE` DESC LIMIT 0,3";
$reponse = $db ->query($requete);
while ($donnees= $reponse ->fetch(PDO::FETCH_ASSOC)){

    echo (html_entity_decode( "<div>"."<br/>" . "<h2>".$donnees['ARTTITRE'] . "</h2>". "<br/>" . "<h3>".  $donnees['ARTCHAPO'] ."</h3>". "<br/>" . "<div>". $donnees['ARTCONTENU'] ."</div>" . "<br/>" . "</div>" .  "<hr/>"));

}
