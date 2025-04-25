<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>


<style>
    table {
        width: 800px;
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
    }

    th {
        background-color: #f2f2f2;
        /* Facultatif : couleur de fond des en-têtes */
    }
</style>


<body>
    <h1>Palmarès</h1>
    <form action="formulaire.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" size="10" required>
        <label for="nb_tours">Nombre de tours :</label>
        <input type="number" id="nb_tours" name="nb_tours" required>
        <button type="submit" name="submit">Envoyer</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Récupération des données du formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $nb_tours = intval($_POST['nb_tours']);

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
    echo "<br>";

    // Afficher les données sous forme de tableau
    echo "<table border='1'>";
    echo "<tr><th>Nombre de tours</th><th>Nom</th><th>Date</th><th>Heure</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nombre_tour']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['heure']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";


    echo $tour;


    ?>
</body>

</html>