<!DOCTYPE html>    
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ici on lit!</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../src/logo.png">
    <script src="../script/test.js"></script>
    <script src="../script/connect.js" defer></script>
    <script src="../script/flash.js" defer></script>
</head>

</head>
<body>
    <!-- ZoneLa bibliothèque de l'E2C du menu, en haut de la page-->
    
    <!-- En tête stylé-->
    <?php
        require_once("../view/_partials/_nav.php");
        require_once("../view/_partials/_header.php");
        require_once("../view/_partials/_connect.php");
        if(isset($_GET["message"])) {
            require_once("../view/_partials/_flashMessage.php");
        }
        if(isset($_SESSION["userId"])) {
            require_once("../view/_partials/_footer.php");
        }
    ?>
    <!-- Zone peincipale -->
   
</body>

</html>