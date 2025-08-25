<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['photo'] = $user['photo'];
        header("Location: account.php");
        exit();
    } else {
        echo "<p style='color:red;text-align:center;'>Email ou mot de passe incorrect</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Connexion - Pépinière</title>
  <link rel="stylesheet" href="auth.css">
  

<style>
  .om {
    width: 120px;   /* change this value to make it smaller/larger */
    height: auto;   /* keeps the aspect ratio */
  }
</style>

</head>
<body>

<header class="header-container">
  <a href="index.php"><img src="images/l.png" class="logo"></a>
    <img class="om" href="index.php" src="images/api.png" alt="Logo Light" />
    
</header>

<div class="auth-container">
  <h2 class="auth-title">Se connecter</h2>
  <form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Connexion</button>
  </form>
  <div class="auth-footer">
    Pas encore de compte ? <a href="signup.php">S'inscrire</a><br>
     pour retour a la page d'acceuil? <a href="index.php">Acceuil</a>
    
  </div>
</div>

</body>
</html>
