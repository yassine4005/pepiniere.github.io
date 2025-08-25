<?php
$servername = "localhost";
$username = "root"; // changer si besoin
$password = ""; // changer si besoin
$dbname = "pepiniere"; // changer avec ta base

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
