<br>
<br>
<br>
<h3>Connexion</h3>
<?php
if (isset($_POST['submit'])) {
    extract($_POST, EXTR_OVERWRITE);
    $cli = new ClientBD($cnx);
    $client = $cli->getClient($login, $password);

    //var_dump($client);

    if ($client) {
        $_SESSION['client'] = 1;

        $_SESSION['login_client'] = $login; //recup login

        $message = "Connexion réussie";


    } else {

        $message = " identifiants incorrects";
    }
}
if (isset($message) && !isset($_SESSION['client'])) {
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
} else if (isset($message) && isset($_SESSION['client'])) {
    ?>
    <br>
    <div class="container" style="width: 20%">
        <div class="alert alert-success" role="alert">
            <?php
            print $message;
            ?>
            <meta http-equiv="refresh" : content="1;URL= ./index_.php?page=accueil.php">
        </div>
    </div>
    <?php
}
?>

<br>

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

<div class="container" style="width: 20%">
    <br>
    <a class="lien" href="index_.php?page=inscription.php">Pas encore de compte ? </a>
    <br>
    <br>
    <a class="lien" href="admin/index_.php?page=connexion_admin.php">Portail Admin</a>
</div>
<br>
<br>
<br>


