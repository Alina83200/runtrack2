<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* 
     * Récupération les données du formulaire (fr)
     * Collect form data (en)
     * Собрать данные формуляра (ru)
     */
    $login = $_POST["login"];
    $password = $_POST["password"];

    /*
     * Connexion à la base de données (fr)
     * Connection to the database (en)
     * Соединение с базой данных (ru)
     */
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "livre_or";

    $conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " .

            $conn->connect_error);
    }

    /*
     *Prépation de la requête de sélection (fr) 
     *Preparing the selection request (en)
     *Подготовьте запроса на интеграцию (ru)
     */
    $sql = "SELECT id, login, password FROM utilisateurs WHERE login = '$login'";

    /*
     * Exécuteration de la requête (fr)
     * Executing the request (en)
     * Завершить соединение (ru)
     */
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row["password"]) {
            /* 
             * Utilisateur connecté avec succès, créer une variable de session (fr)
             * User successfully logged in, create a session variable (en)
             * Пользоваетель успешно соеденился, создание сессии (ru)
             */
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_login"] = $row["login"];

            /* 
             * Rediriger vers la page de profil (fr)
             * Redirects to the profile page (en)
             * Перенаправление на страничку профиля (ru)
             */
            header("Location: profil.php");
            exit();
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Utilisateur non trouvé";
    }

    /* 
     * Fermeture de la connexion à la base de données (fr)
     * Closing the database connection (en)
     * Завершить соединение (ru)
     */
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,200&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <div class="offset-md-4 col-md-4 offset-sm-3 col-sm-6">
            <div class="form-container">
                <h3>Connexion</h3>
                <!-- Formulaire de connexion -->

                <form action="connexion.php" method="post" class="form-horizontal">
                    <div class="form-list">

                        <div class="form-group">
                            <input type="text" class="form-control" id="login" name="login" placeholder="Login*"
                                required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password*" required>

                        </div>
                        <div>
                            <button type="submit" class="btn">Se connecté</button>
                        </div>
                    </div>
                </form>
                <p>
                    <a href="./inscription.php">Inscription</a>
                </p>
            </div>
        </div>
</body>

</html>