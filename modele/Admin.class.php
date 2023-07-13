<?php
class Admin
{

    /**
     * Vérifie que la personne peut se connecter
     *
     * @param  string $login
     * @param  string $mdp
     * @return bool
     */
    public static function verifier($login, $mdp)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM admin WHERE login=:login AND mdp=:mdp");

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'admin');

        $req->bindParam('login', $login);
        $req->bindParam('mdp', $mdp);

        $req->execute();

        $leResultat = $req->fetchAll();

        $nb_lignes = count($leResultat);

        if ($nb_lignes == 0) {
            $rep = false;
        } else {
            $rep = true;
        }

        return $rep;
    }

    /**
     * Supprime la session
     *
     * @return void
     */
    public static function deconnexion()
    {
        session_unset();
        //session_destroy();
    }
}