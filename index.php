<?php
// <!-- distribuer / piocher / session -->
include_once('session.php');
include_once('functions.php');
include_once('variables.php');


// actions de jeu (placer une carte sur la défausse) 
if (isset($_GET['carte'])) {
    jouerCarte($_GET['carte'], $_GET['joueur']);
}


// Pioche une carte si le bouton vient d'être appuyé par joueur1
if (isset($_POST['piocherCarte1'])) {
    $mainJoueur1 = array_merge($mainJoueur1, array_splice($pioche, 0, 1));
    if (empty($pioche)) {
        // Récupérer toutes les cartes de la défausse excepté la première carte
        // les mélanger et reconstituer la pioche
        $cartesRecuperees = array_splice($defausse, 1);
        shuffle($cartesRecuperees);
        $pioche = $cartesRecuperees;
    }
}

// Pioche une carte si le bouton vient d'être appuyé par joueur2
if (isset($_POST['piocherCarte2'])) {
    $mainJoueur2 = array_merge($mainJoueur2, array_splice($pioche, 0, 1));
    if (empty($pioche)) {
        // Récupérer toutes les cartes de la défausse excepté la première carte
        // les mélanger et reconstituer la pioche
        $cartesRecuperees = array_splice($defausse, 1);
        shuffle($cartesRecuperees);
        $pioche = $cartesRecuperees;
    }
}

// changer de joueur si le joueur vient de passer
if (isset($_POST['passerJoueur1']) or isset($_POST['passerJoueur2'])) {
    $tour += 1;
    // Mettre à jour les variables de session
    // $_SESSION['tour'] = $tour;
}


$_SESSION['tour'] = $tour;
// l'entête doit être affichée après avoir géré le nombre de tours
include_once('header.php');


?>

<!-- débuggage à effacer par la suite
 <script>
    // Vérifier si c'est le tour du joueur 1
    alert("joueur1? " + (true && 1 == <?php echo $tour % 2 + 1; ?>));
    // Vérifier si c'est le tour du joueur 2
    alert("joueur2? " + (true && 2 == <?php echo $tour % 2 + 1; ?>));
</script>
 -->
<!-- mise en place du HTML -->
<div id="table">
    <div class=" tapisJ1 <?php echo ($tour % 2 == 0) ? 'actif' : ''; ?> ">
        <div class="smallcontainer tas">
            <div class="flex1">
                <h3>Défausse</h3>

                <?php afficherCarteSupDefausse($defausse); ?>

            </div>
            <div class="flex1">
                <h3>Pioche</h3>

                <?php
                global $identiteJoueur;
                //$identiteJoueur == 1 &&  
                if ($tour % 2 == 0) {

                    // Si bouton appuyé, cacher formulaire
                    if (!isset($_POST['piocherCarte1'])) {
                ?>
                        <form method="post" action="index.php" style="text-align: center;">
                            <button type="submit" name="piocherCarte1" style="background: #bbbb; border-radius: 10px;">
                                <img src="cartes/pioche.jpg" alt="Piocher une carte" class="carte"><br> piocher
                            </button>
                        </form><?php
                            } else {
                                ?><form method="post" action="index.php" style="text-align: center;">
                            <button type="submit" name="passerJoueur1" style="background: #bbbb; border-radius: 10px;">
                                <img src="cartes/passer.jpg" alt="Passer" class="carte"><br> passer
                            </button>
                        </form>
                    <?php
                            }
                        } else { ?>
                    <button type="submit" name="piocherCarte1" style="background: #bbbb; border-radius: 10px;">
                        <img src="cartes/pioche.jpg" alt="Piocher une carte" class="carte"><br> ✿ ☘ ✪
                    <?php        }
                    ?>


            </div>
        </div>
        <div>
            <h3>Joueur1</h3>

            <?php afficherCartes($mainJoueur1, 1); ?>
        </div>
    </div>

    <div class=" tapisJ2 <?php echo ($tour % 2 == 1) ? 'actif' : ''; ?>"> <!--peut enlever text affiché en haut disant tour joueur de joueur (à verifier)-->
        <div class="tas smallcontainer">
            <div class="flex1">
                <h3>Défausse</h3>

                <?php afficherCarteSupDefausse($defausse); ?>

            </div>
            <div class="flex1">
                <h3>Pioche</h3>

                <?php
                global $identiteJoueur;
                //$identiteJoueur == 2 &&  
                if ($tour % 2 == 1) {

                    // Si bouton appuyé, cacher formulaire
                    if (!isset($_POST['piocherCarte2'])) {
                ?>
                        <form method="post" action="index.php" style="text-align: center;">
                            <button type="submit" name="piocherCarte2" style="background: #bbbb; border-radius: 10px;">
                                <img src="cartes/pioche.jpg" alt="Piocher une carte" class="carte"><br> piocher
                            </button>
                        </form><?php
                            } else {
                                ?><form method="post" action="index.php" style="text-align: center;">
                            <button type="submit" name="passerJoueur2" style="background: #bbbb; border-radius: 10px;">
                                <img src="cartes/passer.jpg" alt="Passer" class="carte"><br> passer
                            </button>
                        </form>
                    <?php
                            }
                        } else { ?>
                    <button type="submit" name="piocherCarte1" style="background: #bbbb; border-radius: 10px;">
                        <img src="cartes/pioche.jpg" alt="Piocher une carte" class="carte"><br> ✿ ☘ ✪
                    <?php        }
                    ?>


            </div>

        </div>
        <div>
            <h3>Joueur2</h3>

            <?php afficherCartes($mainJoueur2, 2); ?>
        </div>
    </div>
</div>

<!-- inclusion du bas de page du site -->
<?php include_once('footer.php'); ?>

</body>

</html>