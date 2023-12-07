<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="GET">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <input type="submit" value="Envoyer">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $nombre = $_GET['nombre'] ?? '';

        if (is_numeric($nombre)) {
            echo ($nombre % 2 == 0) ? 'Nombre pair' : 'Nombre impair';
        } else {
            echo 'Veuillez entrer un nombre valide.';
        }
    }
    ?>
</body>

</html>