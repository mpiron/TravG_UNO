<?php

/**
 * Affiche les cartes dans une liste avec des liens HTML.
 * Chaque carte est affichée avec une image et un lien permettant de sélectionner la carte.
 * 
 * @param array $listeCartes Un tableau contenant les cartes à afficher. Chaque carte doit avoir des clés 'image' et 'nom'.
 * @param string $sourceCarte La source de la carte (par défaut "none").
 * @return void
 */
function afficherCartes($listeCartes, $sourceCarte)
{
    $compteur = 0;
    foreach ($listeCartes as $carte) {
        echo '<a href="index.php?carte=' . $compteur . '&joueur=' . $sourceCarte . '"><img class="carte" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '"></a>';
        $compteur += 1;
    }
}


/**
 * Permet à un joueur de jouer une carte de sa main.
 * La carte jouée doit correspondre à la couleur ou à la valeur de la carte sur le dessus de la défausse, ou être un joker.
 * 
 * @param int $positionDansLaMain =  position de la carte dans la main du joueur.
 * @param int $identiteJoueur = identité du joueur (1 pour joueur 1, 2 pour joueur 2).
 * @global array $mainJoueur1 = main du joueur 1.
 * @global array $mainJoueur2 = main du joueur 2.
 * @global array $defausse = pile de défausse.
 * @global int $tour = numéro du tour actuel.
 * @return void
 */
function jouerCarte($positionDansLaMain, $identiteJoueur)
{
    global $mainJoueur1, $mainJoueur2, $defausse, $tour;
    if ($identiteJoueur == 1 && $tour % 2 == 0) {
        echo ("joueur 1 a joué");
        // Comparer la couleur et valeur
        if (($defausse[0]['couleur'] == $mainJoueur1[$positionDansLaMain]['couleur']
            or $defausse[0]['valeur'] == $mainJoueur1[$positionDansLaMain]['valeur']
            or $mainJoueur1[$positionDansLaMain]['couleur'] == 'joker'
            or $defausse[0]['couleur'] == 'joker') and ($tour % 2 == 0)) {
            // echo "Carte déposée a la même couleur";
            $carteJouee = array_splice($mainJoueur1, $positionDansLaMain, 1);
            // Ajouter la carte au début de la défausse
            array_unshift($defausse, $carteJouee[0]);
            $tour += 1;

            //debut verif ce que carte fait (effet carte) 
            if ($defausse[0]['nom'] == 'revers rouge') {
                echo "<br>sens est inversé";
                $tour *= -1; // Inverse le sens du tour 
            } elseif ($defausse[0]['nom'] == '+2 rouge' or $defausse[0]['nom'] == '+2 vert' or $defausse[0]['nom'] == '+2 bleu' or $defausse[0]['nom'] == '+2 jaune') {
                echo "<br>joueur suivant doit piocher 2 cartes";
             //   $mainJoueur2 = array_merge($mainJoueur2, array_splice($pioche, 0, 2));
            } elseif ($defausse[0]['nom'] == 'Joker +4') {
                echo "<br>joueur suivant doit piocher 4 cartes et je peux changer de couleur"; 
             //   $mainJoueur2 = array_merge($mainJoueur2, array_splice($pioche, 0, 4)); 
            } elseif ($defausse[0]['nom'] == 'changement') {
                echo "<br>je peux changer la couleur";
            } elseif ($defausse[0]['nom'] == 'stop rouge' or $defausse[0]['nom'] == 'stop vert' or $defausse[0]['nom'] == 'stop bleu' or $defausse[0]['nom'] == 'stop jaune') {
                echo "<br>passer tour du joueur suivant";
                $tour += 1;
            } else {
                echo ("<br>carte normale");
            }
            //fin verification ce que carte fait 

        } else {
            echo ("<br>les conditions ne sont pas bonnes<br>");
        }
    } elseif ($identiteJoueur == 2 && $tour % 2 == 1) {
        echo ("joueur 2 a joué");
        // Comparer la couleur et valeur
        if (($defausse[0]['couleur'] == $mainJoueur2[$positionDansLaMain]['couleur']
            or $defausse[0]['valeur'] == $mainJoueur2[$positionDansLaMain]['valeur']
            or $mainJoueur2[$positionDansLaMain]['couleur'] == 'joker'
            or $defausse[0]['couleur'] == 'joker') and ($tour % 2  == 1)) {
            // echo "Carte déposée a la même couleur"; 
            $carteJouee = array_splice($mainJoueur2, $positionDansLaMain, 1);
            // Ajouter la carte au début de la défausse
            array_unshift($defausse, $carteJouee[0]);
            $tour += 1;
        } else {
            echo ("<br>les conditions ne sont pas bonnes<br>");
        }
    }
}




/**
 * Affiche la carte du dessus de la défausse
 * 
 * @param array $defausse La pile de défausse, contenant les cartes déjà jouées.
 * @return void
 */
function afficherCarteSupDefausse($defausse)
{
    echo '<img class="carte" src="cartes/' . $defausse[0]['image'] . '" alt="' . $defausse[0]['nom'] . '">';
}


function afficherPioche()
{
    echo '<img class="carte" src="cartes/pioche.jpg" alt="Piocher">';
}


/**
 * Initialisation du jeu : nous distribuons 7 cartes par joueur.
 * Nous initialisons également la défausse (une carte) et la pioche (toutes les autres cartes).
 * 
 * @param array $cartes Un tableau contenant toutes les cartes à distribuer.
 * @global array $mainJoueur1 La main du joueur 1.
 * @global array $mainJoueur2 La main du joueur 2.
 * @global array $defausse La pile de défausse.
 * @global array $pioche La pile de pioche.
 * @return void
 */
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

    $cartesSpeciales = [
        'revers jaune',
        'stop jaune',
        '+2 jaune',
        'revers bleu',
        'stop bleu',
        '+2 bleu',
        'revers vert',
        'stop vert',
        '+2 vert',
        'revers rouge',
        'stop rouge',
        '+2 rouge',
        'changement',
        'Joker +4'
    ];
    while (in_array($defausse[0]['nom'], $cartesSpeciales)) {
        // Prendre la carte suivante de $cartes
        $nouvelleCarte = array_splice($cartes, 0, 1)[0];
        // Remettre la carte spéciale dans $cartes
        $cartes[] = $defausse[0];
        // Remélanger les cartes
        shuffle($cartes);
        // Mettre la nouvelle carte sur la défausse
        $defausse[0] = $nouvelleCarte;
    }

    $pioche = $cartes; //les cartes qui restent se retrouvent dans la pioche
}


// Déplacé en ligne 17 et 29 du fichier index.php
// function reremplirPioche()
// {
//     global $pioche, $defausse;

//     // Vérifier si pioche est vide
//     if (empty($pioche)) {
//         // Vérifier si y a cartes dans défausse (au moins 2 pr être sûr)
//         if (count($defausse) > 1) {
//             // Récupérer toutes les cartes sauf la première (celle qui est au-dessus donc la 0)
//             $defausseReDansPioche = array_slice($defausse, 1); // Prend tout sauf 0

//             // Mélanger cartes récupérées avant de les remettre dans pioche
//             shuffle($defausseReDansPioche);

//             // Remettre ces cartes dans la pioche
//             $pioche = $defausseReDansPioche;

//             // Garder que la première carte de la défausse
//             $defausse = array_slice($defausse, 0, 1);
//         }             //prend tab $defausse, commence à 0 (première carte), prend 1 él (donc que la prem carte)
//     }
// }
