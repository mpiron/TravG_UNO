<!-- etape3.php -->
<!-- distribuer / piocher / session -->
<?php
include_once('session.php');
include_once('functions.php');
include_once('variables.php');
include_once('header.php'); ?>

<div id="container">
    <h1>Cartes dans un deck neuf</h1>
    <?php 
    afficherCartes($_SESSION['deckDepart']);
    echo("<h3>main joueur1 </h3>"); 
    afficherCartes($mainJoueur1);
    echo("<h3>main ordi = joueur2</h3>"); 
    afficherCartes($mainJoueur2);
    echo("<h3>Pioche</h3>"); 
    afficherPioche();
    //afficherCartes($pioche);
    echo("<h3>Défausse</h3>"); 
    afficherCarteSup($defausse);
?> 

</div>

<!-- inclusion du bas de page du site -->
<?php include_once('footer.php'); ?>
</body>

</html>