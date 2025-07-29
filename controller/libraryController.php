<?php
    $pageTitle = "Des livres et des histoires!";
    $pageSubtitle = "La bibliothèque de l'E2C";
    $navList = [
        [
            "label" => "Accueil",
            "path" => "../controller/homeController.php"
        ],
        [
            "label" => "Détente",
            "path" => "../controller/gameController.php"
        ]
    ];
    //var_dump($navList);
    $navList[] = [
        "label" => "Connecter",
        "path" => "#"
    ];

    

    require_once("../view/libraryView.php");
?>

