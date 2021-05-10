<?php
include ('./lib/php/verifier_connexion.php');
$pil = new PiloteBD($cnx);
$liste = $pil->getPiloteOrder();
$nbr =count($liste);
 ?>
<br>
<br>
<br>
<br>

<table class="table" align="center">
    <thead>
    <tr class="titre">
        <th scope="col">Numero Pilote</th>
        <th scope="col">Abreviation</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Nationalité</th>
        <th scope="col">Nombre Participation</th>
        <th scope="col">Nombre Pole</th>
        <th scope="col">Nombre Podium</th>
        <th scope="col">Nombre Victoire</th>
        <th scope="col">Titre Champion</th>
        <th scope="col">Ecurie</th>
        <th scope="col">      </th>
        <th scope="col">      </th>

    </tr>
    </thead>
    <tbody>
    <?php
    for($i =0; $i <$nbr; $i++){
    ?>
    <tr>
        <!-- >th scope="row"> <?php //print $liste[$i]->idpilote; ?></th> -->

        <td><span contenteditable="true" name="idpilote" id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]-> idpilote ; ?></span> </td>
        <td><span contenteditable="true" name="abrv" id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]-> abrv; ?></span> </td>
        <td><span contenteditable="true" name="nompilote" id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]-> nompilote; ?></span> </td>
        <td><span contenteditable="true" name="prenom" id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]-> prenom; ?></span> </td>
        <td><span contenteditable="true" name="nationalite" id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]-> nationalite; ?></span> </td>
        <td><span contenteditable="true" name="participationgp" id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]-> participationgp; ?></span> </td>
        <td><span contenteditable="true" name="poleposition" id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]-> poleposition; ?></span> </td>
        <td><span contenteditable="true" name="podium" id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]-> podium; ?></span> </td>
        <td><span contenteditable="true" name="victoire" id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]->victoire; ?></span> </td>
        <td><span contenteditable="true" name="titrechampion" id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]->titrechampion; ?></span> </td>

        <td><span id="<?php print $liste[$i]->idpilote; ?>"><?php print $liste[$i]-> idecurie; ?></span> </td>

        <td><span><button class="w-100 btn btn-lg btn-dark text-white delete" type="submit" name="delete" id="<?php print $liste[$i]->idpilote; ?>">Supprimer</button></span></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
