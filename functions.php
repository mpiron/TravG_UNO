<?php

function afficherCartes($listeCartes)
{
    $compteur = 0;
    foreach ($listeCartes as $carte) {
        echo '<a href="index.php?carte=' . $compteur . '"><img class="carte" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '"></a>';
        $compteur += 1;
    }
}


if ($defausse == $cartesRouge); {
    $jouerRCarte = 'rouge01.jpg' || 'rouge02.jpg' || 'rouge03.jpg' || 'rouge04.jpg' || 'rouge05.jpg' || 'rouge06.jpg' || 'rouge07.jpg' || 'rouge08.jpg' || 'rouge09.jpg' || 'rouge10.jpg' || 'rouge11.jpg' || 'rouge12.jpg' || 'joker01.jpg' || 'joker02.jpg';
    array_splice($main, 0, $cartes);
}

if ($defausse == $cartesBleu); {
    $jouerBCarte = 'bleu01.jpg' || 'bleu02.jpg' || 'bleu03.jpg' || 'bleu04.jpg' || 'bleu05.jpg' || 'bleu06.jpg' || 'bleu07.jpg' || 'bleu08.jpg' || 'bleu09.jpg' || 'bleu10.jpg' || 'bleu11.jpg' || 'bleu12.jpg' || 'joker01.jpg' || 'joker02.jpg';
    array_splice($main, 0, $cartes);
}

if ($defausse == $cartesJaune); {
    $jouerJCarte = 'jaune01.jpg' || 'jaune02.jpg' || 'jaune03.jpg' || 'jaune04.jpg' || 'jaune05.jpg' || 'jaune06.jpg' || 'jaune07.jpg' || 'jaune08.jpg' || 'jaune09.jpg' || 'jaune10.jpg' || 'jaune11.jpg' || 'jaune12.jpg' || 'joker01.jpg' || 'joker02.jpg';
    array_splice($main, 0, $cartes);
}

if ($defausse == $cartesVert); {
    $jouerVCarte = 'vert01.jpg' || 'vert02.jpg' || 'vert03.jpg' || 'vert04.jpg' || 'vert05.jpg' || 'vert06.jpg' || 'vert07.jpg' || 'vert08.jpg' || 'vert09.jpg' || 'vert10.jpg' || 'vert11.jpg' || 'vert12.jpg' || 'joker01.jpg' || 'joker02.jpg';
    array_splice($main, 0, $cartes);
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