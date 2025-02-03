<!-- Défini au démarrage 
$cartes  (112 cartes Uno)
$deckDepart  (Deck mélangé)
$mainJoueur1 (7 cartes distribuées)
$mainJoueur2 (7 cartes pour l'ordi)
$pioche     (le reste du jeu)
$defausse   première carteaprès distribution aux joueurs
-->
<?php
if (!isset($_SESSION['deckDepart'])) {
    $cartes = [
        ['image' => 'jaune01.jpg', 'valeur' => 1, 'couleur' => 'jaune', 'nom' => '1 jaune'],
        ['image' => 'jaune01.jpg', 'valeur' => 1, 'couleur' => 'jaune', 'nom' => '1 jaune'],
        ['image' => 'jaune02.jpg', 'valeur' => 2, 'couleur' => 'jaune', 'nom' => '2 jaune'],
        ['image' => 'jaune02.jpg', 'valeur' => 2, 'couleur' => 'jaune', 'nom' => '2 jaune'],
        ['image' => 'jaune03.jpg', 'valeur' => 3, 'couleur' => 'jaune', 'nom' => '3 jaune'],
        ['image' => 'jaune03.jpg', 'valeur' => 3, 'couleur' => 'jaune', 'nom' => '3 jaune'],
        ['image' => 'jaune04.jpg', 'valeur' => 4, 'couleur' => 'jaune', 'nom' => '4 jaune'],
        ['image' => 'jaune04.jpg', 'valeur' => 4, 'couleur' => 'jaune', 'nom' => '4 jaune'],
        ['image' => 'jaune05.jpg', 'valeur' => 5, 'couleur' => 'jaune', 'nom' => '5 jaune'],
        ['image' => 'jaune05.jpg', 'valeur' => 5, 'couleur' => 'jaune', 'nom' => '5 jaune'],
        ['image' => 'jaune06.jpg', 'valeur' => 6, 'couleur' => 'jaune', 'nom' => '6 jaune'],
        ['image' => 'jaune06.jpg', 'valeur' => 6, 'couleur' => 'jaune', 'nom' => '6 jaune'],
        ['image' => 'jaune07.jpg', 'valeur' => 7, 'couleur' => 'jaune', 'nom' => '7 jaune'],
        ['image' => 'jaune07.jpg', 'valeur' => 7, 'couleur' => 'jaune', 'nom' => '7 jaune'],
        ['image' => 'jaune08.jpg', 'valeur' => 8, 'couleur' => 'jaune', 'nom' => '8 jaune'],
        ['image' => 'jaune08.jpg', 'valeur' => 8, 'couleur' => 'jaune', 'nom' => '8 jaune'],
        ['image' => 'jaune09.jpg', 'valeur' => 9, 'couleur' => 'jaune', 'nom' => '9 jaune'],
        ['image' => 'jaune09.jpg', 'valeur' => 9, 'couleur' => 'jaune', 'nom' => '9 jaune'],
        ['image' => 'jaune10.jpg', 'valeur' => 10, 'couleur' => 'jaune', 'nom' => 'revers jaune'],
        ['image' => 'jaune10.jpg', 'valeur' => 10, 'couleur' => 'jaune', 'nom' => 'revers jaune'],
        ['image' => 'jaune11.jpg', 'valeur' => 11, 'couleur' => 'jaune', 'nom' => 'stop jaune'],
        ['image' => 'jaune11.jpg', 'valeur' => 11, 'couleur' => 'jaune', 'nom' => 'stop jaune'],
        ['image' => 'jaune12.jpg', 'valeur' => 12, 'couleur' => 'jaune', 'nom' => '+2 jaune'],
        ['image' => 'jaune12.jpg', 'valeur' => 12, 'couleur' => 'jaune', 'nom' => '+2 jaune'],
        ['image' => 'bleu01.jpg', 'valeur' => 1, 'couleur' => 'bleu', 'nom' => '1 bleu'],
        ['image' => 'bleu01.jpg', 'valeur' => 1, 'couleur' => 'bleu', 'nom' => '1 bleu'],
        ['image' => 'bleu02.jpg', 'valeur' => 2, 'couleur' => 'bleu', 'nom' => '2 bleu'],
        ['image' => 'bleu02.jpg', 'valeur' => 2, 'couleur' => 'bleu', 'nom' => '2 bleu'],
        ['image' => 'bleu03.jpg', 'valeur' => 3, 'couleur' => 'bleu', 'nom' => '3 bleu'],
        ['image' => 'bleu03.jpg', 'valeur' => 3, 'couleur' => 'bleu', 'nom' => '3 bleu'],
        ['image' => 'bleu04.jpg', 'valeur' => 4, 'couleur' => 'bleu', 'nom' => '4 bleu'],
        ['image' => 'bleu04.jpg', 'valeur' => 4, 'couleur' => 'bleu', 'nom' => '4 bleu'],
        ['image' => 'bleu05.jpg', 'valeur' => 5, 'couleur' => 'bleu', 'nom' => '5 bleu'],
        ['image' => 'bleu05.jpg', 'valeur' => 5, 'couleur' => 'bleu', 'nom' => '5 bleu'],
        ['image' => 'bleu06.jpg', 'valeur' => 6, 'couleur' => 'bleu', 'nom' => '6 bleu'],
        ['image' => 'bleu06.jpg', 'valeur' => 6, 'couleur' => 'bleu', 'nom' => '6 bleu'],
        ['image' => 'bleu07.jpg', 'valeur' => 7, 'couleur' => 'bleu', 'nom' => '7 bleu'],
        ['image' => 'bleu07.jpg', 'valeur' => 7, 'couleur' => 'bleu', 'nom' => '7 bleu'],
        ['image' => 'bleu08.jpg', 'valeur' => 8, 'couleur' => 'bleu', 'nom' => '8 bleu'],
        ['image' => 'bleu08.jpg', 'valeur' => 8, 'couleur' => 'bleu', 'nom' => '8 bleu'],
        ['image' => 'bleu09.jpg', 'valeur' => 9, 'couleur' => 'bleu', 'nom' => '9 bleu'],
        ['image' => 'bleu09.jpg', 'valeur' => 9, 'couleur' => 'bleu', 'nom' => '9 bleu'],
        ['image' => 'bleu10.jpg', 'valeur' => 10, 'couleur' => 'bleu', 'nom' => 'revers bleu'],
        ['image' => 'bleu10.jpg', 'valeur' => 10, 'couleur' => 'bleu', 'nom' => 'revers bleu'],
        ['image' => 'bleu11.jpg', 'valeur' => 11, 'couleur' => 'bleu', 'nom' => 'stop bleu'],
        ['image' => 'bleu11.jpg', 'valeur' => 11, 'couleur' => 'bleu', 'nom' => 'stop bleu'],
        ['image' => 'bleu12.jpg', 'valeur' => 12, 'couleur' => 'bleu', 'nom' => '+2 bleu'],
        ['image' => 'bleu12.jpg', 'valeur' => 12, 'couleur' => 'bleu', 'nom' => '+2 bleu'],
        ['image' => 'vert01.jpg', 'valeur' => 1, 'couleur' => 'vert', 'nom' => '1 vert'],
        ['image' => 'vert01.jpg', 'valeur' => 1, 'couleur' => 'vert', 'nom' => '1 vert'],
        ['image' => 'vert02.jpg', 'valeur' => 2, 'couleur' => 'vert', 'nom' => '2 vert'],
        ['image' => 'vert02.jpg', 'valeur' => 2, 'couleur' => 'vert', 'nom' => '2 vert'],
        ['image' => 'vert03.jpg', 'valeur' => 3, 'couleur' => 'vert', 'nom' => '3 vert'],
        ['image' => 'vert03.jpg', 'valeur' => 3, 'couleur' => 'vert', 'nom' => '3 vert'],
        ['image' => 'vert04.jpg', 'valeur' => 4, 'couleur' => 'vert', 'nom' => '4 vert'],
        ['image' => 'vert04.jpg', 'valeur' => 4, 'couleur' => 'vert', 'nom' => '4 vert'],
        ['image' => 'vert05.jpg', 'valeur' => 5, 'couleur' => 'vert', 'nom' => '5 vert'],
        ['image' => 'vert05.jpg', 'valeur' => 5, 'couleur' => 'vert', 'nom' => '5 vert'],
        ['image' => 'vert06.jpg', 'valeur' => 6, 'couleur' => 'vert', 'nom' => '6 vert'],
        ['image' => 'vert06.jpg', 'valeur' => 6, 'couleur' => 'vert', 'nom' => '6 vert'],
        ['image' => 'vert07.jpg', 'valeur' => 7, 'couleur' => 'vert', 'nom' => '7 vert'],
        ['image' => 'vert07.jpg', 'valeur' => 7, 'couleur' => 'vert', 'nom' => '7 vert'],
        ['image' => 'vert08.jpg', 'valeur' => 8, 'couleur' => 'vert', 'nom' => '8 vert'],
        ['image' => 'vert08.jpg', 'valeur' => 8, 'couleur' => 'vert', 'nom' => '8 vert'],
        ['image' => 'vert09.jpg', 'valeur' => 9, 'couleur' => 'vert', 'nom' => '9 vert'],
        ['image' => 'vert09.jpg', 'valeur' => 9, 'couleur' => 'vert', 'nom' => '9 vert'],
        ['image' => 'vert10.jpg', 'valeur' => 10, 'couleur' => 'vert', 'nom' => 'revers vert'],
        ['image' => 'vert10.jpg', 'valeur' => 10, 'couleur' => 'vert', 'nom' => 'revers vert'],
        ['image' => 'vert11.jpg', 'valeur' => 11, 'couleur' => 'vert', 'nom' => 'stop vert'],
        ['image' => 'vert11.jpg', 'valeur' => 11, 'couleur' => 'vert', 'nom' => 'stop vert'],
        ['image' => 'vert12.jpg', 'valeur' => 12, 'couleur' => 'vert', 'nom' => '+2 vert'],
        ['image' => 'vert12.jpg', 'valeur' => 12, 'couleur' => 'vert', 'nom' => '+2 vert'],
        ['image' => 'rouge01.jpg', 'valeur' => 1, 'couleur' => 'rouge', 'nom' => '1 rouge'],
        ['image' => 'rouge01.jpg', 'valeur' => 1, 'couleur' => 'rouge', 'nom' => '1 rouge'],
        ['image' => 'rouge02.jpg', 'valeur' => 2, 'couleur' => 'rouge', 'nom' => '2 rouge'],
        ['image' => 'rouge02.jpg', 'valeur' => 2, 'couleur' => 'rouge', 'nom' => '2 rouge'],
        ['image' => 'rouge03.jpg', 'valeur' => 3, 'couleur' => 'rouge', 'nom' => '3 rouge'],
        ['image' => 'rouge03.jpg', 'valeur' => 3, 'couleur' => 'rouge', 'nom' => '3 rouge'],
        ['image' => 'rouge04.jpg', 'valeur' => 4, 'couleur' => 'rouge', 'nom' => '4 rouge'],
        ['image' => 'rouge04.jpg', 'valeur' => 4, 'couleur' => 'rouge', 'nom' => '4 rouge'],
        ['image' => 'rouge05.jpg', 'valeur' => 5, 'couleur' => 'rouge', 'nom' => '5 rouge'],
        ['image' => 'rouge05.jpg', 'valeur' => 5, 'couleur' => 'rouge', 'nom' => '5 rouge'],
        ['image' => 'rouge06.jpg', 'valeur' => 6, 'couleur' => 'rouge', 'nom' => '6 rouge'],
        ['image' => 'rouge06.jpg', 'valeur' => 6, 'couleur' => 'rouge', 'nom' => '6 rouge'],
        ['image' => 'rouge07.jpg', 'valeur' => 7, 'couleur' => 'rouge', 'nom' => '7 rouge'],
        ['image' => 'rouge07.jpg', 'valeur' => 7, 'couleur' => 'rouge', 'nom' => '7 rouge'],
        ['image' => 'rouge08.jpg', 'valeur' => 8, 'couleur' => 'rouge', 'nom' => '8 rouge'],
        ['image' => 'rouge08.jpg', 'valeur' => 8, 'couleur' => 'rouge', 'nom' => '8 rouge'],
        ['image' => 'rouge09.jpg', 'valeur' => 9, 'couleur' => 'rouge', 'nom' => '9 rouge'],
        ['image' => 'rouge09.jpg', 'valeur' => 9, 'couleur' => 'rouge', 'nom' => '9 rouge'],
        ['image' => 'rouge10.jpg', 'valeur' => 10, 'couleur' => 'rouge', 'nom' => 'revers rouge'],
        ['image' => 'rouge10.jpg', 'valeur' => 10, 'couleur' => 'rouge', 'nom' => 'revers rouge'],
        ['image' => 'rouge11.jpg', 'valeur' => 11, 'couleur' => 'rouge', 'nom' => 'stop rouge'],
        ['image' => 'rouge11.jpg', 'valeur' => 11, 'couleur' => 'rouge', 'nom' => 'stop rouge'],
        ['image' => 'rouge12.jpg', 'valeur' => 12, 'couleur' => 'rouge', 'nom' => '+2 rouge'],
        ['image' => 'rouge12.jpg', 'valeur' => 12, 'couleur' => 'rouge', 'nom' => '+2 rouge'],
        ['image' => 'joker01.jpg', 'valeur' => 13, 'couleur' => 'jocker', 'nom' => 'changement'],
        ['image' => 'joker01.jpg', 'valeur' => 13, 'couleur' => 'jocker', 'nom' => 'changement'],
        ['image' => 'joker02.jpg', 'valeur' => 14, 'couleur' => 'jocker', 'nom' => 'Jocker +4'],
        ['image' => 'joker02.jpg', 'valeur' => 14, 'couleur' => 'jocker', 'nom' => 'Jocker +4'],
    ];

    $_SESSION['deckDepart'] = $cartes;
    shuffle($_SESSION['deckDepart']);
    $_SESSION['pioche'] = [];
    $_SESSION['mainJoueur1'] = [];
    $_SESSION['mainJoueur2'] = [];
    $_SESSION['defausse'] = [];
  //  distribuerCartes($_SESSION['deckDepart']);
}

$mainJoueur1 = $_SESSION['mainJoueur1'];
$mainJoueur2 = $_SESSION['mainJoueur2'];
$pioche = $_SESSION['pioche'];
$defausse = $_SESSION['defausse'];








$cartesRouge = [
    ['rouge01.jpg', 'rouge02.jpg', 'rouge03.jpg', 'rouge04.jpg', 'rouge05.jpg', 'rouge06.jpg', 'rouge07.jpg', 'rouge08.jpg', 'rouge09.jpg', 'rouge10.jpg', 'rouge11.jpg', 'rouge12.jpg', 'joker01.jpg', 'joker02.jpg']
];

$cartesBleu = [
    ['bleu01.jpg', 'bleu02.jpg', 'bleu03.jpg', 'bleu04.jpg', 'bleu05.jpg', 'bleu06.jpg', 'bleu07.jpg', 'bleu08.jpg', 'bleu09.jpg', 'bleu10.jpg', 'bleu11.jpg', 'bleu12.jpg', 'joker01.jpg', 'joker02.jpg']
];

$cartesJaune = [
    ['jaune01.jpg', 'jaune02.jpg', 'jaune03.jpg', 'jaune04.jpg', 'jaune05.jpg', 'jaune06.jpg', 'jaune07.jpg', 'jaune08.jpg', 'jaune09.jpg', 'jaune10.jpg', 'jaune11.jpg', 'jaune12.jpg', 'joker01.jpg', 'joker02.jpg']
];

$cartesVert = [
    ['vert01.jpg', 'vert02.jpg', 'vert03.jpg', 'vert04.jpg', 'vert05.jpg', 'vert06.jpg', 'vert07.jpg', 'vert08.jpg', 'vert09.jpg', 'vert10.jpg', 'vert11.jpg', 'vert12.jpg', 'joker01.jpg', 'joker02.jpg']
];

?>