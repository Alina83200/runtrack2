<?php
$serveur = "localhost";
$utilisateur = "root"; 
$motDePasse = ""; 
$baseDeDonnees = "jour09";

$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

$sql = "SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'Femme'";
$resultat = $connexion->query($sql);

if ($resultat->num_rows > 0) {
   
    echo "<table border='1'><thead><tr><th>Prénom</th><th>Nom</th><th>Date de Naissance</th></tr></thead><tbody>";

    foreach ($resultat as $ligne) {
        echo "<tr>";
        foreach ($ligne as $valeur) {
            echo "<td>$valeur</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Aucun résultat trouvé.";
}

$connexion->close();
?>