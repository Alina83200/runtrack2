<?php

//var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST["login"];
    $password = $_POST["password"];


    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "reservationsalles";

    $conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " .

            $conn->connect_error);
    }

    $sql = "INSERT INTO utilisateurs (`id`, `login`,`password`) VALUES (NULL, '$login', '$password')";
    var_dump($sql);

    if ($conn->query($sql) === TRUE) {

        header("Location: connexion.php");
        exit();
    } else {
        echo "Erreur lors de l'inscription: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <header>
        <a href="index.php"><img src="images/close_FILL0_wght400_GRAD0_opsz24.svg" alt=""></a>
    </header>
    <main>
        <div class="container">
            <div class="form_inner-top">
                <div>
                <h3 class="form_top_title">Bonjour</h3>
                <a class="top_btn" href="connection.php">Se connecter</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="form_inner">
                <!-- Formulaire d'inscription -->
                <form action="inscription.php" method="POST" class="form-horizontal">
                    <h3 class="form_top_title">Je suis nouveau ici</h3>
                    <div class="form_list">
                        <div class="form_item">
                            <label for="login" class="form_label">Login*</label>
                            <input type="text" class="form_input" id="login" name="login" required>
                        </div>
                        <div class="form_item">
                            <label for="password" class="form_label">Password*</label>
                            <input type="password" class="form_input" id="password" name="password" required>
                        </div>
                        <div class="form_item">
                            <label for="password" class="form_label">Password*</label>
                            <input type="password" class="form_input" id="password" name="password" required>
                        </div>

                        <div class="form_item form_item_botton">
                            <div class="checkbox">
                                <input checked type="checkbox" class="checkbox_input" id="formMessage" name="agreement">
                                <label for="formMessage" class="checkbox_label">
                                    <p>Je donne mon consentement au traitement des données personnelles confomémént aux
                                        <a href=""> conditions</a></p>
                                </label>
                            </div>
                            <p class="form_text">
                                * Obligtoire pour remplissage
                            </p>
                        </div>
                        <div>
                            <button type="submit" class="form_btn">S'inscrire</button>
                        </div>
                        <p class="form_text">
                            Nous conserverons soigneusement toutes les informations liées à vos réservations, vous
                            permettant de gérer facilement toutes les options disponibles pour votre espace personnel.
                        </p>
                    </div>
                </form>
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