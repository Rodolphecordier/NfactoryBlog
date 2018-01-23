
<?php
function callPage() {
    if (isset($_GET['page'])) {
        if  ($_GET['page'] == "")
            $page = "accueil";
        else
            $page = $_GET['page'];
    }
    else {
        $page = "default";
    }
    $page = "./include/" . $page . ".inc.php";
    $incFiles = glob("./include/*.inc.php");
    if (in_array($page, $incFiles)) {
        include($page);
    }
    else {
        include("./include/default.inc.php");
    }
}