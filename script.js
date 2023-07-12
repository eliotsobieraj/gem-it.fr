var arrowProfilButton = document.getElementById("arrow-profil-button");
var menuButtons = document.querySelector(".profil-menu");
var profilstatus = 0;
var profilButtons = document.querySelector(".profil-btn")

arrowProfilButton.addEventListener("click", profilMenuFunction);

function profilMenuFunction() {
    if (profilstatus === 1) {
        menuButtons.style.top = "210px";
        menuButtons.style.opacity = "0";
        arrowProfilButton.style.rotate = "180deg";
        profilstatus = 0;

    } else {
        menuButtons.style.top = "-250px";
        menuButtons.style.opacity = "1";
        arrowProfilButton.style.rotate = "0deg";
        profilstatus = 1;
    }
}



// Récupérer les éléments du DOM
const addToCartButtons = document.getElementsByClassName('add-to-cart');
const cartLink = document.getElementById('cart-link');
const cartCount = document.getElementById('cart-count');

// Initialiser le compteur de panier
let itemCount = 0;

// Ajouter un écouteur d'événement à chaque bouton "Ajouter au panier"
Array.from(addToCartButtons).forEach(button => {
    button.addEventListener('click', () => {
        // Incrémenter le compteur de panier et mettre à jour l'affichage
        itemCount++;
        cartCount.textContent = itemCount;

        // Afficher un message de confirmation
        alert('Produit ajouté au panier !');
    });
});

// Rediriger vers une page de panier fictive lorsque le lien du panier est cliqué
cartLink.addEventListener('click', event => {
    event.preventDefault();
    alert("Redirection vers la page du panier...");
});



