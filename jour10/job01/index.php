<?php
$serveur = "localhost";
$utilisateur = "root"; // Remplacez par votre nom d'utilisateur MySQL
$motDePasse = ""; // Remplacez par votre mot de passe MySQL
$baseDeDonnees = "jour09";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Requête SQL pour récupérer toutes les informations de la table "etudiants"
$sql = "SELECT * FROM etudiants";
$resultat = $connexion->query($sql);

// Vérifier si la requête a réussi
if ($resultat->num_rows > 0) {
    // Affichage du tableau HTML
    echo "<table border='1'><thead><tr><th>ID</th><th>Prénom</th><th>Nom</th><th>Naissance</th><th>Sexe</th><th>Email</th></tr></thead><tbody>";

    // Utilisation de foreach pour parcourir les résultats
    foreach ($resultat as $ligne) {
        echo "<tr><td>{$ligne["id"]}</td><td>{$ligne["prenom"]}</td><td>{$ligne["nom"]}</td><td>{$ligne["naissance"]}</td><td>{$ligne["sexe"]}</td><td>{$ligne["email"]}</td></tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion
$connexion->close();