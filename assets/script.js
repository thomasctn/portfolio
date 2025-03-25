// Fonction pour ouvrir et fermer le menu principal
function toggleMenu() {
    let menu = document.getElementById("menu");
    let overlay = document.getElementById("overlay");
    let hamburger = document.querySelector(".hamburger");

    if (menu.style.width === "250px") {
        menu.style.width = "0";
        overlay.style.display = "none";
        hamburger.classList.remove("open"); // Réinitialiser le bouton
    } else {
        menu.style.width = "250px";
        overlay.style.display = "block";
        hamburger.classList.add("open"); // Ajouter la classe pour la transformation
    }
}

// Fonction pour ouvrir/fermer le sous-menu "Mes codes"
document.getElementById('mesCodesLink').addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le lien de se comporter de manière classique

    var dropdown = document.getElementById('mesCodesDropdown');
    dropdown.classList.toggle('show'); // Bascule l'affichage du sous-menu
});

// Ferme le sous-menu si on clique en dehors de celui-ci
document.addEventListener('click', function(event) {
    var dropdown = document.getElementById('mesCodesDropdown');
    var mesCodesLink = document.getElementById('mesCodesLink');

    // Si le clic n'est pas sur le lien "Mes codes" ou sur le sous-menu
    if (!mesCodesLink.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.remove('show'); // Ferme le sous-menu
    }
});
