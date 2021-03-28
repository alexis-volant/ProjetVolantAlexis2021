<br>
<br>
<br>
<div class="container text-center">
        <video width="700" controls preload="metadata" >
            <source src="admin/images/opening.mp4#t=0.1"
                    type="video/mp4">
        </video>

    <!-- <div class="img-comp-container">
        <div class="img-comp-img">
            <img src="admin/images/racp20.jpg" width="612" height="408.25">
        </div>
        <div class="img-comp-img img-comp-overlay">
            <img src="admin/images/amr21.jpg" width="612" height="408.25">
        </div>
    </div> -->
</div>

<?php
$ecurie = new EcurieBD($cnx);
$liste_ecurie = $ecurie->getEcurie();
$nbr = count($liste_ecurie);
?>

<script src="admin/lib/js/comparaison.js"></script>
<script>
    initComparisons();
</script>