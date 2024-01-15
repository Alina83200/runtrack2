<?php

# Link : http://localhost/runtrack2/reservationsalles/reservation.php?id=1

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

// Récupération de l'ID de la réservation depuis l'URL
$reservation_id = $_GET['id'];

// Vérification de l'existence de la réservation
$sql = "SELECT * FROM reservations WHERE id = '$reservation_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $_SESSION['user_id'];

    $login = $row['id_utilisateur'];
    $titre = $row['titre'];
    $description = $row['description'];
    $debut = $row['debut'];
    $fin = $row['fin'];

} else {
    // Redirige si la réservation n'existe pas
    header("Location: planning.php");
    exit();
}

// Fermeture de la connexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Réservation</title>
</head>

<body>

    <h2>Détails de la Réservation</h2>
    <ul>
        <li><strong>Créateur :</strong>
            <?php echo $login; ?>
        </li>
        <li><strong>Titre :</strong>
            <?php echo $titre; ?>
        </li>
        <li><strong>Description :</strong>
            <?php echo $description; ?>
        </li>
        <li><strong>Début :</strong>
            <?php echo $debut; ?>
        </li>
        <li><strong>Fin :</strong>
            <?php echo $fin; ?>
        </li>
    </ul>

</body>

</html>