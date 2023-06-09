<?php
class Seance
{

    private int $idProf;
    private int $numSeance;
    private string $tranche;
    private string $jour;
    private int $niveau;
    private int $capacite;

    /*public static function insertEleve(int $unId, int $niveau, int $bourse){

        $req = MonPdo::getInstance() -> prepare("INSERT INTO eleve (ideleve, niveau, bourse) VALUES (:id, :niveau, :bourse)");

        $req -> bindParam('id', $unId, PDO::PARAM_INT);
        $req -> bindParam('niveau', $niveau, PDO::PARAM_INT);
        $req -> bindParam('bourse', $bourse, PDO::PARAM_INT);

        $req -> execute();
    }*/

    /**
     * Affiche toutes les séances
     *
     * @return array
     */
    public static function afficherTous()
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM seance");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req->execute();
        $lesResultats = $req->fetchAll();

        return $lesResultats;
    }

    /**
     * Affiche un prof en fonction d'un id
     *
     * @param  int $unIdProf
     * @return array
     */
    public static function afficherProf(int $unIdProf)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM seance WHERE idprof = :idprof");
        $req->bindParam('idprof', $idProf, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req->execute();
        $lesResultats = $req->fetchAll();

        return $lesResultats;
    }

    /**
     * Renvoie la capacité de la séance
     *
     * @param  int $unNumSeance
     * @return mixed
     */
    public static function afficherCapacite(int $unNumSeance)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM seance WHERE numseance = :numseance");
        $req->bindParam('numseance', $unNumSeance, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req->execute();
        $lesResultats = $req->fetchAll();

        foreach ($lesResultats as $uneSeance) {
            $capacite = $uneSeance->CAPACITE;
        }

        return $capacite;
    }

    /**
     * Affiche le niveau d'une séance
     *
     * @param  int $unNumSeance
     * @return mixed
     */
    public static function afficherNiveau(int $unNumSeance)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM seance WHERE numseance = :numseance");
        $req->bindParam('numseance', $unNumSeance, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'seance');
        $req->execute();
        $lesResultats = $req->fetchAll();

        foreach ($lesResultats as $uneSeance) {
            $niveau = $uneSeance->NIVEAU;
        }

        return $niveau;
    }

    /**
     * @return 
     */
    public function getIdProf(): int
    {
        return $this->idProf;
    }

    /**
     * @return 
     */
    public function getNumSeance(): int
    {
        return $this->numSeance;
    }

    /**
     * @return 
     */
    public function getTranche(): string
    {
        return $this->tranche;
    }

    /**
     * @return 
     */
    public function getJour(): string
    {
        return $this->jour;
    }

    /**
     * @return 
     */
    public function getNiveau(): int
    {
        return $this->niveau;
    }

    /**
     * @return 
     */
    public function getCapacite(): int
    {
        return $this->capacite;
    }
}