<!-- etape2.php -->
<!-- première fonction afficher carte -->
<?php
include_once('variables.php');
include_once('functions.php');
include_once('header.php'); ?>

<div id="container">
    <h1>Cartes dans un deck neuf</h1>
    <?php
    shuffle($cartes);
    afficherCartes($cartes);
    // Appeler la fonction pour distribuer 7 cartes à 2 joueurs
    $mainJoueur = distribuerCartes($cartes);?>
    <h3>main du joueur</h3>
    Elles étaient là mais on le les voyaient pas 
    car il n'y avait pas de séparation avec les cartes du deck, juste au-dessus. <br>
    <?php  
    afficherCartes($mainJoueur);
    ?>
    
</div>

<!-- inclusion du bas de page du site -->
<?php include_once('footer.php'); ?>
</body>

</html>