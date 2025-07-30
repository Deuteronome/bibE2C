<?php
    session_start();
    
    $pageTitle = "Bibliothèque de l'E2C";
    $pageSubtitle = "Qu'est-ce que c'est ?";
    $navList = [
        [
            "label" => "Bilbliothèque",
            "path" => "../controller/libraryController.php"
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

    //var_dump($navList);
    

    require_once("../view/homeView.php");
?>


