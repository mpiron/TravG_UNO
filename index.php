
<?php
// <!-- distribuer / piocher / session -->
include_once('session.php');
include_once('functions.php');
include_once('variables.php');
include_once('header.php');

// actions de jeu (placer une carte sur la défausse) 
if (isset($_GET['carte'])) {
    jouerCarte($_GET['carte'], $_GET['source']);
}


// Pioche une carte si le bouton vient d'être appuyé par joueur1
if (isset($_POST['piocherCarte1'])) {
    $mainJoueur1 = array_merge($mainJoueur1, array_splice($pioche, 0, 1));
}

// Pioche une carte si le bouton vient d'être appuyé par joueur2
if (isset($_POST['piocherCarte2'])) {
    $mainJoueur2 = array_merge($mainJoueur2, array_splice($pioche, 0, 1));
}
?>


    <!-- mise en place du HTML -->
    <div id="table">
        <div class=" tapisJ1">
            <div class="smallcontainer tas">
                <div class="flex1">
                    <h3>Défausse</h3>

                    <?php afficherCarteSup($defausse);?>

                </div>
                <div class="flex1">
                    <h3>Pioche</h3>
                    <form method="post" action="index.php" style="text-align: center;">
                        <button type="submit" name="piocherCarte1" style="background: #bbbb; border-radius: 10px;">
                            <img src="cartes/pioche.jpg" alt="Piocher une carte" class="carte"><br> piocher
                        </button>
                    </form>

                </div>
            </div>
            <div>
                <h3>Joueur1</h3>
                
                <?php afficherCartes($mainJoueur1, 1);?>

            </div>
        </div>
                
        <div class=" tapisJ2">
            <div class="tas smallcontainer">
                <div class="flex1">
                    <h3>Défausse</h3>
                
                    <?php  afficherCarteSup($defausse);?>
                
                </div>
                <div class="flex1">
                    <h3>Pioche</h3>
                    <form method="post" action="index.php" style="text-align: center;">
                        <button type="submit" name="piocherCarte2" style="background: #bbbb; border-radius: 10px;">
                            <img src="cartes/pioche.jpg" alt="Piocher une carte" class="carte"><br> piocher
                        </button>
                    </form>
                </div>
            </div>
            <div>
                <h3>Joueur2</h3>

                <?php afficherCartes($mainJoueur2, 2);?>

            </div>
        </div>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>

</body>
</html>