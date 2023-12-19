<?php
session_start();

/*
 * Connexion à la base de données (fr)
 * Connection to the database (en)
 * Соединение с базой данных (ru)
 */
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "livre_or";

$conn = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " .

        $conn->connect_error);
}