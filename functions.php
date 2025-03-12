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
        // Comparer la couleur
        if ($defausse[0]['couleur'] == $mainJoueur1[$positionDansLaMain]['couleur'] or $defausse[0]['valeur'] == $mainJoueur1[$positionDansLaMain]['valeur'] or $mainJoueur1[$positionDansLaMain]['couleur'] == 'joker' or $defausse[0]['couleur'] == 'joker') {
            //    echo "Carte déposée a la même couleur";
            $carteJouee = array_splice($mainJoueur1, $positionDansLaMain, 1);
            // Ajouter la carte au début de la défausse
            array_unshift($defausse, $carteJouee[0]);
        }
    } elseif ($identiteJoueur == 2) {
        // Comparer la couleur
        if ($defausse[0]['couleur'] == $mainJoueur2[$positionDansLaMain]['couleur'] or $defausse[0]['valeur'] == $mainJoueur2[$positionDansLaMain]['valeur'] or $mainJoueur2[$positionDansLaMain]['couleur'] == 'joker' or $defausse[0]['couleur'] == 'joker') {
            //    echo "Carte déposée a la même couleur"; 
            $carteJouee = array_splice($mainJoueur2, $positionDansLaMain, 1);
            // Ajouter la carte au début de la défausse
            array_unshift($defausse, $carteJouee[0]);
        }
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



function tourJoueur($identiteJoueur)
{
    global $mainJoueur1, $mainJoueur2, $defausse, $pioche;

    if ($identiteJoueur == 1) {
        $identiteJoueur += 1;
    }
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
