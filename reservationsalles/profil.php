<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}

// Récupérer les informations de l'utilisateur depuis la base de données
$conn = new mysqli("localhost", "root", "", "reservationsalles");
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM utilisateurs WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "Utilisateur non trouvé";
}

// Traitement de la modification des données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_login = $_POST["new_login"];
    $new_password = $_POST["new_password"];

    // Mettre à jour les données dans la base de données
    $update_sql = "UPDATE utilisateurs SET login = 'new_login', password = '$new_password' WHERE id = $user_id";

    if ($conn->query($update_sql) === TRUE) {
        // Mettre à jour les données de session
        $_SESSION["user_login"] = $new_login;

        // Rediriger vers la page de profil
        header("Location: profil.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour des données: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="profil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,200&display=swap"
        rel="stylesheet">
</head>

<body>
    <header></header>
    <main>
        <div class="container">
            <div class="card">
                <div class="card_inner_left">
                    <div class="inner_left_block">
                        <div class="card_inner_left_title">
                            <h2>Mes donnés personnelles</h2>
                            <h3>Bonjour
                                <?php echo $user_data["login"]; ?>!
                            </h3>
                        </div>
                        <!-- Affichage des informations du profil -->
                        <div class="card_inner_left_item">
                            <p>Login:</p>
                            <div class="card_inner_left_login">
                                <?php echo $user_data["login"]; ?>
                            </div>
                        </div>
                        <div class="card_inner_left_item">
                            <p>Password:</p>
                            <div class="card_inner_left_password">
                                <?php echo $user_data["password"]; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Formulaire de modification du profil -->
                    <div class="inner_left_block">
                        <h4 class="card_modif_title">
                            Formulaire de modification
                        </h4>
                        <div class="card_modif_">
                            <form action="profil.php" method="post" class="card_modif_form">
                                <div class="form_modif_item">
                                    <label for="new_nom">Nouveau login</label>
                                    <input type="text" name="new_login" id="new_login"
                                        value="<?php echo $user_data["login"]; ?>" required>
                                </div>

                                <div class="form_modif_item">
                                    <label for="new_password">Nouveau Mot de passe</label>
                                    <input type="password" name="new_password" id="new_password" required>
                                </div>
                                <button type="submit" class="btn">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card_inner_center">
            </div>
            <div class="card_inner_right">
            </div>
        </div>
    </main>
    <footer></footer>
</body>

</html>