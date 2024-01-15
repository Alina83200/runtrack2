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
    $baseDeDonnees = "reservationsalles";

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
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,200&display=swap"
        rel="stylesheet">

</head>

<body>
    <header>
        <a href="index.php"><img src="images/close_FILL0_wght400_GRAD0_opsz24.svg" alt=""></a>
    </header>
    <main>
        <div class="container">
            <div class="form_inner">
                <!-- Formulaire de connection -->
                <form action="inscription.php" method="POST" class="form-horizontal">
                    <h3 class="form_top_title">Bonjour</h3>
                    <div class="form_list">
                        <div class="form_item">
                            <label for="login" class="form_label">Login*</label>
                            <input type="text" class="form_input" id="login" name="login" required>
                        </div>
                        <div class="form_item">
                            <label for="password" class="form_label">Password*</label>
                            <input type="password" class="form_input" id="password" name="password" required>
                        </div>

                        <div>
                            <button type="submit" class="form_top_btn">Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="form_inner_botton">
                <h3 class="form_top_title">Je suis nouveau ici</h3>
                <a class="form_botton_btn" href="inscription.php">S'inscrire</a>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="footer_top">
                <nav class="menu">
                    <ul class="menu_list">
                        <li class="menu_item">
                            <a class="menu_list-link" href="index.php">Accueil</a>
                        </li>
                        <li class="menu_item">
                            <a class="menu_list-link" href="inscription.php">Inscription</a>
                        </li>
                        <li class="menu_item">
                            <a class="menu_list-link" href="connection.php">Connexion</a>
                        </li>
                        <li class="menu_item">
                            <a class="menu_list-link" href="profil-new.php">Profil</a>
                        </li>
                        <li class="menu_item">
                            <a class="menu_list-link" href="planning.php">Planning</a>
                        </li>
                    </ul>
                </nav>
                <a class="phone" href="tel:0123456789">01.23.45.67.89 </a>
            </div>
            <ul class="footer_social">
                <li class="footer_social_item">
                    <a class="footer_social_link" href="#">
                        <img src="images/social/instagram.svg" alt=""></a>
                </li>
                <li class="footer_social_item">
                    <a class="footer_social_link" href="#">
                        <img src="images/social/facebook.svg" alt=""></a>
                </li>
                <li class="footer_social_item">
                    <a class="footer_social_link" href="#">
                        <img src="images/social/youtube.svg" alt=""></a>
                </li>
            </ul>

        </div>
    </footer>
</body>

</html>