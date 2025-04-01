let currentPlayer = 'X';
let gameMode = '';
let board = ['', '', '', '', '', '', '', '', ''];
let isGameBlocked = false;

const startMessage = document.getElementById('start-message');
const jvsjButton = document.getElementById('jvsj-button');
const jvsordiButton = document.getElementById('jvsordi-button');
const boardCells = document.querySelectorAll('.cell');
const resolveButton = document.getElementById('resolve-button');

jvsjButton.addEventListener('click', () => setGameMode('JvsJ'));
jvsordiButton.addEventListener('click', () => setGameMode('JvsOrdi'));
resolveButton.addEventListener('click', resetGame);

boardCells.forEach(cell => {
    cell.addEventListener('click', handleCellClick);
});

function setGameMode(mode) {
    gameMode = mode;
    startMessage.textContent = mode === 'JvsJ' ? "Mode Joueur vs Joueur sélectionné" : "Mode Joueur vs Ordinateur sélectionné";
    jvsjButton.style.display = 'none';
    jvsordiButton.style.display = 'none';
    startGame();
}

function startGame() {
    board = ['', '', '', '', '', '', '', '', ''];
    currentPlayer = 'X';
    isGameBlocked = false;
    updateBoard();
}

function updateBoard() {
    boardCells.forEach((cell, index) => {
        cell.textContent = board[index];
        cell.disabled = board[index].length > 0;  // Désactive la cellule si elle contient des symboles
    });
}

function handleCellClick(event) {
    if (isGameBlocked) return;
    const index = event.target.dataset.index;

    // Si la case n'est pas déjà occupée par un symbole, on y place le symbole du joueur actuel
    if (board[index] === '') {
        board[index] = currentPlayer;
    } else if (!board[index].includes(currentPlayer)) {
        board[index] += currentPlayer; // Ajoute le symbole à la case
    }
    
    updateBoard();
    checkGameStatus();
    switchPlayer();
}

function switchPlayer() {
    currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
}

function checkGameStatus() {
    if (checkWin()) {
        setTimeout(() => {
            alert(`${currentPlayer === 'X' ? 'O' : 'X'} wins!`);
            resolveButton.style.display = 'block';
        }, 100);
        isGameBlocked = true;
    } else if (board.every(cell => cell !== '')) {
        setTimeout(() => {
            alert("It's a draw!");
            resolveButton.style.display = 'block';
        }, 100);
        isGameBlocked = true;
    }

    if (gameMode === 'JvsOrdi' && currentPlayer === 'O' && !isGameBlocked) {
        isGameBlocked = true;
        setTimeout(computerMove, 1000);
    }
}

function checkWin() {
    const winPatterns = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8], // rows
        [0, 3, 6], [1, 4, 7], [2, 5, 8], // columns
        [0, 4, 8], [2, 4, 6] // diagonals
    ];

    return winPatterns.some(pattern => {
        const [a, b, c] = pattern;
        const patternString = [board[a], board[b], board[c]].join('');
        return (patternString.includes('XX') || patternString.includes('OO')); // Vérifie si XX ou OO existe
    });
}

function computerMove() {
    const emptyCells = board
        .map((cell, index) => cell === '' ? index : null)
        .filter(index => index !== null);

    if (emptyCells.length > 0) {
        const randomIndex = emptyCells[Math.floor(Math.random() * emptyCells.length)];
        board[randomIndex] = 'O';
        updateBoard();
        checkGameStatus();
        switchPlayer();
    }
}

function resetGame() {
    startMessage.textContent = 'Choisissez un mode de jeu';
    jvsjButton.style.display = 'inline-block';
    jvsordiButton.style.display = 'inline-block';
    resolveButton.style.display = 'none';
    startGame();
}
