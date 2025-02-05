<!-- etape3.php -->
<!-- distribuer / piocher / session -->
<?php
include_once('session.php');
include_once('functions.php');
include_once('variables.php');
include_once('header.php');

// actions de jeu
if (isset($_GET['carte']))
{ jouerCarte($_GET['carte'],$_GET['source']);}


?>

<div id="container">
    <h1>Cartes dans un deck neuf</h1>
    <?php 
    afficherCartes($_SESSION['deckDepart']);
    echo("<h3>main joueur1 </h3>"); 
    afficherCartes($_SESSION['mainJoueur1'],1);
    echo("<h3>main ordi = joueur2</h3>"); 
    afficherCartes($_SESSION['mainJoueur2'],2);
    echo("<h3>Pioche</h3>"); 
    afficherPioche();
    //afficherCartes($_SESSION['pioche']);
    echo("<h3>Défausse</h3>"); 
    afficherCarteSup($_SESSION['defausse']);
?> 

</div>

<!-- inclusion du bas de page du site -->
<?php include_once('footer.php'); ?>
</body>

</html>