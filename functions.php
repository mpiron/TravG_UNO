<?php
session_start();


function afficherCartes($listeCartes)
{
    $compteur = 0;
    foreach ($listeCartes as $carte) {
        echo '<a href="index.php?carte=' . $compteur . '"><img class="carte" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '"></a>';
        $compteur += 1;
    }
}


// $cartesRouge = ['rouge01.jpg', 'rouge02.jpg', 'rouge03.jpg', 'rouge04.jpg', 'rouge05.jpg', 'rouge06.jpg', 'rouge07.jpg', 'rouge08.jpg', 'rouge09.jpg', 'rouge10.jpg', 'rouge11.jpg', 'rouge12.jpg', 'joker01.jpg', 'joker02.jpg'];
// $cartesBleu = ['bleu01.jpg', 'bleu02.jpg', 'bleu03.jpg', 'bleu04.jpg', 'bleu05.jpg', 'bleu06.jpg', 'bleu07.jpg', 'bleu08.jpg', 'bleu09.jpg', 'bleu10.jpg', 'bleu11.jpg', 'bleu12.jpg', 'joker01.jpg', 'joker02.jpg'];
// $cartesJaune = ['jaune01.jpg', 'jaune02.jpg', 'jaune03.jpg', 'jaune04.jpg', 'jaune05.jpg', 'jaune06.jpg', 'jaune07.jpg', 'jaune08.jpg', 'jaune09.jpg', 'jaune10.jpg', 'jaune11.jpg', 'jaune12.jpg', 'joker01.jpg', 'joker02.jpg'];
// $cartesVert = ['vert01.jpg', 'vert02.jpg', 'vert03.jpg', 'vert04.jpg', 'vert05.jpg', 'vert06.jpg', 'vert07.jpg', 'vert08.jpg', 'vert09.jpg', 'vert10.jpg', 'vert11.jpg', 'vert12.jpg', 'joker01.jpg', 'joker02.jpg'];

// // Vérification si la carte dans la défausse est jouable
// if (in_array($defausse, $cartesRouge)) {
//     $jouerRCarte = $cartesRouge;
//     array_splice($main, 0, $cartes);
// }

// if (in_array($defausse, $cartesBleu)) {
//     $jouerBCarte = $cartesBleu;
//     array_splice($main, 0, $cartes);
// }

// if (in_array($defausse, $cartesJaune)) {
//     $jouerJCarte = $cartesJaune;
//     array_splice($main, 0, $cartes);
// }

// if (in_array($defausse, $cartesVert)) {
//     $jouerVCarte = $cartesVert;
//     array_splice($main, 0, $cartes);
// }


// function JouerCartes($defausse, $carteJoueur) {
//         $cartesJokers = ['joker01.jpg', 'joker02.jpg'];

//     // Vérifier si carte est un joker
//     if ($carteJoueur) {
//         return true; // joker peut toujours être joué
//     }

//     // Vérifier si num de la carte du joueur correspond à la defausse 
//     return $defausse == $carteJoueur || substr($defausse, -1) == substr($carteJoueur, -1);
// }                                        //va soustraire le dernier caractère de la chaîne (recherché une fonction utile à utiliser pr enlever cartes)
//                                   //utilisé pour récupérer le dernier caractère de chaque carte (càd le numéro)


// // substr() utilisé pour extraire une portion d'une chaîne de caractères 
//         //fonctionne dirctmnt sur des chaînes de carac, donc plus simple à utiliser qd on travaille avec des chaînes

// // array_slice() utilisé pour extraire une portion d'un tableau
//         //retourne un tab contenant les él extraits, même si demande q'un seul élémnt


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



//que enlevé le truc qui permet commenter, rien modifié

 function piocher($joueur)
 {
     if ($joueur=='j1')
         {  $_SESSION['mainJoueur1']=array_merge($_SESSION['mainJoueur1'],array_splice($_SESSION['pioche'],0,1));}
     if ($joueur=='j2')
         { $_SESSION['mainJoueur2']=array_merge($_SESSION['mainJoueur2'],array_splice($_SESSION['pioche'],0,1));}
 }