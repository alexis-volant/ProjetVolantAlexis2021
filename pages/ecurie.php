<br>
<br>
<br>
<br>
<br>
<h1>Ecurie</h1>

<?php
$ecurie = new EcurieBD($cnx);
$liste_ecurie = $ecurie->getEcurieOrder();
$nbr = count($liste_ecurie);
?>

<div class="album py-5">
    <?php
    for($i =0;$i <$nbr;$i++) {
        ?>
        <div class="col-container">
            <div class="row" >
                <?php
                for($i =0;$i <$nbr;$i++) {
                    ?>
                    <div class="col-md-4" >
                        <div class="card mb-4 box-shadow" >
                            <img class="card-img-top" src="admin/images/<?php print $liste_ecurie[$i]->logo?>" alt="Image Ecurie" height="250px" width="300px" >
                            <div class="card-body" >
                                <a class="lien" href="index_.php?page=page_ecurie.php&idecurie=<?php print $liste_ecurie[$i]->idecurie?>">
                                <p class="card-text"><?php print $liste_ecurie[$i]->nomecurie?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>