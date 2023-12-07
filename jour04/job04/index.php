<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <form action="" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom"></br>
        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom"></br>
        <input type="submit" value="Envoyer">
    </form>

    <?php

    echo '<table>';
    echo '<tr><th>Argument</th><th>Valeur</th></tr>';

    foreach ($_POST as $key => $value) {
        echo '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
    }
    echo '</table>';
    ?>
</body>

</html>