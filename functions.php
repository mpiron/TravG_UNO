<?php

function afficherCartes($listeCartes)
{
    $compteur = 0;
    foreach ($listeCartes as $carte) {
        echo '<a href="index.php?carte=' . $compteur . '"><img class="carte" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '"></a>';
        $compteur += 1;
    }
}

// Fonction qui vérifie si une carte peut être jouée
function peutJouerCarte($carteJoueur, $carteDefausse) {
    // Liste des cartes spéciales pour les jokers et les cartes actions
    $cartesJokers = ['joker01.jpg', 'joker02.jpg'];
    $cartesAction = ['plus2.jpg', 'reverse.jpg', 'skip.jpg'];  // Exemples de cartes actions

    // Vérifier si la carte à jouer est un joker
    if (in_array($carteJoueur, $cartesJokers)) {
        return true; // Un joker peut toujours être joué
    }

    // Vérifier si la carte à jouer est une carte d'action (par exemple, +2, reverse, skip)
    if (in_array($carteJoueur, $cartesAction)) {
        return true; // Une carte d'action peut toujours être jouée
    }

    // Vérification de la couleur ou du numéro
    $couleurDefausse = getCouleur($carteDefausse);
    $numeroDefausse = getNumero($carteDefausse);

    $couleurJoueur = getCouleur($carteJoueur);
    $numeroJoueur = getNumero($carteJoueur);

    // Si la couleur de la carte du joueur correspond à celle de la carte de la défausse,
    // ou si le numéro de la carte du joueur correspond à celui de la carte de la défausse
    if ($couleurJoueur === $couleurDefausse || $numeroJoueur === $numeroDefausse) {
        return true;
    }

    // Si aucune condition n'est remplie, la carte ne peut pas être jouée
    return false;
}

// Fonction pour extraire la couleur de la carte (en supposant que la couleur est dans le nom du fichier)
function getCouleur($carte) {
    // Exemples de couleurs
    if (strpos($carte, 'rouge') !== false) return 'rouge';
    if (strpos($carte, 'bleu') !== false) return 'bleu';
    if (strpos($carte, 'jaune') !== false) return 'jaune';
    if (strpos($carte, 'vert') !== false) return 'vert';
    return ''; // Couleur inconnue
}

// Fonction pour extraire le numéro de la carte (en supposant que le numéro est dans le nom du fichier)
function getNumero($carte) {
    // Extraction du numéro (ici, on suppose que le numéro est dans le nom de la carte, après le nom de la couleur)
    preg_match('/\d+/', $carte, $matches);
    return isset($matches[0]) ? $matches[0] : '';
}

// Exemple d'utilisation
$carteJoueur = 'rouge05.jpg';  // Carte du joueur
$carteDefausse = 'rouge02.jpg';  // Carte sur la défausse

if (peutJouerCarte($carteJoueur, $carteDefausse)) {
    echo "La carte peut être jouée.";
} else {
    echo "La carte ne peut pas être jouée.";
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
    //dans cette fonction, j'utilise des variables globales et non locales. 
    for ($i = 0; $i < 7; $i++) {
        $_SESSION['mainJoueur1'] = array_merge($_SESSION['mainJoueur1'], array_splice($cartes, 0, 1));
        $_SESSION['mainJoueur2'] = array_merge($_SESSION['mainJoueur2'], array_splice($cartes, 0, 1));
    }
    $_SESSION['defausse'] = array_splice($cartes, 0, 1);  //on retourne la 1er carte de la pioche
    $_SESSION['pioche'] = $cartes; //les cartes qui restent
}




// function piocher($joueur)
// {
//     if ($joueur=='j1')
//         {  $_SESSION['mainJoueur1']=array_merge($_SESSION['mainJoueur1'],array_splice($_SESSION['pioche'],0,1));}
//     if ($joueur=='j2')
//         { $_SESSION['mainJoueur2']=array_merge($_SESSION['mainJoueur2'],array_splice($_SESSION['pioche'],0,1));}
// }