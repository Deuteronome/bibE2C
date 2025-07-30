<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque E2C</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../src/logo.png">
    <script src="../script/test.js" defer></script>
    <script src="../script/connect.js" defer></script>
    <script src="../script/flash.js" defer></script>
</head>
</head>







<body>
    <!-- Zone du menu, en haut de la page-->
  

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
    
   
    <!--Zone principale -->
    <div id="main-game">
        <div id="user-interface">
            <div>
                <label for="user-number">Entrez un nombre entre 1 et 100</label>            
                <input id="user-number" name="user-number" type="number" placeholder="Votre nombre ici" min="1" max="100" >
            </div>
               
            <input id="send-button" type="submit" value="Proposer"> 
        </div>
            
               
            
        <div id="game-display">

        </div>
    </div>
   
</body>
</html>
               
            