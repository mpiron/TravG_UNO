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
        if ($defausse[0]['couleur'] == $mainJoueur1[$positionDansLaMain]['couleur'] or $defausse[0]['valeur'] == $mainJoueur1[$positionDansLaMain]['valeur'] or $mainJoueur2[$positionDansLaMain]['image'] == ['joker01.jpg', 'joker02.jpg']) {
            //    echo "Carte déposée a la même couleur";
            $carteJouee = array_splice($mainJoueur1, $positionDansLaMain, 1);
            // Ajouter la carte au début de la défausse
            array_unshift($defausse, $carteJouee[0]);
        }
    } elseif ($identiteJoueur == 2) {
        // Comparer la couleur
        if ($defausse[0]['couleur'] == $mainJoueur2[$positionDansLaMain]['couleur'] or $defausse[0]['valeur'] == $mainJoueur2[$positionDansLaMain]['valeur'] or $mainJoueur2[$positionDansLaMain]['image'] == ['joker01.jpg', 'joker02.jpg']) {
            //    echo "Carte déposée a la même couleur";
            // Ajouter la carte au début de la défausse
            $carteJouee = array_splice($mainJoueur2, $positionDansLaMain, 1);
            // Ajouter la carte au début de la défausse
            array_unshift($defausse, $carteJouee[0]);
        }
    }
}






// function piocherCarte($identiteJoueur = "Joueur1")
// {
//     global $mainJoueur1, $pioche;
//     $mainJoueur1 = array_merge($mainJoueur1, array_splice($pioche, 0, 1));
// }
// array_shift() retire et retourne un seul élément du début du tab
// array_push() permet ajouter un/plusieurs él à la fin d'un tab



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



// function piocher($joueur)
// {
//     if ($joueur=='j1')
//         {  $mainJoueur1=array_merge($mainJoueur1,array_splice($pioche,0,1));}
//     if ($joueur=='j2')
//         { $mainJoueur2=array_merge($mainJoueur2,array_splice($pioche,0,1));}
// }
