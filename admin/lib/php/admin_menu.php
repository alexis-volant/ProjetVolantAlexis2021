<?php if(isset($_GET['page'])) {
    $page= $_GET['page'];
}
else{ $page = 'accueil.php';}?>

<nav class="navbar navbar-expand-sm navbar-custom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand"> <img src="./images/logo.png" alt="F1 Logo" style="width:100px;"></a>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;"">
            <li class="nav-item">
                <a class="nav-link <?php if($page=='gestion_pilote.php'){echo 'active';}?>" href="index_.php?page=gestion_pilote.php">Gestion Pilote</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='ajout_pilote.php'){echo 'active';}?>" href="index_.php?page=ajout_pilote.php">Ajout Pilote</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='gestion_comm.php'){echo 'active';}?>" href="index_.php?page=gestion_comm.php">Gestion commentaire</a>
            </li>
            </ul>

            <ul class="navbar-nav r-3 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='deconnexion.php'){echo 'active';}?>" href="index_.php?page=deconnexion.php">Deconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
