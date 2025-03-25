<?php
session_start();

// Toujours réinitialiser la valeur de l'oxygène à 100 au chargement
$_SESSION['value'] = 100;
$_SESSION['score'] = 0;

$oxygen = $_SESSION['value'];
$score = $_SESSION['score'];

if (isset($_COOKIE['bestScore'])) {
    $record = intval($_COOKIE['bestScore']); // Convertir en entier pour éviter les erreurs
} else {
    $record = 0;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/poumon.css">
    <link rel="stylesheet" href="../styles/bouton_retour2.css">
    <title>Breath Game</title>
</head>

<body>

    <div class="lignebouton">

        <div class="div_a">
            <a href="../php/jeu.php">
                <button class="button">
                    <div class="button-box">
                        <span class="button-elem">
                            <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                            </svg>
                        </span>
                        <span class="button-elem">
                            <svg viewBox="0 0 46 40">
                                <path
                                    d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                            </svg>
                        </span>
                    </div>
                </button>
            </a>
            <button id="toggleButton">?</button>
        </div>
        <div class="scoreCard">
            <div class="walletBalanceCard">
                <div class="icon_score">
                    <img id="imgicon" src="../images/dechets.png" />
                </div>

                <div class="balancewrapper">

                    <p class="balance">Score : <?php echo $score ?> </p>
                    <p class="record">Best score : <?php echo $record ?></p>
                </div>
            </div>
            <div class="walletBalanceCard" id="oxygen">
                <div class="icon_score">
                    <img id="imgiconoxy" src="../images/oxygen.png" />
                </div>
                <p class="oxygentext">Oxygen : <?php echo $oxygen ?>%</p>
            </div>
            <div id="messageBox" style="display: none; border: 1px solid #ccc; padding: 10px; margin-top: 10px; max-width: 300px;"></div>
        </div>
    </div>



    <div class="container">
        <div class="line">
            <div class="character"></div>
        </div>
    </div>

    <script src="../js/poumon.js"></script>

</body>

</html>