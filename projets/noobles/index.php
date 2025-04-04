<?php

echo <<<HTML


<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="./styles/style.css">
		<title>Noobles | Nuit de l'Info Besançon 2024</title>
	</head>

	<body>
		
		
		<main>
			<header>
				<a href="#" id="jeu">
					<img src="images/Noobles_logo.png" alt="Logo des Noobles">
				</a>
				<h1>Bienvenue sur la page des <b>Noobles</b> pour la nuit de l'<b>Info</b></h1>

				<button class="custom-button" onclick="window.location.href='php/jeu.php'">
					<img src="images/logo_jeux.png" id="jeulogo" alt="jeulogo">Et si l'océan était un corps humain ?
				</button>
			</header>
			

			<p>Cette page vous permettra d'en découvrir un peu plus sur l'océan et sur la fondation RACE FOR WATER qui supporte le sujet de la nuit de l'info 2024. </p>

			<div id="icons">
				<a href="images/logo-RaceForWater.png" id="pageJeu" title="Et si l'océan était un corps humain ?"></a>
			</div>

			
			<section>
				<h2 id="quetrouveton">C'est quoi RACE FOR WATER ?</h2>
				
				<div id="paraph">
					<div id="text">
						<p>La fondation <strong>Race For Water</strong> agit depuis presque 15 ans à travers le monde pour comprendre l'impact de la pollution des océans sur les écosystèmes et la santé humaine.<br>
						Créée en 2010 par Marco Simeoni, la fondation apporte aux communautés locales des solutions concrètes et applicables afin de préserver les océans. À bord de navires novateurs chargés de dispositifs scientifiques, la fondation Race For Water parcourt les océans lors de grandes odyssées visant à analyser la vie marine et la pollution des océans.<br></p>
					</div>
					<a href="https://www.raceforwater.org/fr/" target="_blank">
						<img src="images/logo-RaceForWater.png" alt="Logo RFW">
					</a>
					<div id="text">
						<p>La captation du CO2 par les océans est un phénomène inévitable qui augmente l'acidité des mers, ce qui affecte gravement les écosystèmes, mais réduire la présence de CO2 dans l'eau reste possible en réduisant certaines sources d'émissions.<br></p>
					</div>
					<img src="images/captationCO2.png" alt="captation CO2">
				
					<div id="text">
						<p>Le combat de Race For Water pour préserver les océans se mène lors de 3 missions bien distinctes :<br>
							<ul>
								<li>La mission LEARN consiste à obtenir des informations sur le terrain auprès d'experts scientifiques. <br></li>
								<li>La mission SHARE consiste à alerter les lobbyings sur l'impact du CO2 sur les océans et à sensibiliser le grand public. <br></li>
								<li>La mission ACT consiste à apporter des solutions durables et abordables aux compagnies et aux communautés souhaitant agir pour la préservation des océans.<br> </li>
							</ul>
						</p>	
					</div>
					<img src="images/dechetOcean.png" alt="Logo RFW">
				</div>
			</section>


			<section>
				<h2 id="jeu">Jeu des océans</h2>

				<div id="text_ocean">
					<div id="text">
						<p>En cliquant sur le bouton, vous trouverez Atlantis. Atlantis est la représentation humaine de l'océan. <br>
						Votre mission sera de rendre sa santé à Atlantis tout en apprenant sur la vie marine ! </p>
					</div>
					<button class="custom-button" id="section" onclick="window.location.href='php/jeu.php'">
						<img src="images/logo_jeux.png" id="jeulogo" alt="jeulogo">Et si l'océan était un corps humain ?
					</button>
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
