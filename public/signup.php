<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $photo_name = "";
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo_name = time() . "_" . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photo_name);
    }

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, photo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $photo_name);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['name'] = $name;
        $_SESSION['photo'] = $photo_name;
        header("Location: account.php");
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <style>
  .om {
    width: 120px;   /* change this value to make it smaller/larger */
    height: auto;   /* keeps the aspect ratio */
  }
  </style>
  <meta charset="UTF-8">
  <title>Inscription - Pépinière</title>
  <link rel="stylesheet" href="auth.css">
  
</head>
<body>

<header class="header-container">
  <a href="index.php"><img src="images/l.png" class="logo"></a>
  <img class="om" href="index.php" src="images/api.png" alt="Logo Light" />
</header>

<div class="auth-container">
  <h2 class="auth-title">Créer un compte</h2>
  <form method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Nom complet" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="file" name="photo" accept="image/*" required>
    <button type="submit">S'inscrire</button>
  </form>
  <div class="auth-footer">
    Déjà inscrit ? <a href="signin.php">Se connecter</a><br>
     pour retour a la page d'acceuil? <a href="index.php">Acceuil</a>
  </div>
</div>

</body>
</html>
