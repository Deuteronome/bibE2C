<?php
session_start();

require_once('../model/Model.php');

$bdd = new Model();

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

if(isset($email) && $email !=null) {
    $user=$bdd->getUserByEmail($email);
    
    if(!$user) {
        $message = "Compte inexistant - vérifiez vos informations de connexion";
        header("location: ../controller/homeController.php?message=$message");
    } else if($password != $user["mdp"]) {
        $message = "Mot de passe erroné - retourne chez toi noob de hacker";
        header("location: ../controller/homeController.php?message=$message");
    } else {
        //tout est ok
        $_SESSION["userId"] = $user["id"];
        $_SESSION["userName"] = $user["user_name"];

        header("location: ../controller/homeController.php");
    }
} else {
    $message = "Mail obligatoire";
    header("location: ../controller/homeController.php?message=$message");
}
