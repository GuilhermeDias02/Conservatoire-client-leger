<?php
class Eleve{
    public static function insertEleve(int $unId, int $niveau, int $bourse){

        $req = MonPdo::getInstance() -> prepare("INSERT INTO eleve (ideleve, niveau, bourse) VALUES (:id, :niveau, :bourse)");

        $req -> bindParam('id', $unId, PDO::PARAM_INT);
        $req -> bindParam('niveau', $niveau, PDO::PARAM_INT);
        $req -> bindParam('bourse', $bourse, PDO::PARAM_INT);

        $req -> execute();
    }

    public static function deconnexion(){
        session_unset();
        //session_destroy();
    }
}