<?php
// Connexion à la base de données (à adapter)

if (isset($_POST['login_submit'])) {
    extract($_POST, EXTR_OVERWRITE);
    $utilisateurDAO = new UtilisateurDAO($cnx);
    $utilisateur = $utilisateurDAO->getUtilisateur($login, $password1);

    if ($utilisateur) {
        $_SESSION['utilisateur'] = [
            'id' => $utilisateur->id_utilisateur,
            'nom' => $utilisateur->nom,
            'prenom' => $utilisateur->prenom,
            'email' => $utilisateur->email,
            'role' => $utilisateur->role
        ];

        if ($utilisateur->role === 'admin') {
            header('Location: admin/index.php?page=accueil_admin.php');
        } else {
            header('Location: admin/index.php?page=accueil_client.php');
        }
        exit();
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-3">
        <label for="login" class="form-label">Email</label>
        <input type="text" class="form-control" id="login" name="login">
    </div>
    <div class="mb-3">
        <label for="password1" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password1" name="password1">
    </div>

    <button type="submit" class="btn btn-primary" name="login_submit">Connexion</button>
</form>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
