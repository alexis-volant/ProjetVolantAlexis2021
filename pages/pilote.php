<br>
<br>
<br>
<br>
<br>
<h1>Ecurie</h1>

<?php
$pilote = new PiloteBD($cnx);
$liste_pilote = $pilote->getPiloteOrder();
$nbr = count($liste_pilote);
?>

<div class="album py-5">
    <?php
    for($i =0;$i <$nbr;$i++) {
        ?>
        <div class="container">
            <div class="row">
                <?php
                for($i =0;$i <$nbr;$i++) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="admin/images/<?php print $liste_pilote[$i]->photo?>" alt="Image pilote">
                            <div class="card-body">
                                <a class="lien" href="index_.php?page=page_pilote.php&idpilote=<?php print $liste_pilote[$i]->idpilote?>">
                                    <p class="card-text"><?php print $liste_pilote[$i]->nompilote?></p>
                                    <p class="card-text"><?php print $liste_pilote[$i]->idpilote?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>