<?php
include "vue/header.php";

if (isset($_SESSION['autorisation'])){
    if($_SESSION['autorisation'] == 'OK'){
        $uc = 'admin';
    }
}

if(empty($_GET["uc"])){
    $uc = "login";
}
else{
    $uc = $_GET["uc"];
}

switch($uc){
    case "login":
        include "vue/login.php";
        break;
    case "admin":
        include "controleur/controleurAdmin.php";
        break;
}

include "vue/footer.php";
?>



<!-- https://www.w3schools.com/php/php_mysql_insert_lastid.asp pour ajouter un prof ou élève il faut d'abord créer une personne puis aller chercher son id pour l'ajouter dans le nv prof/eleve -->