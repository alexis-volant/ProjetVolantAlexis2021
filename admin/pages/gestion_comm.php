<?php
include ('./lib/php/verifier_connexion.php');
$com = new CommentaireBD($cnx);
$liste_comm = $com->getComm();
$nbr =count($liste_comm);
?>
<br>
<br>
<br>
<br>

<table class="table" align="center">
    <thead>
    <tr class="titre">
        <th scope="col">Pseudo</th>
        <th scope="col">Commentaire</th>
        <th scope="col">      </th>

    </tr>
    </thead>
    <tbody>
    <?php
    for($i =0; $i <$nbr; $i++){
        ?>
        <tr>

            <td><span  name="pseudo" id="<?php print $liste_comm[$i]->id_comm; ?>"><?php print $liste_comm[$i]->pseudo  ; ?></span> </td>
            <td><span name="comm" id="<?php print $liste_comm[$i]->id_comm; ?>"><?php print $liste_comm[$i]-> comm; ?></span> </td>


            <td><span><button class="w-100 btn btn-lg btn-dark text-white deletecomm" name="deletecomm" id="<?php print $liste_comm[$i]->id_comm; ?>">Supprimer</button></span></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
