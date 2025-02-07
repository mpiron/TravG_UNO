<?php
function afficherCartes($listeCartes,$sourceCarte="none")
{
    $compteur = 0;
    foreach ($listeCartes as $carte) {    if ($carte !== null) {
        echo '<a href="index.php?carte=' . $compteur . '&source='.$sourceCarte.'"><img class="carte" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '"></a>';
     }$compteur += 1;
    }
}

function jouerCarte($positionDansLaMain,$identitejoueur="none")
{global $mainJoueur1, $mainJoueur2,$defausse;
    if ($identitejoueur == 1)
    {   $carteJouee = array_splice($mainJoueur1, $positionDansLaMain, 1);
        // Ajouter la carte au début de la défausse
        array_unshift($defausse, $carteJouee[0]);
    }
    elseif ($identitejoueur==2)
    {   $carteJouee = array_splice($mainJoueur2, $positionDansLaMain, 1);
        // Ajouter la carte au début de la défausse
        array_unshift($defausse, $carteJouee[0]);
    }
}

function afficherCarteSup($defausse)
{    if ($defausse !== null) 
    {
    echo '<img class="carte" src="cartes/' . $defausse[0]['image'] . '" alt="' . $defausse[0]['nom'] . '">';
    }
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