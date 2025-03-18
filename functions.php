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
