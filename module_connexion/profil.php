<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}

// Récupérer les informations de l'utilisateur depuis la base de données
$conn = new mysqli("localhost", "root", "", "module_connexion");
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
    $new_prenom = $_POST["new_prenom"];
    $new_nom = $_POST["new_nom"];
    $new_password = $_POST["new_password"];

    // Mettre à jour les données dans la base de données
    $update_sql = "UPDATE utilisateurs SET prenom = '$new_prenom', nom = '$new_nom', password = '$new_password' WHERE id = $user_id";

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
<html lang="en">

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
        <div class="utilisateur_profile">

            <div class="cont-flex1">
                <div class="container1">
                    <div class="card-header">
                        <div class="title">
                            <h2>Page d'utilisateur</h2>
                            <h3>Bonjour!</h3>
                        </div>
                        <h3>
                            <?php echo $user_data["prenom"]; ?>
                            <?php echo $user_data["nom"]; ?>
                        </h3>
                    </div>
                    <!-- Affichage des informations du profil -->
                    <p>
                    <div class="card-body">
                        Login:
                        <?php echo $user_data["login"]; ?>
                        </p>
                        <p>
                            Password:

                            <?php echo $user_data["password"]; ?>
                        </p>
                    </div>
                </div>

                <!-- Formulaire de modification du profil -->
                <div class="cont-flex">
                    <div class="container2">
                        <div class="card-header">
                            <h3>
                                Formulaire de modification du profil
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="profil.php" method="post" class="form-horizontal">
                                <table class="table-list">
                                    <tr>
                                        <th width="30%">
                                            <label for="new_prenom">Nouveau Prénom</label>
                                        </th>
                                        <td width="2%">:</td>

                                        <td>
                                            <input type="text" name="new_prenom" id="new_prenom"
                                                value="<?php echo $user_data["prenom"]; ?>" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="30%">
                                            <label for="new_nom">Nouveau Nom</label>
                                        </th>
                                        <td width="2%">:</td>
                                        <td>
                                            <input type="text" name="new_nom" id="new_nom"
                                                value="<?php echo $user_data["nom"]; ?>" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="30%">
                                            <label for="new_password">Nouveau Mot de passe</label>
                                        </th>
                                        <td width="2%">:</td>
                                        <td>
                                            <input type="password" name="new_password" id="new_password" required>
                                        </td>
                                    </tr>
                                </table>
                                <button type="submit" class="btn">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                    <div class="container3">
                        <div class="card-header">
                            <h3>D'autre informations </h3>
                            <div class="card-body">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima dicta laborum
                                    dignissimos! Ex recusandae corporis necessitatibus officiis beatae, tempora possimus
                                    pariatur adipisci in ducimus quasi repellat molestiae magni est! Ea!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <footer></footer>
</body>

</html>