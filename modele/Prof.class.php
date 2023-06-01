<?php
class Prof{

    private int $id;
    private string $nom;
    private string $prenom;
    private string $tel;
    private string $mail;
    private string $adresse;
    private string $instrument;
    private int $salaire;

    

    // public static function insertEleve(int $unId, int $niveau, int $bourse){

    //     $req = MonPdo::getInstance() -> prepare("INSERT INTO eleve (ideleve, niveau, bourse) VALUES (:id, :niveau, :bourse)");

    //     $req -> bindParam('id', $unId, PDO::PARAM_INT);
    //     $req -> bindParam('niveau', $niveau, PDO::PARAM_INT);
    //     $req -> bindParam('bourse', $bourse, PDO::PARAM_INT);

    //     $req -> execute();
    // }
    
    /**
     * Affiche tous les professeurs
     *
     * @return array
     */
    public static function afficherTous(){
        $req = MonPdo::getInstance() -> prepare("SELECT * FROM vprof");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prof');
        $req -> execute();
        $lesResultats = $req -> fetchAll();

        return $lesResultats;
    }

    public static function deconnexion(){
        session_unset();
        //session_destroy();
    }

	/**
	 * @return 
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * @return 
	 */
	public function getNom(): string {
		return $this->nom;
	}

	/**
	 * @return 
	 */
	public function getPrenom(): string {
		return $this->prenom;
	}

	/**
	 * @return 
	 */
	public function getMail(): string {
		return $this->mail;
	}

	/**
	 * @return 
	 */
	public function getAdresse(): string {
		return $this->adresse;
	}

	/**
	 * @return 
	 */
	public function getInstrument(): string {
		return $this->instrument;
	}

    /**
	 * @return 
	 */
	public function getSalaire(): string {
		return $this->salaire;
	}

}