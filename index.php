<?php
include "vue/header.php";
include "modele/monPdo.php";

if ($_SESSION['autorisation'] == 'OK') {
    $uc = 'admin';
}

// Si rien n'est encore défini alors uc = login
if (empty($_GET["uc"])) {
    $uc = "login";
} else {
    $uc = $_GET["uc"];
}

switch ($uc) {
    // vue de connexion
    case "login":
        include "vue/login.php";
        break;
    // une fois connecté
    case "admin":
        include "controleur/controleurAdmin.php";
        break;
}

include "vue/footer.php";
?>



<!-- https://www.w3schools.com/php/php_mysql_insert_lastid.asp pour ajouter un prof ou élève il faut d'abord créer une personne puis aller chercher son id pour l'ajouter dans le nv prof/eleve -->