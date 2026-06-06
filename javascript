// --- SYSTÈME GESTION PANIER HORIZONS ELECTRICAL ---

// Charger le panier depuis la mémoire du navigateur au démarrage
let panier = JSON.parse(localStorage.getItem('horizons_panier')) || [];

// Fonction pour ajouter un produit
function ajouterAuPanier(id, nom, prix) {
    // Vérifier si le produit est déjà présent
    let produitExistant = panier.find(item => item.id === id);
    
    if (produitExistant) {
        produitExistant.quantite += 1;
    } else {
        panier.push({ id: id, nom: nom, prix: prix, quantite: 1 });
    }
    
    // Sauvegarder et mettre à jour l'affichage du compteur
    sauvegarderPanier();
    majCompteurPanier();
    alert(`${nom} a été ajouté à votre panier !`);
}

function sauvegarderPanier() {
    localStorage.setItem('horizons_panier', JSON.stringify(panier));
}

function majCompteurPanier() {
    const compteur = document.getElementById('panier-count');
    if (compteur) {
        let totalArticles = panier.reduce((total, item) => total + item.quantite, 0);
        compteur.innerText = totalArticles;
    }
}

// Initialiser le compteur au chargement de n'importe quelle page
document.addEventListener('DOMContentLoaded', majCompteurPanier);
