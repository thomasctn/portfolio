<?php
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

// Vérifiez que la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Initialisation de la valeur d'oxygène si elle n'existe pas encore
    if (!isset($_SESSION['value'])) {
        $_SESSION['value'] = 100; // Valeur initiale par défaut
    }

    if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0; // Valeur initiale par défaut
    }


    // Action pour réduire l'oxygène
    if (isset($data['action']) && $data['action'] === 'decrease') {
        $_SESSION['value'] = max(0, $_SESSION['value'] - 1); // Réduit mais ne descend pas sous 0
        echo json_encode(['newValue' => $_SESSION['value']]);
        exit;
    }

    // Action pour augmenter l'oxygène
    if (isset($data['action']) && $data['action'] === 'increase') {
        $_SESSION['value'] = min(100, $_SESSION['value'] + 8); // Augmente mais ne dépasse pas 100
        echo json_encode(['newValue' => $_SESSION['value']]);
        exit;
    }

    if (isset($data['action']) && $data['action'] === 'scoredown') {
        $_SESSION['score'] = max(0, $_SESSION['score'] - 3); // Réduit mais ne descend pas sous 0
        echo json_encode(['newScore' => $_SESSION['score']]);
        exit;
    }

    // Action pour augmenter l'oxygène
    if (isset($data['action']) && $data['action'] === 'scoreup') {
        $_SESSION['score'] = min(50, $_SESSION['score'] + 1); // Augmente mais ne dépasse pas 100
        echo json_encode(['newScore' => $_SESSION['score']]);
        exit;
    }
}

// Si aucune condition n'est remplie, retourner une erreur
http_response_code(400);
echo json_encode(['error' => 'Invalid request']);
