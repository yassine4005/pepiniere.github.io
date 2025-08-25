<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $profilePhoto = $_FILES['profilePhoto'] ?? null;
    
    $result = registerUser($username, $email, $password, $profilePhoto);
    
    if ($result === true) {
        $success = "Inscription réussie! Vous pouvez maintenant vous connecter.";
    } else {
        $error = $result;
    }
}

require_once 'includes/header.php';
?>

<div class="container">
    <h2>Créer un nouveau compte</h2>
    
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="email">Adresse email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required minlength="6">
        </div>
        
        <div class="form-group">
            <label for="profilePhoto">Photo de profil (optionnel)</label>
            <input type="file" name="profilePhoto" id="profilePhoto" class="form-control" accept="image/*">
        </div>
        
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
    
    <p class="mt-3">Vous avez déjà un compte? <a href="signin.php">Connectez-vous ici</a></p>
</div>

<?php require_once 'includes/footer.php'; ?>