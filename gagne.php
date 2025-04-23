<?php
global $identiteJoueur;
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Page du gagnant</title>
    <style>
        /* Style général */
        body {
            font-family: 'Arial', sans-serif;
            /* background: linear-gradient(135deg, #ff6f61, #ffcc00); */
            background: linear-gradient(to right, rgb(60, 61, 119), rgb(120, 255, 127));
            text-align: center;
            color: white;
            height: 100vh;
            /*vertical height */
            display: flex;
            /* pr créer mise en page s'ajustant autom en fonct taille écran ou contenu */
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            font-size: 3.5em;
            margin: 0;
        }

        /* .btn-rejouer {
            margin-top: 30px;
            padding: 15px 30px;
            font-size: 30px;
            background-color: #ffffff;
            color: rgb(60, 61, 119);
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-rejouer:hover {
            background-color: rgb(60, 61, 119);
            color: white;
            transform: scale(1.1);
        }

        .btn-rejouer:active {
            transform: scale(0.9);
        } */
    </style>
</head>

<body>

    <h1>🎉 Félicitations, le joueur <?php echo $identiteJoueur; ?> a gagné ! 🎉</h1>

    <p>Le gagnant veut-il laisser son nom dans le tableau des victorieux?</p>

    <?php
    // vérifie si form pour réponse oui/non est envoyé
    if (!empty($_POST['reponse'])) {    //si pas vide
        if ($_POST['reponse'] === 'oui') {

            // affiche form pour saisir infos(nom)
    ?>
            <form method="post" action="gagne.php">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required><br><br>

                <input type="submit" value="Envoyer">
            </form>
        <?php
        }
        if ($_POST['reponse'] === 'non') {
        ?>
    <?php
        }
    }
    // vérifier si form complété
    if (isset($_POST["nom"])) {
        $nom = $_POST["nom"];

        echo "Nom : " . $nom . "<br>";
    }
    ?>

    <!-- form pour appuyer oui/non -->
    <form method="post">
        <button type="submit" name="reponse" value="oui">Oui</button>
    </form>
    <button onclick="window.location.href='index.php?reset=oui'">non</button>

    <!-- faut récuoérer nom date et tour dans bdd -->

</body>

</html>