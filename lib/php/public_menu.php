<?php if(isset($_GET['page'])) {
    $page= $_GET['page'];
}
else{ $page = 'accueil.php';}?>

<nav class="navbar navbar-expand-sm navbar-custom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index_.php?page=accueil.php"> <img src="./admin/images/logo.png" alt="F1 Logo" style="width:80px;"></a>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;"">
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='accueil.php'){echo 'active';}?>" href="index_.php?page=accueil.php"> Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='ecurie.php'){echo 'active';}?>" href="index_.php?page=ecurie.php">Ecuries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page=='pilote.php'){echo 'active';}?>" href="#">Pilotes</a>
                </li>
            </ul>
            <ul class="navbar-nav r-3 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php if($page=='connexion.php' || $page=='deconnexion.php' || $page=='inscription.php') {print 'active';}?>" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Connexion
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="index_.php?page=connexion.php">Connexion</a></li>
                        <li><a class="dropdown-item" href="index_.php?page=deconnexion.php">Déconnexion</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index_.php?page=inscription.php">Inscription</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
