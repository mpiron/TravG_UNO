<?php
include_once('session.php');
include_once('functions.php');
include_once('variables.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palmarès</title>
</head>

<style>
    table {
        width: 1000px;
        margin: auto;
        border-collapse: collapse;
        /* pour ne pas avoir un tab à deux lignes */
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
        /* Ajoute de l'espace autour du contenu des cellules */
        text-align: left;
        background-color: white;
    }

    th {
        background-color: rgb(60, 61, 119);
        /* couleur de fond des en-têtes */
        color: white;
    }


    /* Style général */
    body {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(lightblue, blue);
        text-align: center;
        height: 100vh;
        /*vh c'est vertical height*/
        display: flex;
        /*pr centrer au milieu*/
        justify-content: center;
        align-items: center;
        flex-direction: column;
        /* pr afficher él les uns en-dessous des autes */
    }

    h1 {
        color: white;
        font-size: 3.5em;
        margin: 5;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        /* Ombrr pour titre */
        font-weight: bold;
        transition: transform 0.3s ease, color 0.3s ease;
        /* survole plus fluidement */

    }

    h1:hover {
        color: #ffcc00;
        /* Change de couleur qd on survol */
    }

    th:hover {
        color: #ffcc00;
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

    a {
        color: white;
        font-size: 1.2em;
        margin-top: 10px;
        font-weight: bold;
    }

    button:hover {
        background-color: #ffcc00;
    }

    a:hover {
        color: #ffcc00;
        font-size: 1.25em;
    }

    p {
        font-family: 'Lucida Sans', sans-serif;
    }
</style>


<body>
    <h1>Palmarès</h1>
    <form action="formulaire.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" size="10" required>
        <!-- <label for="nb_tours">Nombre de tours :</label> -->
        <!-- <input type="number" id="nb_tours" name="nb_tours" required> -->
        <button type="submit" name="submit">Envoyer</button>
    </form>

    <p>Ce tableau affiche les 8 meilleurs joueurs.</p>

    <?php
    if (isset($_POST['submit'])) {
        // Récupération des données du formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $nb_tours = intval($_SESSION['tour']);           // $nb_tours = intval($_POST['nb_tours']); //pour récupérer valeur donné dans formulaire

        // Connexion à la base de données SQLite
        $db = new PDO('sqlite:base/uno.db');

        // Insertion des données dans la table "vainqueurs"
        $stmt = $db->prepare("INSERT INTO vainqueurs (nom, date, heure, nombre_tour) VALUES (:nom_joueur, :date_heure, :heure, :nb_tours)");
        date_default_timezone_set('Europe/Brussels'); // Set the timezone to Brussels
        $date = date('d-m-Y');
        $heure = date('H:i');
        $stmt->bindParam(':nom_joueur', $nom);
        $stmt->bindParam(':date_heure', $date);
        $stmt->bindParam(':heure', $heure);
        $stmt->bindParam(':nb_tours', $nb_tours);
        if ($stmt->execute()) {
            header("Location: formulaire.php");
            exit();
        } else {
            echo "Erreur lors de l'insertion des données : " . implode(" ", $stmt->errorInfo());
        }
    }

    // Connexion à la base de données SQLite
    $db = new PDO('sqlite:base/uno.db');
    // Récupération des 8 meilleurs vainqueurs (triés par nombre de tours croissant, puis par date et heure décroissantes)
    $result = $db->query("SELECT nombre_tour, nom, date, heure FROM vainqueurs 
                          ORDER BY nombre_tour ASC, date DESC, heure DESC LIMIT 8");


    echo "<br>";

    // Afficher les données sous forme de tableau
    echo "<table border='1'>";
    echo "<tr><th>Nombre de tours</th><th>Nom des gagnants</th><th>Date</th><th>Heure</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nombre_tour']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['heure']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<br>";
    // echo $_SESSION['tour'];  //pr afficher tour

    ?>

    <a href="index.php?reset=oui">Rejouer</a>


</body>

</html>