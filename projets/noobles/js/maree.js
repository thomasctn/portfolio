// script.js

// Variables globales
let sea = document.getElementById('sea');
let trashContainer = document.getElementById('trash-container');
let scoreBoard = document.getElementById('score');
let restartButton = document.getElementById('restart-button');
let score = 0;
let seaHeight = 0;
let gameInterval;
let trashInterval;
let removeTrashInterval;
let vitesse = 0;




function incrementeScore(nb){
    score =score + nb;
    if(score<0){
        score = 0;
    }
    scoreBoard.textContent = score;
}

// Ajoute un déchet à une position aléatoire
function spawnTrash() {
    let nb_img = 14;
    const trash = document.createElement('div');
    trash.classList.add('trash');
  
    // Ajout de l'image
    const trashImage = document.createElement('img');

    let nb = Math.floor(Math.random() * nb_img) + 1;

    let imageName = '../images/maree/dechet_' + nb + '.png';
    if (Math.random() < 0.03){
        imageName = '../images/lyreco.png';
    }

    trashImage.src = imageName;
    trashImage.alt = 'Déchet';
    trashImage.style.width = '100px';
    trashImage.style.height = '100%';
    // trashImage.style.pointerEvents = 'none'; // Permet de cliquer sur le div, pas l'image
  
    trash.appendChild(trashImage);
  
    // Positionnement aléatoire
    trash.style.left = Math.random() * 90 + '%';
    trash.style.top = Math.random() * (100-seaHeight-10) + '%';
  
    // Gestion du clic
    trash.addEventListener('click', () => {
        incrementeScore(1);
        seaHeight -= 3.5;
        raiseTide();

        // Ajouter une classe pour l'animation de "récupération"
        trash.classList.add('collect-animation');
        
        // Attendre la fin de l'animation pour supprimer l'élément
        trash.addEventListener('animationend', () => {
            trash.remove();
        }, { once: true }); // L'événement ne doit se déclencher qu'une fois
    });

  
    // Ajout au conteneur
    trashContainer.appendChild(trash);
  }

  function removeTrashBelowSea() {
    const allTrash = document.querySelectorAll('.trash'); 
    const seaTop = window.innerHeight * (1 - seaHeight / 100); 

    allTrash.forEach((trash) => {
        const trashTop = trash.offsetTop; 
        
        // Si le déchet est sous la mer
        if (trashTop >= seaTop) {
            
            trash.classList.add('sink-animation');
            
            
            trash.addEventListener('animationend', () => {
                trash.remove();
            }, { once: true });
        }
    });
}

  
  

// Fait monter la mer progressivement
function raiseTide() {
    removeTrashBelowSea();
  seaHeight += 0.08 + vitesse; // La mer monte de x pt
  vitesse += 0.0000005;
  sea.style.height = seaHeight + 'vh';
  if (seaHeight >= 100) {
    endGame();
  }
}

function endGame() {
    // Arrêter tous les intervalles
    clearInterval(gameInterval);
    clearInterval(trashInterval);
    clearInterval(removeTrashInterval);

    // Créer un overlay pour bloquer les interactions avec le reste de la page
    const overlay = document.createElement('div');
    overlay.classList.add('overlay');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100vw';
    overlay.style.height = '100vh';
    overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)'; // Couleur semi-transparente pour l'arrière-plan
    overlay.style.zIndex = '999'; // Mettre l'overlay au-dessus de tout
    overlay.style.display = 'flex';
    overlay.style.alignItems = 'center';
    overlay.style.justifyContent = 'center';

    // Créer une pop-up
    const popup = document.createElement('div');
    popup.classList.add('popup');
    popup.style.backgroundColor = '#fff';
    popup.style.padding = '20px';
    popup.style.borderRadius = '10px';
    popup.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
    popup.style.textAlign = 'center';
    popup.style.width = '80%';
    popup.style.maxWidth = '400px';

    // Ajouter un message en fonction du score
    const message = document.createElement('p');
    if (score > -1) {
        message.textContent = "Félicitations, vous avez gagné ! Aux abords de la terre, l'océan va et vient au rythme des marées, lissant le sable des plages, et emportant ce qu'il y trouve. Mais il emporte aussi avec lui les déchets que nous y laissons... Heureusement, nous pouvons agir pour éviter cela";
    } else {
        message.textContent = 'Vous avez perdu. Voulez-vous réessayer ?';
    }

    // Bouton pour retourner à l'accueil
    const homeButton = document.createElement('button');
    homeButton.textContent = 'Retour à la page de jeu';
    homeButton.style.margin = '10px';
    homeButton.addEventListener('click', () => {
        window.location.href = '../php/jeu.php'; // Redirection vers l'accueil
    });

    // Bouton pour relancer le jeu
    const retryButton = document.createElement('button');
    retryButton.textContent = 'Réessayer';
    retryButton.style.margin = '10px';
    retryButton.addEventListener('click', () => {
        location.reload(); // Recharge la page pour recommencer
    });

    // Ajout des éléments à la pop-up
    popup.appendChild(message);
    popup.appendChild(homeButton);
    popup.appendChild(retryButton);

    // Ajouter la pop-up à l'overlay
    overlay.appendChild(popup);

    // Ajouter l'overlay à la page
    document.body.appendChild(overlay);
}




// Réinitialise le jeu
function resetGame() {
  clearInterval(gameInterval);
  clearInterval(trashInterval);
  score = 0;
  seaHeight = 0;
  vitesse = 0;
//   scoreBoard.textContent = score;
  sea.style.height = '0';
  trashContainer.innerHTML = '';
  startGame();
}

// Démarre le jeu
function startGame() {
    let temps = 10;
    scoreBoard.textContent = score;
  trashInterval = setInterval(spawnTrash, 500); // Ajoute un déchet chaque seconde
  gameInterval = setInterval(raiseTide, temps);  // La mer monte toutes les 2 secondes
}

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
        toggleButton.textContent = "Attention  la marée monte et la plage est pleine de déchets ! Ramasser le plus de déchets possible pour ralentir la marée et gagner des points. Si les déchets se font emporter par l'océan vous perdez des points... Alors attention et ramassez vite !!";
        toggleButton.classList.add('message');
    } else {
        // Revenir au bouton
        toggleButton.textContent = "?";
        toggleButton.classList.remove('message');
    }

    // Basculer l'état
    isMessage = !isMessage;
});
// Lance le jeu au chargement de la page
startGame();
