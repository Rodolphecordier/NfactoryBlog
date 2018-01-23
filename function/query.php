
<?php
function query($query, $queryType) {
    if ($query != "" && $queryType != "") {
        $connexion = mysqli_connect("localhost", "NFactoryBlog", "NFactoryBlog", "nfactoryblog");
        if (!$connexion) {
            die("Erreur MySQL " . mysqli_connect_errno() . " : " . mysqli_connect_error());
            return false;
        }
        else {
            if($result = mysqli_query($connexion, $query)) {
                switch($queryType) {
                    case "INSERT":
                        return true;
                    case "SELECT":
                        return mysqli_fetch_all($result);
                    default:
                        return false;
                }
                mysqli_free_result($result);
            }
            else
                return false;
            mysqli_close($connexion);
        }
    }
    else
        return false;
}