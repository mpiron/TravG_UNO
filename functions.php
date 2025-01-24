<?php
function afficherCartes($listeCartes)
{
    foreach ($listeCartes as $carte) {
        echo '<img class="carte" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '">';
    }
}

// function distribuerCartes($cartes)
//  {
//    array_merge($cartes) . array_splice($listeCartes, 0, 7);
//  }

// $mains = [];  // Tableau pour stocker les cartes des mains des joueurs
// Distribuer 7 cartes à chq joueur sans déclarer les variables
// for ($i = 0; $i < 2; $i++) {  // 2 joueurs
//    $mains = array_splice($cartes, 0, 7);  // 7 cartes par joueur
// } 


function distribuerCartes($cartes)
{
    $main = [];  // Tab pr stocker cartes des mains des joueurs

    // Distribuer 7 cartes 
    for ($i = 0; $i < 7; $i++) {
        $main[] = array_splice($cartes, 0, 1)[0];
        // ou bien 
        // $main = array_merge($main, array_splice($cartes, 0, 1));
    }
    return $main;
}

// $mains = [];  // Tableau pour stocker les cartes des mains des joueurs

// Distribuer 7 cartes à chaque joueur sans déclarer les variables
// for ($i = 0; $i < 2; $i++) {  // 2 joueurs
//    $mains = array_splice($cartes, 0, 7);  // 7 cartes par joueur
// } 


function distribuerCartes($cartes) {
    $mains = [];  // Tab pr stocker cartes des mains des joueurs
    
    // Distribuer cartes à 2 joueur
    for ($i = 0; $i < 2; $i++) {
        // Distribuer $cartesParJoueur cartes à chaque joueur
        $mains[$i] = array_splice($cartes, 0, 2);
       
    }

    print_r($mains);  // affiche les mains/cartes des joueurs
}

// Appeler la fonction pour distribuer 7 cartes à 2 joueurs
$mains = distribuerCartes($cartes, 2, 7);
