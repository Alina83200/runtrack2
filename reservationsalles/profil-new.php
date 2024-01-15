<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Connexion à la base de données (assurez-vous de remplacer les valeurs appropriées)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservationsalles";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des informations de l'utilisateur
$user_id = $_SESSION['user_id'];
$sql = "SELECT login FROM utilisateurs WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_login = $row['login'];
} else {
    echo "Erreur lors de la récupération des informations de l'utilisateur.";
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_login = $_POST['new_login'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // Vérifie si les mots de passe correspondent
    if ($new_password != $confirm_new_password) {
        echo "Les nouveaux mots de passe ne correspondent pas.";
    } else {
        // Hash du nouveau mot de passe (utilisez des méthodes de hachage sécurisées dans un environnement de production)
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Mise à jour des informations de l'utilisateur dans la base de données
        $update_sql = "UPDATE utilisateurs SET login = '$new_login', password = '$hashed_new_password' WHERE id = '$user_id'";

        if ($conn->query($update_sql) === TRUE) {
            echo "Informations du profil mises à jour avec succès!";
            // Vous pouvez rediriger l'utilisateur vers une autre page si nécessaire
        } else {
            echo "Erreur lors de la mise à jour des informations du profil : " . $conn->error;
        }
    }
}

// Fermeture de la connexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
                        <label>Login actuel:</label>
                        <div class="card_inner_left_login">
                           <input type="text" value="<?php echo $current_login; ?>" readonly><br>>
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