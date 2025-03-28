<?php
//traitement toujours au-dessus
if(isset($_POST['login_submit'])){
    extract($_POST,EXTR_OVERWRITE);
    $cli = new ClientDAO($cnx);
    $nom_client = $cli->getClient($login,$password);
    if($nom_client != null){
        $_SESSION['client'] = $nom_client;
        header('location: admin/index_.php?page=accueil_client.php');
    }else {
        $error_message = "Login ou mot de passe incorrect.";
    }
}

?>

<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
    <div class="mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" id="login" name="login">
    </div>
    <div class="mb-3">
        <label for="password1" class="form-label">Password</label>
        <input type="password" class="form-control" id="password1" name="password">
    </div>
    <?php
    // Afficher le message d'erreur si présent
    if (!empty($error_message)) {
        echo "<p style='color:red;'>" . $error_message . "</p>";
    }
    ?>

    <button type="submit" class="btn btn-primary" name="login_submit">Connexion</button>
</form>
