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

