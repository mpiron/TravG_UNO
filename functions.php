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

    // tant que la première carte est une carte spéciale 
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


 // Ajouter carte de la pioche au-dessus de la défausse, si pioche contient au moins une carte(pas vide)
 if (!empty($pioche)) {
    $defausse = array_merge([$pioche[0]], $defausse); // Ajoute une carte de la pioche à la défausse
    array_shift($pioche); // Enlever carte ajoutée de la pioche
} 


        // $message = $defausse[0]['nom'];
        // echo "<script type='text/javascript'>alert('$message');</script>";
        // $defausse = array_merge($defausse, array_splice($pioche, 0, 1));

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

    if (!empty($pioche)) {
        reremplirPioche();
    }

}




function reremplirPioche()
{
    global $pioche, $defausse;

    // Vérifier si pioche est vide
    if (empty($pioche)) {
        // Vérifier si y a cartes dans défausse (au moins 2 pr être sûr)
        if (count($defausse) > 1) {
            // Récupérer toutes les cartes sauf la première (celle qui est au-dessus donc la 0)
            $defausseReDansPioche = array_slice($defausse, 1); // Prend tout sauf 0

            // Mélanger cartes récupérées avant de les remettre dans pioche
            shuffle($defausseReDansPioche);

            // Remettre ces cartes dans la pioche
            $pioche = $defausseReDansPioche;

            // Garder que la première carte de la défausse
            $defausse = array_slice($defausse, 0, 1);
        }             //prend tab $defausse, commence à 0 (première carte), prend 1 él (donc que la prem carte)
    }
}




// faire fonction si pioche vide, reprendre les cartes qui 
// sont dans defausse et remettre dans pioche (comme dans jeu uno qd on a p;us de cartes a piocher)