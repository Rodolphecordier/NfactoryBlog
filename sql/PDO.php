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



$sql = "SELECT * FROM T_ARTICLES";
$resultat = $db -> query($sql);

while (($article = $resultat -> fetch())) {
    echo html_entity_decode( $article ['ARTCONTENU']);
}
//requête d'insertion
$sql = "INSERT INTO T_ARTICLES...";
$nbrlignes = $db -> exec($sql);
echo  $nbrlignes;


unset($db);

////////////////////////
$db = new PDO($dsn, $username, $password);

$db -> setAttribute(
    PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::fetch_ASSOC);

// formatage pour un jeu de résultats
$resultat = $db ->query("SELECT *...");
$resultat -> setFetchMode(PDO::FETCH_ASSOC);
while (($article = $resultat -> fetch())){
    var_dump($article);
}
//A chaque appel
$resultat = $db ->query("SELECT *...");
while (($article = $resultat -> fetch(PDO::FETCH_ASSOC)));
    var_dump($article);