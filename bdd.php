<?php

function connect() {
    $host = 'localhost';  // Adresse du serveur MySQL
    $dbname = 'artbox'; // Nom de la base de données
    $username = 'root'; // Nom d'utilisateur MySQL
    $password = ''; // Mot de passe MySQL

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
        exit;
    }
}
?>
