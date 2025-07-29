<?php

class Model {
    //Definir propriétés
    private PDO $bdd;
    //Constucteur
    public function __construct()
    {
        try{
            $this->bdd = new PDO('mysql:host=localhost;dbname=pn_livres;charset=utf8','pn_livres_admin','T?2Z9R6%!8rten');
        }catch(Exception $e) {
            echo("connexion impossible =".$e->getMessage());
        }
        
        
        var_dump($this->bdd);
    }
    //Définir les méthodes

}