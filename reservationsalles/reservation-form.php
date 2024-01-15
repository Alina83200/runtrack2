<?php
// Mettez ici le code de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservationsalles";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Mettez ici le code de traitement de la réservation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous d'ajuster cette logique en fonction de vos besoins
    $title = $_POST["title"];
    $description = $_POST["description"];
    $start_hour = $_POST["start_hour"];
    $end_hour = $_POST["end_hour"];

    // Insertion de la réservation dans la base de données
    $sql = "INSERT INTO reservations (titre, description, debut, fin) VALUES ('$title', '$description', '$start_hour:00:00', '$end_hour:00:00')";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page de planning après la réservation
        header("Location: planning.php");
        exit();
    } else {
        echo "Erreur lors de la réservation : " . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Réservation</title>
</head>

<body>

    <h2>Formulaire de Réservation</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="data-day" value="<?php echo isset($_GET['data-day']) ? $_GET['data-day'] : ''; ?>">
        <input type="hidden" name="data-hour"
            value="<?php echo isset($_GET['data-hour']) ? $_GET['data-hour'] : ''; ?>">

        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="start_hour">Heure de début :</label>
        <select id="start_hour" name="start_hour" required>
            <?php
            for ($hour = 8; $hour <= 19; $hour++) {
                $selected = isset($_GET['data-hour']) && $_GET['data-hour'] == $hour ? 'selected' : '';
                echo "<option value='$hour' $selected>$hour:00</option>";
            }
            ?>
        </select>

        <label for="end_hour">Heure de fin :</label>
        <select id="end_hour" name="end_hour" required>
            <?php
            for ($hour = 9; $hour <= 20; $hour++) {
                $selected = isset($_GET['data-hour']) && ($_GET['data-hour'] + 1) == $hour ? 'selected' : '';
                echo "<option value='$hour' $selected>$hour:00</option>";
            }
            ?>
        </select>

        <input type="submit" value="Réserver">
    </form>

</body>

</html>