<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/coeur.css">
    <link rel="stylesheet" type="text/css" href="../styles/bouton_retour.css" />
    <title>Noobles | Le cœur des océans</title>
    <style>
        canvas {
            display: block;
            margin: 0 auto;
            background: #111E2C;
        }
    </style>
</head>

<body>
    <audio id="backgroundAudio" loop>
        <source src="../musique/musique1.mp3" type="audio/mpeg">
        Votre navigateur ne supporte pas l'audio HTML5.
    </audio>
    <button id="soundToggle">🔊 Activer le son</button>
    <div id="messageBox"></div>
    <button id="toggleButton">?</button>
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
    </div>
    <canvas id="gameCanvas" width="1000" height="800"></canvas>

    <script>
        const audio = document.getElementById('backgroundAudio');
        const soundButton = document.getElementById('soundToggle');

        // Initialisation (le son est désactivé au début)
        let isPlaying = false;

        // Fonction pour activer/désactiver le son
        soundButton.addEventListener('click', () => {
            if (isPlaying) {
                audio.pause(); // Pause l'audio
                soundButton.textContent = '🔊';
            } else {
                audio.play(); // Joue l'audio
                soundButton.textContent = '🔇';
            }
            isPlaying = !isPlaying; // Alterne l'état
        });


        const toggleButton = document.getElementById('toggleButton');

        // Définir deux états : "bouton" et "message"
        let isMessage = false;

        toggleButton.addEventListener('click', () => {
            if (!isMessage) {
                // Passer au message
                toggleButton.textContent = "Vous devez trouver le cœur de l'océan pour sauver Atlantis !\n Malheureusement la lumière ne nous parvient plus a cette profondeur...\n Rassurez-vous, les pierres vertes vous permetteront d'éclairer les alentours !";
                toggleButton.classList.add('message');
            } else {
                // Revenir au bouton
                toggleButton.textContent = "?";
                toggleButton.classList.remove('message');
            }

            // Basculer l'état
            isMessage = !isMessage;
        });
        const homeButton = document.createElement('button');
        homeButton.textContent = 'Retour';
        homeButton.addEventListener('click', () => {
            window.location.href = '../jeu.php'; // Redirection vers l'accueil
        });


        const canvas = document.getElementById('gameCanvas');
        const ctx = canvas.getContext('2d');

        // Chargement des images
        const playerImg = new Image();
        playerImg.src = '../images/coeur/baudroie.png';

        // Tableau des objets
        let collectibles = [{
                x: 20,
                y: 20,
                width: 40,
                height: 40,
                img: '../images/coeur/pierre.png',
                effect: () => {
                    console.log('minerai étrange consomer ! Lumière augmentée !');
                    player.lightRadius += 100;

                },
                collected: false
            },
            {
                x: 790,
                y: 300,
                width: 40,
                height: 40,
                img: '../images/coeur/pierre.png',
                effect: () => {
                    console.log('minerai étrange consomer ! Lumière augmentée !');
                    player.lightRadius += 100;

                },
                collected: false
            },
            {
                x: 410,
                y: 380,
                width: 40,
                height: 40,
                img: '../images/coeur/coeur.png',
                effect: () => {
                    endGame();
                    console.log("Vous avez trouvé le cœur de la mer ! Vous avez gagné ! Le cœur de l'océan  pulse au rythme des marées et transporte la vie à travers ses courants. Il est l'âme profonde de la planète, inspirant l'air que nous respirons, régulant le climat et abritant une diversité infinie d'espèces.  Ce cœur, épuisé par les blessures infligées par l'humanité, continue de battre mais s'affaiblit de jour en jour...")
                },
                collected: false
            }
        ];

        // Charger les images des objets
        collectibles.forEach(obj => {
            obj.image = new Image();
            obj.image.src = obj.img;
        });

        // Personnage
        let player = {
            x: 480,
            y: 50,
            width: 40,
            height: 40,
            lightRadius: 100,
            speed: 7,
            dx: 0,
            dy: 0
        };

        // Obstacles
        const obstacles = [{
                x: 320,
                y: 80,
                width: 140,
                height: 20
            },
            {
                x: 550,
                y: 80,
                width: 220,
                height: 20
            },
            {
                x: 380,
                y: 80,
                width: 20,
                height: 200
            },
            {
                x: 610,
                y: 80,
                width: 20,
                height: 200
            },
            {
                x: 230,
                y: 0,
                width: 20,
                height: 120
            },
            {
                x: 760,
                y: 0,
                width: 20,
                height: 120
            },
            {
                x: 480,
                y: 170,
                width: 20,
                height: 50
            },
            {
                x: 520,
                y: 170,
                width: 20,
                height: 50
            },
            {
                x: 480,
                y: 170,
                width: 50,
                height: 20
            },
            {
                x: 480,
                y: 210,
                width: 60,
                height: 20
            },
            {
                x: 380,
                y: 350,
                width: 320,
                height: 20
            },
            {
                x: 0,
                y: 0,
                width: 1000,
                height: 5
            },
            {
                x: 0,
                y: 0,
                width: 5,
                height: 800
            },
            {
                x: 995,
                y: 0,
                width: 5,
                height: 800
            },
            {
                x: 0,
                y: 795,
                width: 1000,
                height: 5
            },
            {
                x: 60,
                y: 60,
                width: 100,
                height: 100
            },
            {
                x: 840,
                y: 60,
                width: 100,
                height: 100
            },
            {
                x: 300,
                y: 200,
                width: 20,
                height: 250
            },
            {
                x: 680,
                y: 200,
                width: 20,
                height: 250
            },
            {
                x: 760,
                y: 100,
                width: 20,
                height: 270
            },
            {
                x: 600,
                y: 530,
                width: 160,
                height: 20
            },
            {
                x: 300,
                y: 430,
                width: 300,
                height: 20
            },
            {
                x: 760,
                y: 450,
                width: 20,
                height: 250
            },
            {
                x: 380,
                y: 350,
                width: 20,
                height: 100
            },
            {
                x: 380,
                y: 350,
                width: 20,
                height: 100
            },
            {
                x: 60,
                y: 650,
                width: 100,
                height: 80
            },
            {
                x: 840,
                y: 650,
                width: 100,
                height: 100
            },
            {
                x: 840,
                y: 100,
                width: 20,
                height: 460
            },
            {
                x: 680,
                y: 350,
                width: 80,
                height: 20
            },
            {
                x: 860,
                y: 350,
                width: 80,
                height: 20
            },
            {
                x: 920,
                y: 450,
                width: 80,
                height: 20
            },
            {
                x: 860,
                y: 540,
                width: 80,
                height: 20
            },
            {
                x: 920,
                y: 250,
                width: 80,
                height: 20
            },
            {
                x: 760,
                y: 350,
                width: 80,
                height: 20
            },
            {
                x: 100,
                y: 700,
                width: 680,
                height: 20
            },
            {
                x: 320,
                y: 620,
                width: 460,
                height: 20
            },
            {
                x: 100,
                y: 520,
                width: 400,
                height: 20
            },
            {
                x: 320,
                y: 520,
                width: 20,
                height: 100
            },
            {
                x: 480,
                y: 440,
                width: 20,
                height: 80
            },
            {
                x: 200,
                y: 220,
                width: 20,
                height: 230
            },
            {
                x: 200,
                y: 430,
                width: 100,
                height: 20
            },
            {
                x: 70,
                y: 220,
                width: 130,
                height: 20
            },
            {
                x: 100,
                y: 320,
                width: 20,
                height: 120
            },
            {
                x: 5,
                y: 320,
                width: 115,
                height: 20
            },
            {
                x: 230,
                y: 600,
                width: 20,
                height: 100
            }
        ];
        const decorations = [{
                x: 100,
                y: 600,
                width: 50,
                height: 80,
                img: '../images/poumon/algue1.png'
            },
            {
                x: 100,
                y: 40,
                width: 60,
                height: 40,
                img: '../images/poumon/algue2.png'
            },
            {
                x: 840,
                y: 620,
                width: 40,
                height: 60,
                img: '../images/poumon/algue3.png'
            },
            {
                x: 500,
                y: 300,
                width: 40,
                height: 60,
                img: '../images/poumon/algue4.png'
            },
            {
                x: 490,
                y: 120,
                width: 40,
                height: 60,
                img: '../images/poumon/algue2.png'
            },
            {
                x: 620,
                y: 580,
                width: 135,
                height: 40,
                img: '../images/lyreco.png'
            },
            {
                x: 600,
                y: 580,
                width: 40,
                height: 40,
                img: '../images/poumon/algue4.png'
            },
            {
                x: 720,
                y: 590,
                width: 40,
                height: 40,
                img: '../images/poumon/algue3.png'
            }
        ];

        // Charger les images des décorations
        decorations.forEach(decoration => {
            decoration.image = new Image();
            decoration.image.src = decoration.img;
        })

        // Zone éclairée modifiée
        function drawLight() {
            ctx.save();
            ctx.globalCompositeOperation = 'destination-in';
            ctx.beginPath();
            ctx.arc(player.x + player.width / 2, player.y + player.height / 2, player.lightRadius, 0, Math.PI * 2);
            ctx.fillStyle = 'white';
            ctx.fill();
            ctx.restore();
        }

        function drawDecorations() {
            decorations.forEach(decoration => {
                ctx.drawImage(decoration.image, decoration.x, decoration.y, decoration.width, decoration.height);
            });
        }

        // Affichage du jeu
        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            drawDecorations();
            // Dessiner les obstacles
            ctx.fillStyle = 'black';
            obstacles.forEach(obs => {
                ctx.fillRect(obs.x, obs.y, obs.width, obs.height);
            });

            // Dessiner les objets à ramasser
            collectibles.forEach(obj => {
                if (!obj.collected) {
                    ctx.drawImage(obj.image, obj.x, obj.y, obj.width, obj.height);
                }
            });
            // Dessiner le joueur
            ctx.drawImage(playerImg, player.x, player.y, player.width, player.height);

            // Zone visible
            drawLight();
        }

        // Vérifier collision avec un rectangle
        function isColliding(rect1, rect2) {
            return !(
                rect1.x > rect2.x + rect2.width ||
                rect1.x + rect1.width < rect2.x ||
                rect1.y > rect2.y + rect2.height ||
                rect1.y + rect1.height < rect2.y
            );
        }
        // Vérifier collision avec un objet à ramasser
        function isCollecting(circle, collectible) {
            const distX = circle.x - collectible.x;
            const distY = circle.y - collectible.y;
            const distance = Math.sqrt(distX * distX + distY * distY);

            return distance <= circle.radius + collectible.radius;
        }

        function showMessage(message) {
            const messageBox = document.getElementById('messageBox');
            messageBox.textContent = message;
            messageBox.style.display = 'block';
            setTimeout(() => {
                messageBox.style.display = 'none';
            }, 2000); // Le message disparaît après 2 secondes
        }

        // Fin du jeu
        function endGame() {

            // Créer une pop-up
            const popup = document.createElement('div');
            popup.classList.add('popup');

            // Ajouter un message en fonction du score
            const message = document.createElement('p');
            message.textContent = 'Vous avez trouvé le cœur de la mer ! Vous avez gagné ! Le cœur de l’océan  pulse au rythme des marées et transporte la vie à travers ses courants. Il est l’âme profonde de la planète, inspirant l’air que nous respirons, régulant le climat et abritant une diversité infinie d’espèces.  Ce cœur, épuisé par les blessures infligées par l’humanité, continue de battre mais s\'affaiblit de jour en jour...';


            // Bouton pour retourner à l'accueil
            const homeButton = document.createElement('button');
            homeButton.textContent = "Retour à la page de jeu";
            homeButton.addEventListener('click', () => {
                window.location.href = 'jeu.php'; // Redirection vers l'accueil
            });

            // Bouton pour relancer le jeu
            const retryButton = document.createElement('button');
            retryButton.textContent = 'Rejouer';
            retryButton.addEventListener('click', () => {
                location.reload(); // Recharge la page pour recommencer
            });

            // Ajout des éléments à la pop-up
            popup.appendChild(message);
            popup.appendChild(homeButton);
            popup.appendChild(retryButton);

            // Ajouter la pop-up à la page
            document.body.appendChild(popup);
        }


        function updatePlayer() {
            const nextX = player.x + player.dx;
            const nextY = player.y + player.dy;

            // Vérifier les collisions avec chaque obstacle
            let collision = false;
            obstacles.forEach(obs => {
                if (isColliding({
                        x: nextX,
                        y: nextY,
                        width: player.width,
                        height: player.height
                    }, obs)) {
                    collision = true;
                }
            });
            // Si pas de collision, on met à jour la position
            if (!collision) {
                player.x = nextX;
                player.y = nextY;
            }
            // Vérifier si le joueur ramasse un objet
            collectibles.forEach(obj => {
                if (!obj.collected && isColliding(player, obj)) {
                    obj.collected = true; // Marquer comme ramassé
                    obj.effect(); // Activer l'effet
                    showMessage('Pierre verte mangée ! Lumière augmentée !'); // Afficher un message
                }
            });
        }

        // Déplacement
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowUp') player.dy = -player.speed;
            if (e.key === 'ArrowDown') player.dy = player.speed;
            if (e.key === 'ArrowLeft') player.dx = -player.speed;
            if (e.key === 'ArrowRight') player.dx = player.speed;
        });

        document.addEventListener('keyup', (e) => {
            if (e.key === 'ArrowUp' || e.key === 'ArrowDown') player.dy = 0;
            if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') player.dx = 0;
        });

        // Boucle du jeu
        let gameLoopId;

        function gameLoop() {
            updatePlayer();
            draw();
            requestAnimationFrame(gameLoop);
        }

        gameLoop();
    </script>
    <div class="bubble bubble-type1"></div>
    <div class="bubble bubble-type2"></div>
    <div class="bubble bubble-type2"></div>
    <div class="bubble bubble-type1"></div>
    <div class="bubble bubble-type3"></div>
    <div class="bubble bubble-type1"></div>
    <div class="bubble bubble-type3"></div>
    <div class="bubble bubble-type2"></div>
    <div class="bubble bubble-type1"></div>
    <div class="bubble bubble-type1"></div>
    <div class="bubble bubble-type1"></div>
    <div class="bubble bubble-type2"></div>
    <div class="bubble bubble-type2"></div>
    <div class="bubble bubble-type4"></div>
    <div class="bubble bubble-type3"></div>
    <div class="bubble bubble-type1"></div>
    <div class="bubble bubble-type3"></div>
    <div class="bubble bubble-type2"></div>
    <div class="bubble bubble-type1"></div>
    <div class="bubble bubble-type1"></div>
</body>

</html>