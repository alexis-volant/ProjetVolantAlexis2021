<?php include('lib/php/verifier_connexion.php');
$ecurie = new EcurieBD($cnx);
$liste_ecurie = $ecurie->getEcurieOrder();
$nbr = count($liste_ecurie);
?>
<br>v
<br>
<br>
<div class="container fond" style="width: 70%">
    <br>
    <h3>Editer / ajouter un pilote</h3>
    <br><br>
    <form>
        <div class="row">
            <div class="col-3">
                <label for="idpilote" class="form-label">Numero du pilote</label>
                <input type="number" class="form-control" id="idpilote" name="idpilote">
            </div>
            <div class="col-2">
                <label for="abrv" class="form-label">Abreviation </label>
                <input type="text" class="form-control" id="abrv" name="abrv">
            </div>
            <div class="col-4">
                <label for="nompilote" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nompilote" name="nompilote">
            </div>
            <div class="col-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-3">
                <label for="nationalite" class="form-label">Nationalite</label>
                <input type="text" class="form-control" id="nationalite" name="nationalite">
            </div>
            <div class="col-3">
                <label for="participationgp" class="form-label">Nbr Participation</label>
                <input type="number" class="form-control" id="participationgp" name="participationgp">
            </div>
            <div class="col-3">
                <label for="poleposition" class="form-label">Nbr de pole position</label>
                <input type="number" class="form-control" id="poleposition" name="poleposition">
            </div>
            <div class="col-3">
                <label for="podium" class="form-label">Nbr podium</label>
                <input type="number" class="form-control" id="podium" name="podium">
            </div>

        </div>
        <br>

        <div class="row">
            <div class="col-2">
                <label for="victoire" class="form-label">Nbr victoire</label>
                <input type="number" class="form-control" id="victoire" name="victoire">
            </div>
            <div class="col-3">
                <label for="titrechampion" class="form-label">Titre champion du monde</label>
                <input type="number" class="form-control" id="titrechampion" name="titrechampion">
            </div>

            <div class="col-4 custom-select">
                <label class="form-label">Ecurie</label>
                <select id="idecurie" name="idecurie" class="form-select" aria-label="Default select example">
                    <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        ?>
                        <option value="<?php print $liste_ecurie[$i]->idecurie ?>"><?php print $liste_ecurie[$i]->nomecurie ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

    </form>

    <br>
    <div class="row">
            <button class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
    </div>


</div>