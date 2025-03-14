<?php

function afficherCartes($listeCartes, $sourceCarte = "none")
{
    $compteur = 0;
    foreach ($listeCartes as $carte) {
        echo '<a href="index.php?carte=' . $compteur . '&source=' . $sourceCarte . '"><img class="carte" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '"></a>';
        $compteur += 1;
    }
}


function jouerCarte($positionDansLaMain, $identiteJoueur = "none")
{
    global $mainJoueur1, $mainJoueur2, $defausse;
    if ($identiteJoueur == 1) {
        // Comparer la couleur, la valeur ou joker
        if (($defausse[0]['couleur'] == $mainJoueur1[$positionDansLaMain]['couleur'] or $defausse[0]['valeur'] == $mainJoueur1[$positionDansLaMain]['valeur'] or $mainJoueur1[$positionDansLaMain]['couleur'] == 'joker' or $defausse[0]['couleur'] == 'joker') and  tourJoueur(1) == true) {
            //    echo "Carte déposée a la même couleur";
            $carteJouee = array_splice($mainJoueur1, $positionDansLaMain, 1);
            // Ajouter la carte au début de la défausse
            array_unshift($defausse, $carteJouee[0]);
            $tour += 1;   //et jerer joker
        }
    } elseif ($identiteJoueur == 2) {
        // Comparer la couleur, la valeur ou joker
        if (($defausse[0]['couleur'] == $mainJoueur2[$positionDansLaMain]['couleur'] or $defausse[0]['valeur'] == $mainJoueur2[$positionDansLaMain]['valeur'] or $mainJoueur2[$positionDansLaMain]['couleur'] == 'joker' or $defausse[0]['couleur'] == 'joker') and tourJoueur(2) == true) {
            //    echo "Carte déposée a la même couleur"; 
            $carteJouee = array_splice($mainJoueur2, $positionDansLaMain, 1);
            // Ajouter la carte au début de la défausse
            array_unshift($defausse, $carteJouee[0]);
        }
    }
}






function tourJoueur($identiteJoueur)
{
    global $tour;

    //le premier tour est initialisé à 1, le joueur 1 joue les impairs
    if (($identiteJoueur == 1 and $tour % 2 == 1) or ($identiteJoueur == 2 and $tour % 2 == 0)) {
        return true;
    } else {
        return false;
    }
}




function afficherCarteSup($defausse)
{
    echo '<img class="carte" src="cartes/' . $defausse[0]['image'] . '" alt="' . $defausse[0]['nom'] . '">';
}


function afficherPioche()
{
    echo '<img class="carte" src="cartes/pioche.jpg" alt="Piocher">';
}


function distribuerCartes($cartes)
{
    global $mainJoueur1, $mainJoueur2, $defausse, $pioche;
    if (!isset($mainJoueur1)) $mainJoueur1 = [];
    if (!isset($mainJoueur2)) $mainJoueur2 = [];
    if (!isset($defausse)) $defausse = [];
    if (!isset($pioche)) $pioche = [];

    for ($i = 0; $i < 7; $i++) {
        $mainJoueur1 = array_merge($mainJoueur1, array_splice($cartes, 0, 1));
        $mainJoueur2 = array_merge($mainJoueur2, array_splice($cartes, 0, 1));
    }
    $defausse = array_splice($cartes, 0, 1);  //on retourne la 1er carte de la pioche
    $pioche = $cartes; //les cartes qui restent se retrouvent dans la pioche
}












// //exmples trouvé: 

// // https://openclassrooms.com/forum/sujet/fonction-quot-pour-alternerquot-83828 

// //1 ex
// // Initialisation des joueurs
// $joueurs = ["Joueur 1", "Joueur 2"];
// $tour = 0; // Indice du joueur actuel

// // Fonction pour alterner les joueurs
// function alternerJoueur(&$tour)
// {
//     $tour = ($tour + 1) % 2;
// }

// // Simulation de quelques tentatives
// for ($i = 0; $i < 10; $i++) {
//     echo "Tentative " . ($i + 1) . ": " . $joueurs[$tour] . " joue.\n";
//     alternerJoueur($tour);
// }



// //2 ex 
// function alternerJoueur($joueurActuel) {
//     return $joueurActuel === 'Joueur 1' ? 'Joueur 2' : 'Joueur 1';
// }

// // Exemple d'utilisation
// $joueurActuel = 'Joueur 1';
// $joueurSuivant = alternerJoueur($joueurActuel);
// echo "Le joueur suivant est : " . $joueurSuivant; // Affiche "Le joueur suivant est : Joueur 2"


// //3 ex (ce que j'ai fait en mieux)
// $identiteJoueur = [$mainJoueur1, $mainJoueur2];
// $tour = 0; // Initialiser le tour
// $impair = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31, 33, 35, 37, 39, 41, 43, 45, 47, 49, 51, 53, 55, 57, 59, 61, 63, 65, 67, 69, 71, 73, 75, 77, 79, 81, 83, 85, 87, 89, 91, 93, 95, 97, 99];
// $pair = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 80, 82, 84, 86, 88, 90, 92, 94, 96, 98, 100];

// function alternerEntreJoueur($tour, $impair, $pair)
// {
//     $tour += 1;
    
//     // Vérifier si le tour est impair
//     if (in_array($tour, $impair)) {
//         return 1; // Joueur 1
//     }
//     // Vérifier si le tour est pair
//     if (in_array($tour, $pair)) {
//         return 2; // Joueur 2
//     }
//     return null; // Si aucun match, retourne null
// }

// // Exemple d'utilisation :
// $tourActuel = $tour;
// $joueurActuel = alternerEntreJoueur($tourActuel, $impair, $pair);
// echo "Le joueur actuel est : " . $joueurActuel;  // Affiche 1 ou 2 en fonction du tour
