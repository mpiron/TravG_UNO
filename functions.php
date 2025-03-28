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
    global $mainJoueur1, $mainJoueur2, $defausse, $tour;
    if ($identiteJoueur == 1) {
        // Comparer la couleur
        if (($defausse[0]['couleur'] == $mainJoueur1[$positionDansLaMain]['couleur'] or $defausse[0]['valeur'] == $mainJoueur1[$positionDansLaMain]['valeur'] or $mainJoueur1[$positionDansLaMain]['couleur'] == 'joker' or $defausse[0]['couleur'] == 'joker') and ($tour % 2 + 1 == 1)) {
            //    echo "Carte déposée a la même couleur";
            $carteJouee = array_splice($mainJoueur1, $positionDansLaMain, 1);
            // Ajouter la carte au début de la défausse
            array_unshift($defausse, $carteJouee[0]);
            $tour += 1;
        }
    } elseif ($identiteJoueur == 2) {
        // Comparer la couleur
        if (($defausse[0]['couleur'] == $mainJoueur2[$positionDansLaMain]['couleur'] or $defausse[0]['valeur'] == $mainJoueur2[$positionDansLaMain]['valeur'] or $mainJoueur2[$positionDansLaMain]['couleur'] == 'joker' or $defausse[0]['couleur'] == 'joker') and ($tour % 2 + 1 == 1)) {
            //    echo "Carte déposée a la même couleur"; 
            $carteJouee = array_splice($mainJoueur2, $positionDansLaMain, 1);
            // Ajouter la carte au début de la défausse
            array_unshift($defausse, $carteJouee[0]);
            $tour += 1;
        }
    }
}





function afficherCarteSup($defausse, $pioche)
{

    // tant que la première carte est une carte spéciale, mélanger les cartes 
    while (
        $defausse[0]['nom'] == 'revers jaune'
        or  $defausse[0]['nom'] == 'stop jaune' or
        $defausse[0]['nom'] == '+2 jaune' or
        $defausse[0]['nom'] == 'revers bleu' or
        $defausse[0]['nom'] == 'stop bleu' or
        $defausse[0]['nom'] == '+2 bleu' or
        $defausse[0]['nom'] == 'revers vert' or
        $defausse[0]['nom'] == 'stop vert' or
        $defausse[0]['nom'] == '+2 vert' or
        $defausse[0]['nom'] == 'revers rouge' or
        $defausse[0]['nom'] == 'stop rouge' or
        $defausse[0]['nom'] == '+2 rouge' or
        $defausse[0]['nom'] == 'changement' or
        $defausse[0]['nom'] == 'Joker +4'
    ) {
        $message = $defausse[0]['nom'];
        echo "<script type='text/javascript'>alert('$message');</script>";
        $defausse = array_merge($defausse, array_splice($pioche, 0, 1));
    }

    echo '<img class="carte" src="cartes/' . $defausse[0]['image'] . '" alt="' . $defausse[0]['nom'] . '">';
    return $defausse;
}




// function afficherCarteSup($defausse)
// {

//     // tant que la première carte est une carte spéciale, mélanger les cartes 
//     while ($defausse[0]['nom'] == ['revers jaune', 'stop jaune', '+2 jaune', 'revers bleu', 'stop bleu', '+2 bleu', 'revers vert', 'stop vert', '+2 vert', 'revers rouge', 'stop rouge', '+2 rouge', 'changement', 'Joker +4']) {
//         shuffle($_SESSION['deckDepart']);
//     }
//     echo '<img class="carte" src="cartes/' . $defausse[0]['image'] . '" alt="' . $defausse[0]['nom'] . '">';
// }





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




// faire fonction si pioche vide, reprendre les cartes qui 
// sont dans defausse et remettre dans pioche (comme dans jeu uno qd on a p;us de cartes a piocher)