<?php
global $identiteJoueur;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>🎉 Félicitations, Vous avez gagné ! 🎉</title>
    <style>
        /* Style général */
        body {
            font-family: 'Arial', sans-serif;
            /* background: linear-gradient(135deg, #ff6f61, #ffcc00); */
            background: linear-gradient(to right, rgb(60, 61, 119),rgb(120, 255, 127));
            text-align: center;
            color: white;
            height: 100vh;  /*vertical height */
            display: flex;    /* pr créer mise en page s'ajustant autom en fonct taille écran ou contenu */
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            font-size: 3.5em;
            margin: 0;
        }

        .btn-rejouer {
            margin-top: 30px;
            padding: 15px 30px;
            font-size: 30px;
            background-color: #ffffff;
            color:rgb(60, 61, 119);
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
        }

    </style>
</head>
<body>

    <h1>🎉 Félicitations, le joueur <?php echo $identiteJoueur; ?> a gagné ! 🎉</h1>
    <button class="btn-rejouer" onclick="window.location.href='index.php'">Rejouer</button>

</body>
</html>
