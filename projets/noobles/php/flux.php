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
					<img src="../images/logo_jeux.png" alt="Logo des Noobles">
				</a>
				<h1>Et si l'océan était un corps humain ? </h1>

				<button class="custom-button" onclick="window.location.href='./jeu.php'">
					<img src="../images/logo_jeux.png" id="jeulogo" alt="jeulogo">Retour page de jeu
				</button>
			</header>

			<section>
				<h2 id="quetrouveton">Flux d'Atlantis</h2>
			
				<div id="paraph">
					<div id="text">
						<p>Les courants marins, comme les flux sanguins dans les veines d’un corps vivant, circulent sans fin, portant la vie à travers l’océan.<br></p>
					</div>
					<img src="../images/flux_ocean.png" alt="flux">
				
					<div id="text">
						<p>Tels des artères essentielles, ils distribuent les nutriments et régulent la température, maintenant l’équilibre fragile de ce vaste monde aquatique.<br></p>
					</div>
					<img src="../images/artere.png" alt="artere">
				
					<div id="text">
						<p>Comme le sang qui pulse dans nos veines, ces flux marins tissent un réseau invisible mais vital, permettant à l’écosystème de respirer et de se renouveler.<br></p>	
					</div>
					<img src="../images/ecosysteme.png" alt="Logo RFW">
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
