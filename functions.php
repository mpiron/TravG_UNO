<?php
function afficherCartes($listeCartes)
{
    foreach ($listeCartes as $carte) {
        echo '<img class="carte" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '">';
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
    //dans cette fonction, j'utilise des variables globales et non locales. 
    for ($i = 0; $i < 7; $i++) {
        $_SESSION['mainJoueur1'] = array_merge($_SESSION['mainJoueur1'], array_splice($cartes, 0, 1));
        $_SESSION['mainJoueur2'] = array_merge($_SESSION['mainJoueur2'], array_splice($cartes, 0, 1));
    }
    $_SESSION['defausse']= array_splice($cartes, 0, 1);  //on retourne la 1er carte de la pioche
    $_SESSION['pioche']=$cartes; //les cartes qui restent
}




// function piocher($joueur)
// {
//     if ($joueur=='j1')
//         {  $_SESSION['mainJoueur1']=array_merge($_SESSION['mainJoueur1'],array_splice($_SESSION['pioche'],0,1));}
//     if ($joueur=='j2')
//         { $_SESSION['mainJoueur2']=array_merge($_SESSION['mainJoueur2'],array_splice($_SESSION['pioche'],0,1));}
// }