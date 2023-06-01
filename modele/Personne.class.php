<?php
class Personne{    
    /**
     * Ajoute une personne
     *
     * @param  mixed $nom
     * @param  mixed $prenom
     * @param  mixed $tel
     * @param  mixed $mail
     * @param  mixed $adresse
     * @return void
     */
    public static function insertPersonne(string $nom, string $prenom, string $tel, string $mail, string $adresse){

        $req = MonPdo::getInstance() -> prepare("INSERT INTO personne (nom, prenom, tel, mail, adresse) VALUES (:nom, :prenom, :tel, :mail, :adresse)");

        $req -> bindParam('nom', $nom, PDO::PARAM_STR);
        $req -> bindParam('prenom', $prenom, PDO::PARAM_STR);
        $req -> bindParam('tel', $tel, PDO::PARAM_STR);
        $req -> bindParam('mail', $mail, PDO::PARAM_STR);
        $req -> bindParam('adresse', $adresse, PDO::PARAM_STR);

        $req -> execute();

    }
    
    /**
     * getLastId
     *
     * @return int
     */
    public static function getLastId(): int{

        $id = 0;

        $id = MonPdo::getInstance() -> lastInsertId();

        return ($id);

    }
}