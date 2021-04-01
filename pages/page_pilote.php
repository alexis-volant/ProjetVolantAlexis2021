<?php
$pilote = new PiloteBD($cnx);
if(isset($_GET['idpilote'])){
    $pil = $pilote->getPiloteByid($_GET['idpilote']);
}else{
    $pil = $pilote->getPilote();
}
?>

<br><br>
<br><br>
<br><br>
<br><br>
<br><br>


<div class="container">
    <center>
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm w-75 h-md-250">
            <div class="col-auto d-none d-lg-block">
                <img class="card-img-top" src="admin/images/<?php print $pil[0]->photo?>" alt="Image Pilote">
            </div>
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-5  underline"><?php print $pil[0]->nompilote?></h3>
                <h3 class="mb-5  underline"><?php print $pil[0]->abrv?></h3>
                <h3 class="mb-5  underline"><?php print $pil[0]->idpilote?></h3>

            </div>
        </div>
    </center>
</div>

