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
            background: linear-gradient(to right, rgb(60, 61, 119), rgb(120, 212, 123));
            text-align: center;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            /* pr afficher él les uns en-dessous des autes */
        }

        h1 {
            font-size: 3.5em;
            margin: 0;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            /* Ombrr pour titre */
            font-weight: bold;
            transition: transform 0.3s ease, color 0.3s ease;
            /* survole plus fluidement */

        }

        h1:hover {
            color: #ffcc00;
            /* Change de couleur qd du survol */
        }

        button {
            background-color: rgb(60, 61, 119);
            color: white;
            border: none;
            padding: 13px 28px;
            font-size: 1.2em;
            /* cursor: pointer; */
            /* qd curseur dessus, change de forme et pointe sur boutton */
            border-radius: 5px;
            margin-top: 20px;
        }

        button:hover {
            background-color: #ffcc00;
        }

        p {
            font-family: 'Lucida Sans', sans-serif;
        }
    </style>
</head>

<body>
    <!-- semble pas être la bonne écriture pour récupérer variable identitéJoueur -->
    <!-- <?php global $identiteJoueur;
            echo $identiteJoueur; ?> -->
    <h1>🎉 Félicitations pour avoir gagné ! 🎉</h1>

    <p>Le gagnant veut-il laisser son nom dans le tableau des vainqueurs?</p>

    <?php
    // vérifie si form pour réponse oui/non est envoyé
    if (!empty($_POST['reponse'])) {    //si pas vide
        if ($_POST['reponse'] === 'oui') {

            header("Location: formulaire.php");
            exit();

            // affiche form pour saisir infos(nom)
    ?>
            <!-- <form method="post" action="gagne.php">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required><br><br>

                <input type="submit" value="Envoyer">
            </form> -->
    <?php
        }
        if ($_POST['reponse'] === 'non') {
        }
    }
    // // vérifier si form complété
    // if (isset($_POST["nom"])) {
    //     $nom = $_POST["nom"];

    //     echo "Nom : " . $nom . "<br>";
    // }

    // date_default_timezone_set('Europe/Brussels'); // Set the timezone to Brussels
    // $Date = date('d/m/Y', time());
    // $heure = date('H:i', time());
    // echo "Nous sommes le $Date et il est $heure";

    ?>

    <!-- form pour appuyer oui/non -->
    <form method="post">
        <button type="submit" name="reponse" value="oui">Oui</button>
    </form>
    <button onclick="window.location.href='index.php?reset=oui'">non</button>

    <!-- faut récupérer tour dans bdd -->

</body>

</html>