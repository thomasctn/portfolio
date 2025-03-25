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

				<button class="custom-button" onclick="window.location.href='../index.php'">
					<img src="../images/Noobles_logo.png" id="jeulogo" alt="jeulogo">Retour page d'acceuil
				</button>
			</header>
			

			<p>Vous allez devoir redonner sa santé à Atlantis ! Différents organes de son corps ont été touchés et pour l'instant, son corps, ses poumons et son pied droit sont malades... Pour les soigner, cliquer dessus, répondez aux attentes et récupérer la bonne santé de l'organe ! <br></p>
      
      <h3>Bon courage !  </h3>

			
			<section>
				<h2 id="atlantis">ATLANTIS</h2>
        <p> Cliquer sur les parties du corps <strong>pour jouer</strong> : </p>
				
        <div id="bonhomme">	

		  <!-- Image Map Generated by http://www.image-map.net/ -->
		<img src="../images/Bonhomme.png" id="bonhomme_img"toggle-width  ---query usemap="#image-map"  alt="bonhomme">

		<map name="image-map">
			<area  alt="maree" title="jeu marée" href="../html/maree.html" coords="246,716,259,732,283,740,322,742,353,725,370,693,371,645,376,604,380,571,387,533,405,510,304,411,291,543,285,598,282,637,280,663,263,680,252,693" shape="poly">
			<area  alt="pied_droit" title="flux sanguins" href="flux.php" coords="408,510,423,515,430,534,443,578,456,646,460,689,476,725,496,738,522,748,554,741,582,730,583,707,569,692,554,677,545,636,535,554,526,505,511,411" shape="poly">
			<area  alt="poumons" title="jeu poumons" href="poumons.php" coords="303,412,308,346,230,418,205,420,181,399,181,373,251,309,311,250,359,230,451,233,380,231,397,233,408,258,426,305,470,321,482,353,511,406,408,411,396,496" shape="poly">
			<area  alt="cœur" title="jeu cœur" href="coeur.php" coords="420,263,426,302,471,322,505,392,506,351,523,355,562,311,509,254,466,234,409,232,419,263" shape="poly">
			<area alt="cerveau" title="cerveau" href="cerveau.php" coords="358,226,337,207,316,178,313,143,327,104,351,81,384,64,419,61,449,69,478,90,497,121,500,159,495,185,475,209,451,229,423,233,372,231" shape="poly">
			<area alt="lyreco" title="lyreco" href="https://www.lyreco.com/webshop/FRFR/index.html" coords="525,354,578,414,604,422,618,417,631,405,634,382,620,363,598,343,582,329,565,316,548,313" shape="poly">
			<area alt="montagne" title="montagne" href="montagne.php" coords="527,231,630,235,674,194,645,155,576,158" shape="poly">
			<area  alt="montagne" title="montagne" href="montagne.php" coords="118,558,219,565,263,523,234,480,164,484,142,518,130,538,125,545" shape="poly">
			<area  alt="montagne" title="montagne" href="montagne.php" coords="547,545,580,558,643,555,695,547,657,503,624,498,576,502" shape="poly">
			<area  alt="montagne" title="montagne" href="montagne.php" coords="130,265,234,268,186,190" shape="poly">

		</map>
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
