<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION["user_id"]) || $_SESSION["user_login"] !== "admin") {
        /* 
        * Redirection vers la page de connexion si l'utilisateur n'est pas admin (fr)
        * Redirect to login page if user is not admin (en)
        * Перенаправление на страницу входа в систему, если пользователь не является 
        администратором (ru)
        */
        header("Location: connexion.php");
        exit();
    }

    /* 
    * Récupération des toutes les informations des utilisateurs depuis la base de données (fr)
    * Retrieving all user information from the database (en)
    * Извлечение всей информации о пользователе из базы данных (ru)
    */
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "module_connexion";

    /*
    * Connexion à la base de données (fr)
    * Соединение с базой данных (en)
    * Database connection (ru)
    */
    $conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " .

            $conn->connect_error);
    }

    /* 
    * Sélection des toutes les informations des utilisateurs (fr)
    * Selecting all user information (en)
    * Выбор всей информации о пользователе (ru)
    */
    $sql = "SELECT * FROM utilisateurs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    /* 
    * Afficher les informations des utilisateurs (fr)
    * Displaying information about the user (en)
    * Отображение информации о пользователе (ru)
     */
        echo "<h1>Liste des Utilisateurs</h1>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Login</th><th>Prénom</th><th>Nom</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["login"] . "</td>";
            echo "<td>" . $row["prenom"] . "</td>";
            echo "<td>" . $row["nom"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Aucun utilisateur trouvé";
    }

    $conn->close();
    ?>
</body>

</html>