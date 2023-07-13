<?php
class Personne
{
    /**
     * Ajoute une personne
     *
     * @param  mixed $nom
     * @param  mixed $prenom
     * @param  mixed $tel
     * @param  mixed $mail
     * @param  mixed $adresse
     * @param  mixed $codePostal
     * @param  mixed $ville
     * @return void
     */
    public static function insertPersonne(string $nom, string $prenom, string $tel, string $mail, string $adresse, string $codePostal, string $ville)
    {

        $req = MonPdo::getInstance()->prepare("INSERT INTO personne (nom, prenom, tel, mail, adresse, codepostal, Ville) VALUES (:nom, :prenom, :tel, :mail, :adresse, :codePostal, :ville)");

        $req->bindParam('nom', $nom, PDO::PARAM_STR);
        $req->bindParam('prenom', $prenom, PDO::PARAM_STR);
        $req->bindParam('tel', $tel, PDO::PARAM_STR);
        $req->bindParam('mail', $mail, PDO::PARAM_STR);
        $req->bindParam('adresse', $adresse, PDO::PARAM_STR);
        $req->bindParam('codePostal', $codePostal, PDO::PARAM_STR);
        $req->bindParam('ville', $ville, PDO::PARAM_STR);

        $req->execute();

    }

    /**
     * getLastId
     *
     * @return int
     */
    public static function getLastId(): int
    {

        $id = 0;

        $id = MonPdo::getInstance()->lastInsertId();

        return ($id);

    }
}