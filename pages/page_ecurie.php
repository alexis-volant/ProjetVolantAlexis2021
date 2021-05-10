<br><br>
<?php
$ecurie = new EcurieBD($cnx);
if (isset($_GET['idecurie'])) {
    $ecu = $ecurie->getEcurieByid($_GET['idecurie']);
} else {
    $ecu = $ecurie->getEcurie();
}

$commentaire = new CommentaireBD($cnx);
if (isset($_GET['idecurie'])) {
    $liste_comm = $commentaire->getCommByEcurie($_GET['idecurie']);

    $temp=count($liste_comm);
    if($temp!=0){
    $nbr = $temp;}
} else {
    $liste_comm = $commentaire->getComm();
    $temp=count($liste_comm);
    if($temp!=0){
        $nbr = $temp;}
}
?>

<br><br>
<br><br>
<br><br>
<br><br>
<br><br>



<div class="container logoecurie">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm w-50 h-md-250">
            <div class="col-auto d-none d-lg-block">
                <img src="admin/images/<?php print $ecu[0]->logo ?>" alt="Image Ecurie" height="400px" width="200px">
            </div>
            <div class="col p-4 d-flex flex-column position-static bas">
                <h3 class="mb-5"><?php print $ecu[0]->nomecurie ?></h3>
                <table class="table right">
                    <tbody>
                    <tr>
                        <th scope="row">Nom Ecurie</th>
                        <td>
                                    <span name="plateforme" id="<?php print $ecu[0]->nomecurie ?>">
                                    <?php print $ecu[0]->nomecurie ?>
                                    </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<div align="center">
    <div class="img-comp-container">
        <div class="img-comp-img">
            <img src="admin/images/<?php print $ecu[0]->photovoit1 ?>" width="612" height="408.25">
        </div>
        <div class="img-comp-img img-comp-overlay">
            <img src="admin/images/<?php print $ecu[0]->photovoit2 ?>" width="612" height="408.25">
        </div>
    </div>
</div>
<script src="admin/lib/js/comparaison.js"></script>
<script>
    initComparisons();
</script>

<?php if($temp > 0){?>
<div class="album py-5">
        <div class="container">
            <div class="row">
                <?php
                for($i =0;$i <$nbr;$i++) {
                    ?>
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                    <p class="card-text"><?php print $liste_comm[$i]->pseudo?></p>
                                    <p class="card-text"><?php print $liste_comm[$i]->comm?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
</div>
<?php } ?>

<div align="right">
    <label for="comm">Votre commentaire:</label>
    <textarea id="comm" name="comm" rows="5" cols="33">
    </textarea>
    <input type="hidden" id="pseudo" name="pseudo" value="<?php print $_SESSION['login_client'];?>">
    <input type="hidden" id="id_ecurie" name="id_ecurie" value="<?php print $ecu[0]->idecurie;?>">
    <div class="col-12">
        <button class="btn btn-primary" id="envoyer" name="envoyer">Envoyer</button>
    </div>
</div>



