<?php
$prenom = ['Inna', 'Katerina', 'Olena', 'Kristina'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Liste des prénoms</h2>
    <ul>
    <?php
    foreach ($prenom as $element) {
        echo "<li>$element</li>";
    }
    ?>
    </ul>
</body>
</html>
