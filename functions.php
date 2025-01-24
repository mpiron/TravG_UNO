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

    // Distribuer cartes à 2 joueur
    for ($i = 0; $i < 2; $i++) {
        // Distribuer 1 carte 
        $main[$i] = array_splice($cartes, 0, 1)[0];
    }
    return $main;
}
