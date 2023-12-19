<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $login = $_POST["login"];
    $password = $_POST["password"];

    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "livre_or";


    $conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " .

            $conn->connect_error);
    }
    
    $sql = "INSERT INTO utilisateurs (`id`, `login`, `password`) VALUES (NULL, '$login', '$password')";
    var_dump($sql);

    
    if ($conn->query($sql) === TRUE) {

        header("Location: connexion.php");
        exit();
    } else {
        echo "Erreur lors de l'inscription: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>

<body>
    <form action="" method="POST">
        <div>
            <input type="text" class="" id="login" name="login" placeholder="Login*" required>
        </div>
        <div>
            <input type="password" class="" id="password" name="password" placeholder="Password*" required>
        </div>
        <div>
        <button type="submit" class="btn">M'inscrire</button>
        </div>
    </form>
</body>

</html>