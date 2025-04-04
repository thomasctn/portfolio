<?php

echo <<<HTML
<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="../styles/style.css">
		<title>Noobles | Nuit de l'Info Besançon 2024</title>
	</head>

	<body>
		
		
		<main>
			<header>
				<a href="../index.php" id="jeu">
					<img src="../images/Noobles_logo.png" alt="Logo des Noobles">
				</a>
				<h1>Et si l'océan était un corps humain ? </h1>

				<button class="custom-button" onclick="window.location.href='./jeu.php'">
					<img src="../images/logo_jeux.png" id="jeulogo" alt="jeulogo">Retour page de jeu
				</button>
			</header>

			<section>
				<h2 id="quetrouveton">Les continents</h2>
			
				<div id="paraph">
					<div id="text">
						<p>Sur les continents, des milliards de personnes, souvent inconscientes ou indifférentes, perturbent l'équilibre fragile des océans. <br></p>
					</div>
					<img src="../images/foule.png" alt="vie marine">
				
					<div id="text">
						<p>Par leurs actions, qu'il s'agisse de polluer les eaux, de détruire les écosystèmes marins ou de surexploiter les ressources, elles fragilisent le cœur même de notre planète. Leurs gestes, parfois irréfléchis, plongent les océans dans une crise silencieuse, menaçant ainsi toute forme de vie qui en dépend.<br></p>
					</div>
					<img src="../images/pollution.png" alt="connexion neurologique2">
				</div>
			</section>
    
			
			<footer>
				Nuit de l'info &amp; Noobles &copy; 2024 - Aymeric, Elouan, Laurine, Samia, Thomas 
			</footer>
		</main>
	</body>

</html>
HTML;

$var = "mais pas cette variable";

