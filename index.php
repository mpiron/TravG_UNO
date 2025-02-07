<!-- etape3.php -->
<!-- distribuer / piocher / session -->
<?php
include_once('session.php');
include_once('functions.php');
include_once('variables.php');
include_once('header.php');

// actions de jeu
//Joue un carte si une carte vient d'être sélectionnée
if (isset($_GET['carte']))
{ jouerCarte($_GET['carte'],$_GET['source']);}
  
// Pioche une carte si le bouton  de la pioche vient d'être enfoncé
  if (isset($_POST['piocherCarte'])) {
    // echo($_POST['piocherCarte']);
    $mainJoueur1 = array_merge($mainJoueur1, array_splice($pioche, 0, 1));
}

?>

<div id="container">
    <h1>Cartes cachées dans la pioche</h1>
    <?php 
    afficherCartes($pioche);
    echo("<h3>main joueur1 </h3>"); 
    afficherCartes($mainJoueur1,1);
    echo("<h3>main ordi = joueur2</h3>"); 
    afficherCartes($mainJoueur2,2);
    echo("<h3>Pioche</h3>"); 
    afficherPioche();
?>
    <!-- Section pour "piocher une carte" -->
    <form method="post" action="index.php">
        <button type="submit" name="piocherCarte">Piocher une carte</button>
    </form>

<?php
    echo("<h3>Défausse</h3>"); 
    afficherCarteSup($defausse);
    echo("<br>"); 
    afficherCartes($defausse);
?> 

</div>

<!-- inclusion du bas de page du site -->
<?php include_once('footer.php'); ?>
</body>

</html>