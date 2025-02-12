<!-- etape3.php -->
<!-- distribuer / piocher / session -->
<?php
include_once('session.php');
include_once('functions.php');
include_once('variables.php');
include_once('header.php');

// actions de jeu (qd commence à jouer) 
if (isset($_GET['carte'])) {
    jouerCarte($_GET['carte'], $_GET['source']);
}


?>

<div id="container">
    <!-- <h1>Cartes cachées dans la pioche</h1> ctrl slash pr mettre en comm-->
    <?php
    //    afficherCartes($pioche);
    echo ("<h3>main joueur1 </h3>");
    afficherCartes($mainJoueur1, 1);


    ?>
    <!-- Section pour "piocher une carte" -->
    <form method="post" action="index.php">
        <button type="submit" name="piocherCarte1">Piocher une carte</button>
    </form>
    <?php

    // Pioche une carte si le bouton vient d'être appuyé par joueur1
    if (isset($_POST['piocherCarte1'])) {
        $mainJoueur1 = array_merge($mainJoueur1, array_splice($pioche, 0, 1));
    }


    echo ("<h3>main ordi = joueur2</h3>");
    afficherCartes($mainJoueur2, 2);


    ?>
    <!-- Section pour "piocher une carte" -->
    <form method="post" action="index.php">
        <button type="submit" name="piocherCarte2">Piocher une carte</button>
    </form>
    <?php

    // Pioche une carte si le bouton vient d'être appuyé par joueur2
    if (isset($_POST['piocherCarte2'])) {
        $mainJoueur2 = array_merge($mainJoueur2, array_splice($pioche, 0, 1));
    }


    echo ("<h3>Pioche</h3>");
    afficherPioche();


    // 
    ?>
    <!-- // Section pour "piocher une carte"
    // <form method="post" action="index.php">
    //     <button type="submit" name="piocherCarte">Piocher une carte</button>
    // </form>
    --> <?php

        // // Pioche une carte si le bouton vient d'être appuyé par joueur1
        // if (isset($_POST['piocherCarte'])) {
        //     $mainJoueur1 = array_merge($mainJoueur1, array_splice($pioche, 0, 1));
        // }


        echo ("<h3>Défausse</h3>");
        afficherCarteSup($defausse);
        ?>

</div>

<!-- inclusion du bas de page du site -->
<?php include_once('footer.php'); ?>
</body>

</html>