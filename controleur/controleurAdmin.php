<?php

include "modele/Admin.class.php";

if(isset($_POST['login']) && isset($_POST['mdp'])){
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
}
else{
    echo "probleme post";
}

if (isset($_GET['choix'])){
    $choix = $_GET['choix'];
}

switch($choix){
    case 'formulaire':
        // include ('vue/formAdmin.php');
        break;
    case 'verif':
        /*$rep = Admin::verifier($login, md5($mdp));

        if ($rep == true){
            $_SESSION['autorisation'] = "OK";
            */include ('vue/accueil.php');/*
        }
        else{
            include ('vue/echec.php');
        }*/
        break;
}