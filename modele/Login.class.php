<?php

class Login{

    public static function recupJson(){
                
        $url = "https://guilherme-de-oliveira.efrei.me/Api-Conservatoire/identifiants";

        $html = file_get_contents($url);

        $json = json_decode($html, true);

        return $json;

    }

    public static function verifLogin(string $identifiant, string $motDePasse, array $json){

        $res = false;

        foreach($json as $cpt){
            $login = $cpt['1'];
            $mdp = $cpt['2'];
        }

        if($identifiant == $login && $motDePasse == $mdp){
            $res = true;
        }

        return $res;
    }
}