<br><br>
<?php
$ecurie = new EcurieBD($cnx);
if (isset($_GET['idecurie'])) {
    $ecu = $ecurie->getEcurieByid($_GET['idecurie']);
} else {
    $ecu = $ecurie->getEcurie();
}

$pilote = new PiloteBD($cnx);
if (isset($_GET['idecurie'])) {
    $liste_pil = $pilote->getPiloteByEcu($_GET['idecurie']);
    $nbr2 = count($liste_pil);
} else {
    $liste_pil = $pilote->getPilote();
    $nbr2 = count($liste_pil);
}

$commentaire = new CommentaireBD($cnx);
if (isset($_GET['idecurie'])) {
    $liste_comm = $commentaire->getCommByEcurie($_GET['idecurie']);

    $temp = count($liste_comm);
    if ($temp != 0) {
        $nbr = $temp;
    }
} else {
    $liste_comm = $commentaire->getComm();
    $temp = count($liste_comm);
    if ($temp != 0) {
        $nbr = $temp;
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card-body">
                <img class="card-img-top ecu" src="admin/images/<?php print $ecu[0]->logo ?>" alt="Image Ecurie"
                     height="100%" width="100%">
                <div class="col p-6 d-flex flex-column position-static bg_pilote ecu">
                    <table class="table4">
                        <tbody>
                        <tr>
                            <th scope="row">Pays</th>
                            <td>
                                <span name="pays" id="pays"> <?php print $ecu[0]->pays ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Titre Constructeur</th>
                            <td>
                    <span name="titreconstructeur"
                          id="titreconstructeur"> <?php print $ecu[0]->titreconstructeur ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Grand Prix Disputé</th>
                            <td>
                                <span name="gpdispute" id="gpdispute"> <?php print $ecu[0]->gpdispute ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Nombre de victoire</th>
                            <td>
                                <span name="victoire" id="victoire"> <?php print $ecu[0]->victoire ?></span>
                            </td>
                        </tr>
                        <tr>

                            <td>

                        <a type="button" class="nav-link <?php if($page=='print_ecurie.php'){echo 'active';} ?> btn btn-primary "
                           href="index_.php?page=print_ecurie.php&idecurie=<?php print $ecu[0]->idecurie; ?>">Imprimer</a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        for ($i = 0; $i < $nbr2; $i++) {
            ?>
            <div class="col-3">
                <div class="card-body">
                    <img class="card-img-top" src="admin/images/<?php print $liste_pil[$i]->photo ?>"
                         alt="Image Pilote">
                    <a class="lien"
                       href="index_.php?page=page_pilote.php&idpilote=<?php print $liste_pil[$i]->idpilote ?>">
                        <p class="card-text2"><br><br><?php print $liste_pil[$i]->nompilote ?> <br>
                        <?php print $liste_pil[$i]->idpilote ?></p>
                    </a>
                </div>

            </div>
        <?php } ?>
    </div>
</div>

<br><br>
<div class="container" style="width: 35%">
    <div class="col-6">
        <div class="img-comp-container ">
            <div class="img-comp-img ecu">
                <img src="admin/images/<?php print $ecu[0]->photovoit1 ?>" width="662" height="408.25">
            </div>
            <div class="img-comp-img img-comp-overlay ecu">
                <img src="admin/images/<?php print $ecu[0]->photovoit2 ?>" width="662" height="408.25">
            </div>
        </div>
        <script src="admin/lib/js/comparaison.js"></script>
        <script>
            initComparisons();
        </script>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br>
<hr size="2px">
<?php if(isset($_SESSION['login_client'])){ ?>
<div class="container" style="width: 85%">
    <div class="row">
        <div class="col-5">
            <textarea id="comm"name="comm"rows="5"cols="50"placeholder="Votre Commentaire: "></textarea>
            <input type="hidden" id="pseudo" name="pseudo" value="<?php print $_SESSION['login_client']; ?>">
            <input type="hidden" id="id_ecurie" name="id_ecurie" value="<?php print $ecu[0]->idecurie; ?>">
            <div>
                <button class="btn btn-primary" id="envoyer" name="envoyer">Envoyer</button>
            </div>
        </div>

        <div class="col-6">
            <?php if ($temp > 0) { ?>
            <div class="bg_comm">
                <table class="table2">
                    <thead>
                    <tr class="titre">
                        <th scope="col">Pseudo</th>
                        <th scope="col">Commentaire</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i = 0;
                         $i < $nbr;
                         $i++) {
                        ?>
                        <tr>
                            <td><?php print $liste_comm[$i]->pseudo ?></td>
                            <td><?php print $liste_comm[$i]->comm ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php }
else{?>
        <center>
            <a class="lien" href="index_.php?page=connexion.php">
                <h3>Connectez vous pour laisser un commentaire</h3>
            </a>
        </center>
<?php } ?>




