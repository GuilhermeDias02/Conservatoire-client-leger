<?php

include "modele/Admin.class.php";

if(isset($_POST['login']) && isset($_POST['mdp'])){
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
}
// else{
//     echo "probleme post";
// }

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
            $_SESSION['autorisation'] = "OK";*/
            include ('vue/headerAccueil.php');
            include ('vue/accueil.php');
        /*}
        else{
            include ('vue/echec.php');
        }*/
        break;
    case 'accueilEleve':
        include ('vue/headerAccueil.php');
        include ('vue/eleve.php');

        break;
    case 'ajoutEleve':
        include 'modele/Eleve.class.php';
        include 'modele/Personne.class.php';

        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['adresse']) && isset($_POST['niveau']) && isset($_POST['bourse'])){

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $tel = $_POST['tel'];
            $mail = $_POST['mail'];
            $adresse = $_POST['adresse'];

            // Creation de la personne
            Personne::insertPersonne($nom, $prenom, $tel, $mail, $adresse);

            $id = Personne::getLastId();
            $niveau = $_POST['niveau'];
            $bourse = $_POST['bourse'];

            Eleve::insertEleve($id, $niveau, $bourse);

            include 'vue/reussite.php';

            echo 'fujabfoa';

        }
        else{
            include 'vue/echec.php';
        }
        break;
}