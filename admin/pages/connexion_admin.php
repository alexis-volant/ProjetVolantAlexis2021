<br><br><br><br><h1>Accueil admin</h1>

<?php
if (isset($_POST['submit'])) {
    extract($_POST, EXTR_OVERWRITE);
    $ad = new AdminBD($cnx);
    $admin = $ad->getAdmin($login, $password);
    //var_dump($admin);

    if ($admin) {
        $_SESSION['admin'] = 1;


        $_SESSION['login_admin'] = $login; //recup login

        $message = "Connexion réussie";

    } else {

        $message = " identifiants incorrects";
    }
}
if (isset($message) && !isset($_SESSION['admin'])) {
    ?>
    <br>
    <div class="container" style="width: 20%">
        <div class="alert alert-danger" role="alert">
        <?php
        print $message;
        ?>

    </div>
    </div>
    <?php
} else if (isset($message) && isset($_SESSION['admin'])) {
    ?>
    <br>
    <div class="container" style="width: 20%">
        <div class="alert alert-success" role="alert">
        <?php
        print $message;
        ?>
        <meta http-equiv="refresh" : content="1;URL= ../admin/index_.php?page=accueil_admin.php">
    </div>
    </div>
    <?php
}
?>

<div class="container" style="width: 20%">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="login" class="visually-hidden">Adresse Mail</label>
            <input type="login" class="form-control" id="login" name="login" placeholder="login">
        </div>
        <div class="form-group">
            <label for="password" class="visually-hidden">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-dark text-white" type="submit" name="submit">Se Connecter</button>
    </form>
</div>
