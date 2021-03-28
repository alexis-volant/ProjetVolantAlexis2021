<?php
$ecurie = new EcurieBD($cnx);
if(isset($_GET['idecurie'])){
    $ecu = $ecurie->getEcurieByid($_GET['idecurie']);
}else{
    $ecu = $ecurie->getEcurie();
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
                <img class="card-img-top" src="admin/images/<?php print $ecu[0]->logo?>" alt="Image Ecurie">
            </div>
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-5  underline"><?php print $ecu[0]->nomecurie?></h3>

            </div>
        </div>
    </center>
</div>


