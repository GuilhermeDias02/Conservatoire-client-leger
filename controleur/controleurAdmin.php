<?php

include "modele/Admin.class.php";

// else{
//     echo "probleme post";
// }

if (isset($_GET['choix'])) {
    $choix = $_GET['choix'];
}

switch ($choix) {
    // pour savoir si l'utilisateur est bien connecté
    case 'verif':
        include 'modele/Login.class.php';

        if (isset($_POST['login']) && isset($_POST['mdp'])) {
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];


            $rep = Login::verifLogin($login, md5($mdp), Login::recupJson());

            if ($rep == true) {
                $_SESSION['autorisation'] = 'OK';
                include('vue/headerAccueil.php');
                include('vue/accueil.php');
            } else {
                include('vue/echecLogin.php');
            }
        }

        break;

    // affiche l'accueil
    case 'accueil':
        include('vue/headerAccueil.php');
        include('vue/accueil.php');

        break;

    // affiche la vue d'ajout d'adhérent
    case 'accueilEleve':
        include('vue/headerAccueil.php');
        include('vue/eleve.php');

        break;

    // ajoute le nouvel adhérent
    case 'ajoutEleve':
        include 'modele/Eleve.class.php';
        include 'modele/Personne.class.php';

        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['mail']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['niveau']) && isset($_POST['bourse'])) {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $tel = $_POST['tel'];
            $mail = $_POST['mail'];
            $adresse = $_POST['adresse'];
            $codePostal = $_POST['codePostal'];
            $vile = $_POST['ville'];

            // Creation de la personne
            Personne::insertPersonne($nom, $prenom, $tel, $mail, $adresse, $codePostal, $ville);

            $id = Personne::getLastId();
            $niveau = $_POST['niveau'];
            $bourse = $_POST['bourse'];

            Eleve::insertEleve($id, $niveau, $bourse);

            include 'vue/reussite.php';

            // echo 'fujabfoa';

        } else {
            include 'vue/echec.php';
        }
        break;

    // vue d'inscription à un cours (prof et élève)
    case 'accueilInscription':
        include 'modele/Eleve.class.php';
        include 'modele/Prof.class.php';

        $lesEleves = Eleve::afficherTous();
        $lesProfs = Prof::afficherTous();

        include 'vue/headerAccueil.php';
        include 'vue/inscription.php';

        break;

    // vue d'inscription à un cours (séance)
    case 'inscription':
        include 'modele/Seance.class.php';

        if (isset($_POST['prof']) && isset($_POST['eleve'])) {
            $hprof = $_POST['prof']; //pas de problème de post
            $heleve = $_POST['eleve']; //pas de problème de post

            $lesSeances = Seance::afficherTous();
            // $lesSeances = Seance::afficherProf($hprof);

            // foreach($lesSeances as $uneSeance){
            //     echo $uneSeance->getTranche();
            // }

            include 'vue/headerAccueil.php';
            include 'vue/inscription2.php';
        }

        break;

    // inscription de l'élève à un cours
    case 'inscription2':
        include 'modele/Inscription.class.php';
        include 'modele/Seance.class.php';
        include 'modele/Eleve.class.php';

        if (isset($_POST['prof']) && isset($_POST['eleve']) && isset($_POST['seance'])) {
            $prof = $_POST['prof'];
            $eleve = $_POST['eleve'];
            $seance = $_POST['seance'];

            $capacite = Seance::afficherCapacite($seance); // pas de problème

            if (Inscription::verifierCapacite($seance, $capacite) && (Eleve::afficherUnEleve($eleve))->getNiveau() == Seance::afficherNiveau($seance)) {
                Inscription::insertInscription($prof, $eleve, $seance);

                include 'vue/reussite.php';
            } else {
                include 'vue/echec.php';
            }

        }
        break;

    case 'stats':
        include 'modele/Eleve.class.php';

        $nbrEleves = Eleve::compterEleves();

        if (isset($_POST['codePostal'])) {
            $code = $_POST['codePostal'];
            echo $code;

            if (strlen($code) >= 2) {
                $code12 += $code[0];
                $code12 += $code[1];
                $nbrElevesDep = Eleve::compterElevesDep($code12);

                include "vue/headerAccueil.php";
                include "vue/stats.php";
            }
        }

        if (isset($code)) {
            if (strlen($code) < 2) {
                include 'vue/echec.php';
            } else {
                include "vue/headerAccueil.php";
                include "vue/stats.php";
            }
        } else {
            include "vue/headerAccueil.php";
            include "vue/stats.php";
        }

}