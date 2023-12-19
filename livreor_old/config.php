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