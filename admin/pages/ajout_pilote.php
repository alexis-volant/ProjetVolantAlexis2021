<?php include ('lib/php/verifier_connexion.php'); ?>
<br><br>
<br><br>
<br><br>


<div class="container" style="width: 60%">
<h2>Editer / ajouter un pilote</h2>

<form row g-3>
    <div class="col-md-2">
        <label for="idpilote" class="form-label">Numero du pilote</label>
        <input type="number" class="form-control" id="idpilote" name="idpilote">
    </div>
    <div class="col-md-6">
        <label for="abrv" class="form-label">Abreviation </label>
        <input type="text" class="form-control" id="abrv" name="abrv">
    </div>
    <div class="col-md-12">
        <label for="nompilote" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nompilote" name="nompilote">
    </div>
    <div class="col-md-2">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="prenom" name="prenom">
    </div>
    <div class="col-md-2">
        <label for="nationalite" class="form-label">Nationalite</label>
        <input type="text" class="form-control" id="nationalite" name="nationalite">
    </div>
    <div class="col-md-2">
        <label for="participationgp" class="form-label">Nbr Participation</label>
        <input type="number" class="form-control" id="participationgp" name="participationgp">
    </div>
    <div class="col-md-2">
        <label for="poleposition" class="form-label">Nbr de pole position</label>
        <input type="number" class="form-control" id="poleposition" name="poleposition">
    </div>
    <div class="col-md-2">
        <label for="podium" class="form-label">Nbr podium</label>
        <input type="number" class="form-control" id="podium" name="podium">
    </div>
    <div class="col-md-2">
        <label for="victoire" class="form-label">Nbr victoire</label>
        <input type="number" class="form-control" id="victoire" name="victoire">
    </div>
    <div class="col-md-2">
        <label for="titrechampion" class="form-label">Titre champion du monde</label>
        <input type="number" class="form-control" id="titrechampion" name="titrechampion">
    </div>

    <!--<div class="col-md-2">
        <label for="photo" class="form-label">photo</label>
        <input type="number" class="form-control" id="photo">
    </div>-->

    <div class="col-md-2">
        <label for="idecurie" class="form-label">idecurie</label>
        <input type="number" class="form-control" id="idecurie" name="idecurie">
    </div>

</form>
    <div class="col-12">
        <button class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
    </div>
</div>