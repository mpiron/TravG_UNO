<?php
function afficherCartes($listeCartes)
{
    foreach ($listeCartes as $carte) {
        echo '<img class="carte" src="cartes/' . $carte['image'] . '" alt="' . $carte['nom'] . '">';
    }
}

function distribuerCartes()
{
    array_merge($cartes) . array_splice($listeCartes, 0, 7);
}


exemple du site: 

$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);...