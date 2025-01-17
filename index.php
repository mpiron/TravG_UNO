<!-- etape2.php -->
<!-- première fonction afficher carte -->
<?php
    include_once('variables.php');
    include_once('functions.php');
    include_once('header.php'); ?>

    <div id="container">
        <h1>Cartes dans un deck neuf</h1>
        <?php
            shuffle($cartes) ;
            afficherCartes($cartes);
            ?>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>

</html>
