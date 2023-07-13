<?php
class Eleve{

    private int $id;
    private string $nom;
    private string $prenom;
    private string $tel;
    private string $mail;
    private string $adresse;
    private string $codePostal;
    private string $ville;
    private string $niveau;
    private string $bourse;
    
    /**
     * Ajoute un élève
     *
     * @param  int $unId
     * @param  int $niveau
     * @param  int $bourse
     * @return void
     */
    public static function insertEleve(int $unId, int $niveau, int $bourse){

        $req = MonPdo::getInstance() -> prepare("INSERT INTO eleve (ideleve, niveau, bourse) VALUES (:id, :niveau, :bourse)");

        $req -> bindParam('id', $unId, PDO::PARAM_INT);
        $req -> bindParam('niveau', $niveau, PDO::PARAM_INT);
        $req -> bindParam('bourse', $bourse, PDO::PARAM_INT);

        $req -> execute();
    }
    
    /**
     * Affiche tous les élèves
     *
     * @return array
     */
    public static function afficherTous(){
        $req = MonPdo::getInstance() -> prepare("SELECT * FROM veleve");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
        $req -> execute();
        $lesResultats = $req -> fetchAll();

        return $lesResultats;
    }
    
    /**
     * Affiche un élève en fonction de l'id
     *
     * @param  int $unIdEleve
     * @return mixed
     */
    public static function afficherUnEleve(int $unIdEleve){
        $req = MonPdo::getInstance() -> prepare("SELECT * FROM veleve where id = :ideleve");
        $req -> bindParam('ideleve', $unIdEleve, PDO::PARAM_INT);
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'eleve');
        $req -> execute();
        $lesResultats = $req -> fetchAll();

        foreach($lesResultats as $unEleve){
            $eleve = $unEleve;
        }

        return $eleve;
    }

    public static function compterEleves(){
        $req = MonPdo::getInstance() -> prepare("SELECT Count(*) FROM veleve");
        $req -> setFetchMode(PDO::FETCH_BOTH);
        $req -> execute();
        $nbrA = $req -> fetch();

        foreach($nbrA as $nbr){
            $nbr = $nbrA;
        }

        return $nbr;
    }

    public static function compterElevesDep(string $codeDep){
        $req = MonPdo::getInstance() -> prepare("SELECT Count(*) FROM veleve where codepostal like ':codeDep%'");
        $req -> bindParam('codeDep', $codeDep, PDO::PARAM_STR);
        $req -> setFetchMode(PDO::FETCH_BOTH);
        $req -> execute();
        $nbrA = $req -> fetch();

        foreach($nbrA as $nbr){
            $nbr = $nbrA;
        }

        return $nbr;
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
	public function getNiveau(): string {
		return $this->niveau;
	}

    public function getBourse(): string {
		return $this->bourse;
	}

	/**
	 * @return 
	 */
	public function getCodePostal(): string {
		return $this->codePostal;
	}
	
	/**
	 * @param  $codePostal 
	 * @return self
	 */
	public function setCodePostal(string $codePostal): self {
		$this->codePostal = $codePostal;
		return $this;
	}

    /**
	 * @return 
	 */
	public function getVille(): string {
		return $this->ville;
	}
	
	/**
	 * @param  $ville
	 * @return self
	 */
	public function setVille(string $ville): self {
		$this->ville = $ville;
		return $this;
	}
}