<?php
$pilote = new PiloteBD($cnx);
if (isset($_GET['idpilote'])) {
    $pil = $pilote->getPiloteByid($_GET['idpilote']);
} else {
    $pil = $pilote->getPilote();
}

$ecurie = new EcurieBD($cnx);
if (isset($_GET['idpilote'])) {
    $ecu = $ecurie->getEcurieByPilote($_GET['idpilote']);
} else {
    $ecu = $ecurie->getEcurie();
}
?>

<br><br>

<div class="container">

    <div class="row">
        <div class="col-5">
            <div class="<?php if($pil[0]->idpilote ==9){print "monlogo";} ?>">
            <img class="card-img-top "src="admin/images/<?php print $pil[0]->photo ?>" alt="Image Pilote">
            </div>
            <center>
                <div class="col p-2 d-flex flex-column position-static bg_pilote">
                    <p class="info">
                    <h2>
                        <?php print $pil[0]->prenom ?>
                        <?php print $pil[0]->nompilote ?><br>
                        <?php print $pil[0]->abrv ?><br>
                        <?php print $pil[0]->idpilote ?></h2>
                    </p>

                </div>
            </center>

        </div>

        <div class="col-1"></div>

        <div class="col-6">
            <table class="table3">
                <tbody class="body3">
                <tr>
                    <th scope="row">Nationalité</th>

                    <td><?php print $pil[0]->nationalite ?></td>
                </tr>
                <tr>
                    <th scope="row">Nbr Participation GP</th>
                    <td><?php print $pil[0]->participationgp ?></td>
                </tr>
                <tr>
                    <th scope="row">Nbr PolePosition</th>
                    <td><?php print $pil[0]->poleposition ?></td>
                </tr>
                <tr>
                    <th scope="row">Nbr Podium</th>
                    <td> <?php print $pil[0]->podium ?></td>
                </tr>
                <tr>
                    <th scope="row">Nbr Victoire</th>
                    <td><?php print $pil[0]->victoire ?></td>
                </tr>
                <tr>
                    <th scope="row">Titre Champion du monde</th>
                    <td><?php print $pil[0]->titrechampion ?></td>
                </tr>
                <tr>
                    <th scope="row">Ecurie</th>
                    <td>
                    <a class="lien" href="index_.php?page=page_ecurie.php&idecurie=<?php print $ecu[0]->idecurie?>">
                    <?php print $ecu[0]->nomecurie ?>
                    </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

