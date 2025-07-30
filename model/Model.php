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
            $message = "Connexion impossible - réessayez ultérieurement";
            header("location: ../controller/homeController.php?message=$message");
        }    
        
    }

    public function getAllBooks() {
        //On écrit la requête SQL dans une variable
        $sql = "SELECT * FROM book_vw";
        //On applique cette sql dans une variable (cette ligne ne change jamais)
        $query = $this->bdd->prepare($sql);
        //On éxecute la requête
        $query->execute([]);
        //on récupère les résultats dans une variable - deux option fetch ou fetchAll
        $result = $query->fetchAll();

        //retournant le résultat
        return $result;

    }

    public function getUserByEmail($email) {
        //On écrit la requête SQL dans une variable
        $sql = "SELECT id, mail, mdp, user_name FROM user WHERE mail = :email";
        //On applique cette sql dans une variable (cette ligne ne change jamais)
        $query = $this->bdd->prepare($sql);
        //On éxecute la requête
        $query->execute([
            "email" => $email
        ]);
        //on récupère les résultats dans une variable - deux option fetch ou fetchAll
        $result = $query->fetch();

        //retournant le résultat
        return $result;
    }
    //Définir les méthodes

}