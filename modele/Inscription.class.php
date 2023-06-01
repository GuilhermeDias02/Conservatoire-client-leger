<?php

class Inscription{

    private int $idProf;
    private int $idEleve;
    private int $numSeance;
    
    /**
     * Ajoute une inscription
     *
     * @param  int $idProf
     * @param  int $idEleve
     * @param  int $numSeance
     * @return void
     */
    public static function insertInscription(int $idProf, int $idEleve, int $numSeance){

        $req = MonPdo::getInstance() -> prepare("INSERT INTO inscription (idprof, ideleve, numseance, dateinscription) VALUES (:idprof, :ideleve, :numseance, DATE_FORMAT(NOW(),'%Y-%m-%d'))");

        $req -> bindParam('idprof', $idProf, PDO::PARAM_INT);
        $req -> bindParam('ideleve', $idEleve, PDO::PARAM_INT);
        $req -> bindParam('numseance', $numSeance, PDO::PARAM_INT);

        $req -> execute();
    }
    
    /**
     * Vérifie que la capacité rentrée est plus petite que celle dans la bdd
     *
     * @param  int $unNumSeance
     * @param  int $capacite
     * @return bool
     */
    public static function verifierCapacite(int $unNumSeance, int $capacite){
        $req = MonPdo::getInstance() -> prepare("SELECT Count(*) FROM inscription WHERE numseance = :numseance");
        $req -> bindParam('numseance', $unNumSeance, PDO::PARAM_INT);
        // $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req -> execute();
        $lesResultats = $req -> fetchColumn();

        if ($lesResultats < $capacite){
            return true;
        }
        else{
            return false;
        }

    }

}