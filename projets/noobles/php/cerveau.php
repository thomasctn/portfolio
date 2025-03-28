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
				<h2 id="quetrouveton">Cerveau d'Atlantis</h2>
			
				<div id="paraph">
					<div id="text">
						<p>Le cerveau de l'océan est la faune qui le compose, une toile vivante d'interactions où chaque espèce joue un rôle essentiel dans l'équilibre de cet écosystème complexe. De l'infinie diversité des poissons, des cétacés majestueux, des coraux fragiles et des micro-organismes invisibles à l'œil nu, chaque créature contribue à l'harmonie de l'ensemble<br></p>
					</div>
					<img src="../images/vie_marine.png" alt="vie marine">
				
					<div id="text">
						<p>Comme un cerveau interconnecté, chaque action des animaux marins, que ce soit la migration des baleines, la chasse des prédateurs, ou les cycles de reproduction, influence et régule les processus biologiques et écologiques.<br></p>
					</div>
					<img src="../images/connexion_neurologique.png" alt="connexion neurologique2">
				
					<div id="text">
						<p>Ces interactions façonnent les courants marins, la qualité de l'eau et la santé des habitats. Ainsi, la faune marine n'est pas seulement une partie de l'océan, mais en est le véritable "cerveau", régulant et maintenant l'équilibre dynamique de cet environnement vital pour la planète.<br></p>	
					</div>
					<img src="../images/courant_marin.png" alt="courant marin">
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
