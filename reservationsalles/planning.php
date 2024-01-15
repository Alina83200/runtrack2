<?php
// Mettez ici le code de connexion à la base de données si nécessaire

// Fonction pour récupérer les réservations depuis la base de données
function getReservations()
{
    // Mettez ici la logique pour récupérer les réservations depuis la base de données
    // Assurez-vous d'adapter cette logique à votre structure de base de données
    // Remplacez également les informations de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservationsalles";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    $reservations = array();

    $sql = "SELECT id, titre, debut, fin FROM reservations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $reservations[] = $row;
        }
    }

    $conn->close();

    return $reservations;
}

// Récupération des réservations depuis la base de données
$reservations = getReservations();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning de la Salle</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td.available {
            cursor: pointer;
            background-color: #b3e0ff;
        }

        td.reserved {
            background-color: #ff9999;
        }
    </style>
</head>

<body>

    <h2>Planning de la Salle</h2>
    <table>
        <thead>
            <tr>
                <th>Heures / Jours</th>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($hour = 8; $hour <= 19; $hour++) {
                echo "<tr>";
                echo "<td>$hour:00 - " . ($hour + 1) . ":00</td>";

                for ($day = 1; $day <= 5; $day++) {
                    $status = "available";

                    foreach ($reservations as $reservation) {
                        $reservationStart = strtotime($reservation['debut']);
                        $reservationEnd = strtotime($reservation['fin']);

                        if ($reservationStart <= strtotime("+$hour hours") && $reservationEnd >= strtotime("+$hour hours") && date('N', $reservationStart) == $day) {
                            $status = "reserved";
                            break;
                        }
                    }

                    $cellData = "data-day='$day' data-hour='$hour'";
                    echo "<td class='$status' $cellData>";

                    if ($status === "available") {
                        // Rendez le créneau disponible cliquable
                        echo "<a href='reservation-form.php?data-day=$day&data-hour=$hour'>Réserver</a>";
                    }

                    echo "</td>";
                }

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>