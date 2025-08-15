<?php 
session_start();
require("BaseDeDonnees.php");

include('affichageIndex.php');

?>

<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>EJOB</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/blue.css">
<link rel="stylesheet" href="contact.css">
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth">

    <!-- Header -->
    <div id="header">
        <div class="container">
            
            <!-- Left Side Content -->
            <div class="left-side">
                
                <!-- Logo -->
                <div id="logo">
                    <a href="index.php"><img src="logo.png" alt="" style="height:100%;width:9rem;"></a>
                </div>

                <!-- Main Navigation -->
                <nav id="navigation">
                    <ul id="responsive">

                        <li><a href="#" class="current">Home</a></li>

                        <li><a href="#NouvellesOffres">Nouvelles offres</a></li>

                        <li><a href="#AvisSurEjob">Avis sur Ejob</a></li>

                        <?php if(isset($_SESSION['utilisateur_connecte'])){ ?>

                        <li><a href="ejobBook.php">EjobBook</a></li>

                        <?php } ?>

                        <li><a href="#Stats">Stats</a></li>

                        <li><a href="#footer">Contacts</a></li>

                    </ul>
                </nav>
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->
                
            </div>
            <!-- Left Side Content / End -->

<?php if(isset($_SESSION['utilisateur_connecte']) || isset($_SESSION['entreprise_connecte']) ){ ?>

            <!-- Right Side Content / End -->
            <div class="right-side">

                <!--  User Notifications -->
                <div class="header-widget hide-on-mobile">
                    
                    <!-- Notifications -->
                    <div class="header-notifications">

                        <!-- Trigger -->
                        <div class="header-notifications-trigger">
                            <a href="#"><i class="icon-feather-bell"></i><span>4</span></a>
                        </div>

                        <!-- Dropdown -->
                        <div class="header-notifications-dropdown">

                            <div class="header-notifications-headline">
                                <h4>Notifications</h4>
                                <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                                    <i class="icon-feather-check-square"></i>
                                </button>
                            </div>

                            <div class="header-notifications-content">
                                <div class="header-notifications-scroll" data-simplebar>
                                    <ul>
                                        <!-- Notification -->
                                        <li class="notifications-not-read">
                                            <a href="dashboard-manage-candidates.html">
                                                <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                                <span class="notification-text">
                                                    <strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
                                                </span>
                                            </a>
                                        </li>

                                        <!-- Notification -->
                                        <li>
                                            <a href="dashboard-manage-bidders.html">
                                                <span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>
                                                <span class="notification-text">
                                                    <strong>Gilbert Allanis</strong> placed a bid on your <span class="color">iOS App Development</span> project
                                                </span>
                                            </a>
                                        </li>

                                        <!-- Notification -->
                                        <li>
                                            <a href="dashboard-manage-jobs.html">
                                                <span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>
                                                <span class="notification-text">
                                                    Your job listing <span class="color">Full Stack PHP Developer</span> is expiring.
                                                </span>
                                            </a>
                                        </li>

                                        <!-- Notification -->
                                        <li>
                                            <a href="dashboard-manage-candidates.html">
                                                <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                                                <span class="notification-text">
                                                    <strong>Sindy Forrest</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                    <!-- Messages -->
                    <div class="header-notifications">
                        <div class="header-notifications-trigger">
                            <a href="#"><i class="icon-feather-mail"></i><span>3</span></a>
                        </div>

                        <!-- Dropdown -->
                        <div class="header-notifications-dropdown">

                            <div class="header-notifications-headline">
                                <h4>Messages</h4>
                                <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                                    <i class="icon-feather-check-square"></i>
                                </button>
                            </div>

                            <div class="header-notifications-content">
                                <div class="header-notifications-scroll" data-simplebar>
                                    <ul>
                                        <!-- Notification -->
                                        <li class="notifications-not-read">
                                            <a href="dashboard-messages.html">
                                                <span class="notification-avatar status-online"><img src="images/user-avatar-small-03.jpg" alt=""></span>
                                                <div class="notification-text">
                                                    <strong>David Peterson</strong>
                                                    <p class="notification-msg-text">Thanks for reaching out. I'm quite busy right now on many...</p>
                                                    <span class="color">4 hours ago</span>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Notification -->
                                        <li class="notifications-not-read">
                                            <a href="dashboard-messages.html">
                                                <span class="notification-avatar status-offline"><img src="images/user-avatar-small-02.jpg" alt=""></span>
                                                <div class="notification-text">
                                                    <strong>Sindy Forest</strong>
                                                    <p class="notification-msg-text">Hi Tom! Hate to break it to you, but I'm actually on vacation until...</p>
                                                    <span class="color">Yesterday</span>
                                                </div>
                                            </a>
                                        </li>

                                        <!-- Notification -->
                                        <li class="notifications-not-read">
                                            <a href="dashboard-messages.html">
                                                <span class="notification-avatar status-online"><img src="images/user-avatar-placeholder.png" alt=""></span>
                                                <div class="notification-text">
                                                    <strong>Marcin Kowalski</strong>
                                                    <p class="notification-msg-text">I received payment. Thanks for cooperation!</p>
                                                    <span class="color">Yesterday</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <a href="dashboard-messages.html" class="header-notifications-button ripple-effect button-sliding-icon">View All Messages<i class="icon-material-outline-arrow-right-alt"></i></a>
                        </div>
                    </div>

                </div>
                <!--  User Notifications / End -->

                <?php if(isset($_SESSION['utilisateur_connecte'])){ ?>

                <!-- User Menu -->
                <div class="header-widget">

                    <!-- Messages -->
                    <div class="header-notifications user-menu">
                        <div class="header-notifications-trigger">
                            <a href="#"><div class="user-avatar status-online"><img src="<?=$_SESSION['photo'] ?>" alt="" style="width:6rem;height:3rem;"></div></a>
                        </div>

                        <!-- Dropdown -->
                        <div class="header-notifications-dropdown">

                            <!-- User Status -->
                            <div class="user-status">

                                <!-- User Name / Avatar -->
                                <div class="user-details">
                                    <div class="user-avatar status-online"><img src="<?=$_SESSION['photo'] ?>" alt="" style="width:6rem;height:3rem;"></div>
                                    <div class="user-name">
                                        <?=$_SESSION['nom'].' '.$_SESSION['prenom'] ?>  <span>Utilisateur</span>
                                    </div>
                                </div>
                                
                                <!-- User Status Switcher -->
                                <div class="status-switch" id="snackbar-user-status">
                                    <label class="user-online current-status">Online</label>
                                    <label class="user-invisible">Invisible</label>
                                    <!-- Status Indicator -->
                                    <span class="status-indicator" aria-hidden="true"></span>
                                </div>  
                        </div>
                        
                        <ul class="user-menu-small-nav">
                            <li><a href="dashboardU.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                            <li><a href="parametreU.php"><i class="icon-material-outline-settings"></i> Parametre</a></li>
                            <li><a href="deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i> Deconnexion</a></li>
                        </ul>

                        </div>
                    </div>

                </div>
                <!-- User Menu / End -->

                <?php }else{ ?>

                <!-- User Menu -->
                <div class="header-widget">

                    <!-- Messages -->
                    <div class="header-notifications user-menu">
                        <div class="header-notifications-trigger">
                            <a href="#"><div class="user-avatar status-online"><img src="<?=$_SESSION['photo_e'] ?>" alt=""></div></a>
                        </div>

                        <!-- Dropdown -->
                        <div class="header-notifications-dropdown">

                            <!-- User Status -->
                            <div class="user-status">

                                <!-- User Name / Avatar -->
                                <div class="user-details">
                                    <div class="user-avatar status-online"><img src="<?=$_SESSION['photo_e'] ?>" alt=""></div>
                                    <div class="user-name">
                                        <?=$_SESSION['nom_e'].'-'.$_SESSION['sigle_e'] ?>  <span>Recruteur</span>
                                    </div>
                                </div>
                                
                                <!-- User Status Switcher -->
                                <div class="status-switch" id="snackbar-user-status">
                                    <label class="user-online current-status">Online</label>
                                    <label class="user-invisible">Invisible</label>
                                    <!-- Status Indicator -->
                                    <span class="status-indicator" aria-hidden="true"></span>
                                </div>  
                        </div>
                        
                        <ul class="user-menu-small-nav">
                            <li><a href="dashboardE.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                            <li><a href="parametreE.php"><i class="icon-material-outline-settings"></i> Parametre</a></li>
                            <li><a href="deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i> Deconnexion</a></li>
                        </ul>

                        </div>
                    </div>

                </div>
                <!-- User Menu / End -->

                <?php } ?>

                <!-- Mobile Navigation Button -->
                <span class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </span>

            </div>
            <!-- Right Side Content / End -->

            <?php } else{  ?>

                            <!-- Right Side Content / End -->
            <div class="right-side">

<div class="header-widget">
    <a href="#sign-in-dialog" class="popup-with-zoom-anim log-in-button"><i class="icon-feather-log-in"></i> <span>Connexion / Inscription</span></a>
</div>

<!-- Mobile Navigation Button -->
<span class="mmenu-trigger">
    <button class="hamburger hamburger--collapse" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>
</span>

</div>
<!-- Right Side Content / End -->

<?php } ?>

        </div>
    </div>
    <!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Intro Banner
================================================== -->
<!-- add class "disable-gradient" to enable consistent background overlay -->
<div class="intro-banner" data-background-image="chercher-un-emploi.jpg">
    <div class="container">
        
        <!-- Intro Headline -->
        <div class="row">
            <div class="col-md-12">
                <div class="banner-headline">
                    <h3>
                        <strong>Engagez des experts ou soyez embauché pour n'importe quel travail, à tout moment.</strong>
                        <br>
                        <span>Des milliers de petites entreprises utilisent<strong class="color"> EJob</strong> pour concrétiser leurs idées.</span>
                    </h3>
                </div>
            </div>
        </div>
        
        <!-- Search Bar -->
        <div class="row">
            <div class="col-md-12">
                <div class="intro-banner-search-form margin-top-95">

                    <!-- Search Field -->
                    <div class="intro-search-field">
                    <label class="field-title ripple-effect"><i class="icon-material-outline-location-on"></i>Lieu ?</label>
                    <select class="selectpicker default" id="lieu" name="lieu">
                            <option value="0" selected>Toutes les villes</option>
                            <?php foreach($localisations as $lieu){ ?>
                            <option value="<?=$lieu['id_localisation'] ?>"><?=$lieu['nom_localisation'] ?></option>
                            <?php } ?>CREATE TABLE `annonces` (
  `id_annonce` int(11) NOT NULL,
  `description` text NOT NULL,
  `salaire` float NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_annonce` date NOT NULL DEFAULT current_timestamp(),
  `date_fin` date NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `id_localisation` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id_annonce`, `description`, `salaire`, `type`, `date_annonce`, `date_fin`, `id_categorie`, `id_entreprise`, `id_localisation`, `titre`) VALUES
(2, 'recrutement', 2500, 'Stage', '2023-01-22', '2023-02-01', 11, 5, 2, 'DEVELOPPEUR WEB'),
(3, 'recrutement', 2500, 'Stage', '2023-01-22', '2023-02-01', 11, 5, 2, 'DEVELOPPEUR JAVA'),
(4, 'recrutement', 2500, 'Stage', '2023-01-22', '2023-02-01', 7, 5, 2, 'SECRETAIRE');
                        </select>
                    </div>

                    <!-- Search Field -->
                    

                    <!-- Search Field -->
                    <div class="intro-search-field">
                    <select class="selectpicker default" data-size="7" id="categorie" name="categorie">
                            <option value="0" selected>Toutes les catégories</option>
                            <?php foreach($categories as $categorie){ ?>
                            <option value="<?=$categorie['id_categorie'] ?>"><?=$categorie['nom_categorie'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Button -->
                    <div class="intro-search-button">
                        <button class="button ripple-effect" onclick="searchJobs()">Rechercher</button>
                    </div>
                    <script>
function searchJobs() {
  var lieu = document.getElementById("lieu").value;
  var categorie = document.getElementById("categorie").value;
  var url = "tasks-grid-layout.php?";
  
  if (lieu) {
    url += "lieu=" + encodeURIComponent(lieu) + "&";
  }
  if (categorie) {
    url += "categorie=" + encodeURIComponent(categorie) + "&";
  }
  
  
  window.open(url, "_blank");
}
</script>
                </div>
            </div>
        </div>
        <!-- Stats -->
        <div class="row">
            <div class="col-md-12">
                <ul class="intro-stats margin-top-45 hide-under-992px">
                    <li>
                        <strong class="counter"><?= $totalA['total'] ?></strong>
                        <span>Nombre d'Offres</span>
                    </li>
                    <li>
                        <strong class="counter"><?= $totalE['total'] ?></strong>
                        <span>Nombre de Recruteurs</span>
                    </li>
                    <li>
                        <strong class="counter"><?= $totalU['total'] ?></strong>
                        <span>Nombre d'utilisateurs</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

<!-- Content
================================================== -->
<!-- Popular Job Categories -->
<div class="section margin-top-65 margin-bottom-30">
    <div class="container">
        <div class="row">

            <!-- Section Headline -->
            <div class="col-xl-12">
                <div class="section-headline centered margin-top-0 margin-bottom-45">
                    <h3>Les Catégories Populaires</h3>
                </div>
            </div>

            
                <?php if($Cpopulaires != null){
                    foreach($Cpopulaires as $Cpopulaire){ ?>

              <div class="col-xl-3 col-md-6"> 
             <!-- Photo Box -->
                <a href="categories.php?id_categorie=<?=$Cpopulaire['id_categorie'] ?>" class="photo-box small" data-background-image="<?=$Cpopulaire['photo_categorie'] ?>">
                    <div class="photo-box-content">
                        <h3><?=$Cpopulaire['nom_categorie'] ?></h3>
                        <span><?=$Cpopulaire['total'] ?></span>
                    </div>
                </a>
                    </div>

                <?php }
                } else {    
                    foreach($CpopulairesD as $CpopulaireD){ ?>

                    <div class="col-xl-3 col-md-6">

                                    <!-- Photo Box -->
                <a href="categories.php?id_categorie=<?=$CpopulaireD['id_categorie'] ?>" class="photo-box small" data-background-image="<?=$CpopulaireD['photo_categorie'] ?>">
                    <div class="photo-box-content">
                        <h3><?=$CpopulaireD['nom_categorie'] ?></h3>
                        <span>0</span>
                    </div>
                </a>
                </div>

                <?php }
                              } ?>

            

        </div>
    </div>
</div>
<!-- Features Cities / End -->

<!-- Features Jobs -->
<div class="section gray margin-top-45 padding-top-65 padding-bottom-75" id="NouvellesOffres">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                
                <!-- Section Headline -->
                <div class="section-headline margin-top-0 margin-bottom-35">
                    <h3>Nouvelles Offres</h3>
                </div>
                
                <!-- Jobs Container -->
                <div class="listings-container compact-list-layout margin-top-35">

                <?php if($Nannonces != null){
                    foreach($Nannonces as $Nannonce){ ?>
                    
                    <!-- Job Listing -->
                    <a href="annonces.php?id_annonce=<?=$Nannonce['id_annonce'] ?>" class="job-listing with-apply-button">

                        <!-- Job Listing Details -->
                        <div class="job-listing-details">

                            <!-- Logo -->
                            <div class="job-listing-company-logo">
                                <img src="<?=$Nannonce['photo_e'] ?>" alt="">
                            </div>

                            <!-- Details -->
                            <div class="job-listing-description">
                                <h3 class="job-listing-title"><?=$Nannonce['titre'] ?></h3>

                                <!-- Job Listing Footer -->
                                <div class="job-listing-footer">
                                    <ul>
                                        <li><i class="icon-material-outline-business"></i><?=$Nannonce['sigle_e'] ?></li>
                                        <li><i class="icon-material-outline-location-on"></i><?=$Nannonce['nom_localisation'] ?></li>
                                        <li><i class="icon-material-outline-business-center"></i><?=$Nannonce['type'] ?></li>
                                        <li><i class="icon-material-outline-access-time"></i><?=$Nannonce['date_annonce'] ?></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Apply Button -->
                            <span class="list-apply-button ripple-effect">Voir Plus</span>
                        </div>
                    </a>    

                    <?php } } ?>

                </div>
                <!-- Jobs Container / End -->

            </div>
        </div>
    </div>
</div>
<!-- Featured Jobs / End -->


<!-- Highest Rated Freelancers -->
<div class="section padding-top-65 padding-bottom-70 full-width-carousel-fix">
    <div class="container">
        <div class="row">

            <div class="col-xl-12">
                <!-- Section Headline -->
                <div class="section-headline margin-top-0 margin-bottom-25">
                    <h3>Les Entreprises les mieux notés</h3>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="default-slick-carousel freelancers-container freelancers-grid-layout">

                <?php if($Epopulaires != null){
                    foreach($Epopulaires as $Epopulaire){ ?>

                    <!--Freelancer -->
                    <div class="freelancer">

                        <!-- Overview -->
                        <div class="freelancer-overview">
                            <div class="freelancer-overview-inner">
                                
                                <!-- Avatar -->
                                <div class="freelancer-avatar">
                                    <a href="profilE.php?id_entreprise=<?=$Epopulaire['id_entreprise'] ?>"><img src="<?=$Epopulaire['photo_e'] ?>" alt=""></a>
                                </div>

                                <!-- Name -->
                                <div class="freelancer-name">
                                    <h4><a href="profilE.php?id_entreprise=<?=$Epopulaire['id_entreprise'] ?>"><?=$Epopulaire['nom_e'] ?> <img class="flag" src="images/flags/<?=$Epopulaire['pays_e'] ?>.svg" alt="" title="<?=$Epopulaire['pays_e'] ?>" data-tippy-placement="top"></a></h4>
                                    <span><?=$Epopulaire['email_e'] ?></span>
                                </div>

                                <!-- Rating -->
                                <div class="freelancer-rating">
                                    <div class="star-rating" data-rating="<?=$Epopulaire['total'] ?>"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Details -->
                        <div class="freelancer-details">
                            <div class="freelancer-details-list">
                                <ul>
                                    <li>Employés<strong><?=$Epopulaire['nombre_employe'] ?></strong></li>
                                    <li>Crée le <strong><?=$Epopulaire['date_de_creation'] ?></strong></li>
                                </ul>
                            </div>
                            <a href="profilE.php?id_entreprise=<?=$Epopulaire['id_entreprise'] ?>" class="button button-sliding-icon ripple-effect">Voir Plus<i class="icon-material-outline-arrow-right-alt"></i></a>
                        </div>
                    </div>
                    <!-- Freelancer / End -->

                    <?php }
                }
                    else{ 
                        foreach($EpopulairesD as $EpopulaireD){
                        ?>

                    <!--Freelancer -->
                    <div class="freelancer">

                        <!-- Overview -->
                        <div class="freelancer-overview">
                            <div class="freelancer-overview-inner">
                                
                                <!-- Avatar -->
                                <div class="freelancer-avatar">
                                    <a href="profilE.php?id_entreprise=<?=$EpopulaireD['id_entreprise'] ?>"><img src="<?=$EpopulaireD['photo_e'] ?>" alt=""></a>
                                </div>

                                <!-- Name -->
                                <div class="freelancer-name">
                                    <h4><a href="profilE.php?id_entreprise=<?=$EpopulaireD['id_entreprise'] ?>"><?=$EpopulaireD['nom_e'] ?> <img class="flag" src="images/flags/<?=$EpopulaireD['pays_e'] ?>.svg" alt="" title="<?=$EpopulaireD['pays_e'] ?>" data-tippy-placement="top"></a></h4>
                                    <span><?=$EpopulaireD['email_e'] ?></span>
                                </div>

                                <!-- Rating -->
                                <div class="freelancer-rating">
                                    <div class="star-rating" data-rating="0"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Details -->
                        <div class="freelancer-details">
                            <div class="freelancer-details-list">
                                <ul>
                                    <li>Employés<strong><?=$EpopulaireD['nombre_employe'] ?></strong></li>
                                    <li>Crée le <strong><?=$EpopulaireD['date_de_creation'] ?></strong></li>
                                </ul>
                            </div>
                            <a href="profilE.php?id_entreprise=<?=$EpopulaireD['id_entreprise'] ?>" class="button button-sliding-icon ripple-effect">Voir Plus<i class="icon-material-outline-arrow-right-alt"></i></a>
                        </div>
                    </div>
                    <!-- Freelancer / End -->

                    <?php } } ?>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Highest Rated Freelancers / End-->

<!-- Testimonials -->
<div class="section gray padding-top-65 padding-bottom-55">
    
    <div class="container">
        <div class="row">
            <div class="col-xl-12" id="AvisSurEjob">
                <!-- Section Headline -->
                <div class="section-headline centered margin-top-0 margin-bottom-5">
                    <h3>Avis Sur EJob</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Carousel -->
    <div class="fullwidth-carousel-container margin-top-20">
        <div class="testimonial-carousel testimonials">

        <?php foreach($Aviss as $Avis){ 
            
            if($Avis['type']=="Utilisateur"){
                $req=$bd->prepare("SELECT `photo`,`id_utilisateur` from `utilisateurs` where `pseudo`= ? ");
                $req->execute(array($Avis['pseudo']));
                $res=$req->fetch();
                $photo=$res['photo'];
                $id=$res['id_utilisateur'];

                ?>

                <!-- Item -->
                <div class="fw-carousel-review"><a href="profilU.php?id_utilisateur=<?=$id ?>">
                    <div class="testimonial-box">
                        <div class="testimonial-avatar">
                            <img src="<?=$photo ?>" alt="">
                        </div>
                        <div class="testimonial-author">
                            <h4><?=$Avis['designation'] ?></h4>
                             <span><?=$Avis['type'] ?></span>
                        </div>
                        <div class="testimonial"><?=$Avis['avis'] ?></div>
                    </div></a>
                </div>

                <?php
            }
            else {
                $req=$bd->prepare("SELECT `photo_e`,`id_entreprise` from `entreprises` where `pseudo`= ? ");
                $req->execute(array($Avis['pseudo']));
                $res=$req->fetch();
                $photo=$res['photo_e'];
                $id=$res['id_entreprise'];

                ?>

                

                <!-- Item -->
                <div class="fw-carousel-review"><a href="profilE.php?id_entreprise=<?=$id ?>">
                    <div class="testimonial-box">
                        <div class="testimonial-avatar">
                            <img src="<?=$photo ?>" alt="">
                        </div>
                        <div class="testimonial-author">
                            <h4><?=$Avis['designation'] ?></h4>
                             <span><?=$Avis['type'] ?></span>
                        </div>
                        <div class="testimonial"><?=$Avis['avis'] ?></div>
                    </div></a>
                </div>

                <?php
            }
            
            
            

             } ?>

        </div>
    </div>
    <!-- Categories Carousel / End -->

</div>
<!-- Testimonials / End -->

<!-- Counters -->
<div class="section padding-top-70 padding-bottom-75" id="Stats">
    <div class="container">
        <div class="row">

            <div class="col-xl-12">
                <div class="counters-container">
                    
                    <!-- Counter -->
                    <div class="single-counter">
                        <i class="icon-line-awesome-suitcase"></i>
                        <div class="counter-inner">
                            <h3><span class="counter"><?=$totalA['total'] ?></span></h3>
                            <span class="counter-title">Nombre d'Offres</span>
                        </div>
                    </div>

                    <!-- Counter -->
                    <div class="single-counter">
                        <i class="icon-line-awesome-legal"></i>
                        <div class="counter-inner">
                            <h3><span class="counter">0</span></h3>
                            <span class="counter-title">Nombre de Candidature</span>
                        </div>
                    </div>

                    <!-- Counter -->
                    <div class="single-counter">
                        <i class="icon-line-awesome-user"></i>
                        <div class="counter-inner">
                            <h3><span class="counter"><?=$totalU['total'] + $totalE['total'] ?></span></h3>
                            <span class="counter-title">Membre Total</span>
                        </div>
                    </div>

                    <!-- Counter -->
                    <div class="single-counter">
                        <i class="icon-line-awesome-trophy"></i>
                        <div class="counter-inner">
                            <h3><span class="counter"><?=$satisfaction ?></span>%</h3>
                            <span class="counter-title">Satisfaction</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters / End -->

<!-- Footer
================================================== -->
<div id="footer" >
    
    <!-- Footer Top Section -->
    <div class="footer-top-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <!-- Footer Rows Container -->
                    <div class="footer-rows-container" style="height:10rem;">
                        
                        <!-- Left Side -->
                        <div class="footer-rows-left">
                            <div class="footer-row">
                                <div>
                                    <img src="logo.png" alt="" style="height:9rem;width:9rem;margin-top:1rem;">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Side -->
                        <div class="footer-rows-right">

                            <!-- Social Icons -->
                            <div class="footer-row">
                                <div class="footer-row-inner">
                                    <ul class="footer-social-links">
                                        <li>
                                            <a href="#" title="Facebook" data-tippy-placement="bottom" data-tippy-theme="light">
                                                <i class="icon-brand-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
                                                <i class="icon-brand-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Google Plus" data-tippy-placement="bottom" data-tippy-theme="light">
                                                <i class="icon-brand-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="LinkedIn" data-tippy-placement="bottom" data-tippy-theme="light">
                                                <i class="icon-brand-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <!-- Footer Rows Container / End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top Section / End -->

    <!-- Footer Middle Section -->
    <div class="footer-middle-section">
        <div class="container">
            <div class="row">

            <div id="contact-us" class="contact-us-container" style="margin-top:0;">
      <div class="content">

      <form action="#">
        <div class="topic">Nous Contacter !</div>
        <div class="input-box">
          <input type="text" required>
          <label>Votre Nom et Prenom</label>
        </div>
        <div class="input-box">
          <input type="text" required>
          <label>Votre Email</label>
        </div>
        <div class="message-box">
          <textarea name="message-box" id="message-box" cols="30" placeholder="Votre Message" rows="10" required></textarea>
        </div>
        
        <div class="input-box">
          <input type="submit" value="Envoyer">
        </div>
      </form>
      <div class="image-box">
        <img src="Contact-Us-Vector-Illustration-Part-02-1.jpg" alt="">
       </div>
    </div>
    </div>
            </div>
        </div>
    </div>
    <!-- Footer Middle Section / End -->
    
    <!-- Footer Copyrights -->
    <div class="footer-bottom-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    © 2023 <strong>EJob</strong>. Tous Droits Reservés.
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Copyrights / End -->

</div>
<!-- Footer / End -->

</div>
<!-- Wrapper / End -->




<!-- Sign In Popup
================================================== -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

    <!--Tabs -->
    <div class="sign-in-form">

        <ul class="popup-tabs-nav">
            <li><a href="#login">Connexion</a></li>
            <li><a href="#register2">Utilisateur</a></li>
            <li><a href="#register">Entreprise</a></li>
        </ul>

        <div class="popup-tabs-container">

            <!-- Login -->
            <div class="popup-tab-content" id="login">
                
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3>Nous sommes heureux de vous revoir!!</h3>
                    <span>Vous avez pas de compte? <a href="#" class="register-tab">Inscris-toi!</a></span>
                </div>
                    
                <!-- Form -->
                <form method="post" id="login-form">
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="text" class="input-text with-border" name="pseudo" id="emailaddress" placeholder="PSEUDO" required/>
                    </div>

                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-lock"></i>
                        <input type="password" class="input-text with-border" name="mot_de_passe" id="password" placeholder="MOT DE PASSE" required/>
                    </div>

                    <div class="alert alert-warning" role="alert">   </div>

                </form>
                
                <!-- Button -->
                <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="login-form">Se Connecter <i class="icon-material-outline-arrow-right-alt"></i></button>
                
                <!-- Social Login -->
                <div class="social-login-separator"><span>OU</span></div>
                <div class="social-login-buttons">
                    <a href="face.php?connexion=true" style="margin: 0 auto;width:80%;"><button class="facebook-login ripple-effect"><img src="face.png" style="width:80%;height:65%;"></button></a>
                </div>

            </div>

            <!-- Register -->
            <div class="popup-tab-content" id="register">
                
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3>Créons votre compte!</h3>
                </div>

                       <!-- Form -->
              <form method="post" id="register-account-form-1">

                <!-- Account Type -->
                <div class="account-type">
                    <div>
                        <input type="radio" name="type" id="freelancer-radio" class="account-type-radio" value="utilisateur" disabled/>
                        <label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Utilisateur</label>
                    </div>

                    <div>
                        <input type="radio" name="type" id="employer-radio" class="account-type-radio" value="entreprise" checked />
                        <label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Entreprise</label>
                    </div>
                </div>
                    
                
                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-building"></i>
                        <input type="text" class="input-text with-border" name="nom" id="emailaddress-register" placeholder="NOM" required/>
                    </div>
                    <div class="input-with-icon-left">
                    <i class="fa-regular fa-building"></i>
                        <input type="text" class="input-text with-border" name="sigle" id="emailaddress-register" placeholder="SIGLE" required/>
                    </div>
                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-phone"></i>
                        <input type="text" class="input-text with-border" name="telephone" id="emailaddress-register" placeholder="TELEPHONE" required/>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="text" class="input-text with-border" name="email" id="emailaddress-register" placeholder="EMAIL" required/>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="fa-solid fa-calendar"></i>
                        <input type="date" class="input-text with-border" name="date_de_creation" id="emailaddress-register" title="DATE DE CREATION" required/>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="fa-solid fa-sort-numeric-desc"></i>
                        <input type="number" class="input-text with-border" name="employe" id="emailaddress-register" placeholder="NOMBRE EMPLOYE" required/>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="fa-solid fa-text-width "></i>
                        <input type="text" class="input-text with-border" name="description" id="emailaddress-register" placeholder="DESCRIPTION" required/>
                    </div>
                    
                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-user-plus"></i>
                        <input type="text" class="input-text with-border" name="pseudo" id="emailaddress-register" placeholder="PSEUDO" required/>
                    </div>
                    <div class="input-with-icon-left" data-tippy-placement="bottom">
                        <i class="icon-material-outline-lock"></i>
                        <input type="password" class="input-text with-border" name="mot_de_passe" id="password-register" placeholder="MOT DE PASSE" required/>
                    </div>

                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-image"></i>
                        <input type="file" class="input-text with-border" name="photo" id="password-repeat-register" required/>
                    </div>

                    <div class="submit-field">
                
                                            <select data-size="7" data-live-search="true" name="pays">
                                            
                                                <option value="" selected>Pays</option>
                                                <option value="ar">Argentina</option>
                                                <option value="am">Armenia</option>
                                                <option value="aw">Aruba</option>
                                                <option value="au">Australia</option>
                                                <option value="at">Austria</option>
                                                <option value="az">Azerbaijan</option>
                                                <option value="bs">Bahamas</option>
                                                <option value="bh">Bahrain</option>
                                                <option value="bd">Bangladesh</option>
                                                <option value="bb">Barbados</option>
                                                <option value="by">Belarus</option>
                                                <option value="be">Belgium</option>
                                                <option value="bz">Belize</option>
                                                <option value="bj">Benin</option>
                                                <option value="bm">Bermuda</option>
                                                <option value="bt">Bhutan</option>
                                                <option value="bg">Bulgaria</option>
                                                <option value="bf">Burkina Faso</option>
                                                <option value="bi">Burundi</option>
                                                <option value="kh">Cambodia</option>
                                                <option value="cm">Cameroon</option>
                                                <option value="ca">Canada</option>
                                                <option value="cv">Cape Verde</option>
                                                <option value="ky">Cayman Islands</option>
                                                <option value="co">Colombia</option>
                                                <option value="km">Comoros</option>
                                                <option value="cg">Congo</option>
                                                <option value="ck">Cook Islands</option>
                                                <option value="cr">Costa Rica</option>
                                                <option value="ci">Côte d'Ivoire</option>
                                                <option value="hr">Croatia</option>
                                                <option value="cu">Cuba</option>
                                                <option value="cw">Curaçao</option>
                                                <option value="cy">Cyprus</option>
                                                <option value="cz">Czech Republic</option>
                                                <option value="dk">Denmark</option>
                                                <option value="dj">Djibouti</option>
                                                <option value="dm">Dominica</option>
                                                <option value="do">Dominican Republic</option>
                                                <option value="ec">Ecuador</option>
                                                <option value="eg">Egypt</option>
                                                <option value="gp">Guadeloupe</option>
                                                <option value="gu">Guam</option>
                                                <option value="gt">Guatemala</option>
                                                <option value="gg">Guernsey</option>
                                                <option value="gn">Guinea</option>
                                                <option value="gw">Guinea-Bissau</option>
                                                <option value="gy">Guyana</option>
                                                <option value="ht">Haiti</option>
                                                <option value="hn">Honduras</option>
                                                <option value="hk">Hong Kong</option>
                                                <option value="hu">Hungary</option>
                                                <option value="is">Iceland</option>
                                                <option value="in">India</option>
                                                <option value="id">Indonesia</option>
                                                <option value="no">Norway</option>
                                                <option value="om">Oman</option>
                                                <option value="pk">Pakistan</option>
                                                <option value="pw">Palau</option>
                                                <option value="pa">Panama</option>
                                                <option value="pg">Papua New Guinea</option>
                                                <option value="py">Paraguay</option>
                                                <option value="pe">Peru</option>
                                                <option value="ph">Philippines</option>
                                                <option value="pn">Pitcairn</option>
                                                <option value="pl">Poland</option>
                                                <option value="pt">Portugal</option>
                                                <option value="pr">Puerto Rico</option>
                                                <option value="qa">Qatar</option>
                                                <option value="re">Réunion</option>
                                                <option value="ro">Romania</option>
                                                <option value="ru">Russian Federation</option>
                                                <option value="rw">Rwanda</option>
                                                <option value="sz">Swaziland</option>
                                                <option value="se">Sweden</option>
                                                <option value="ch">Switzerland</option> 
                                                <option value="sn">Senegal</option>
                                                <option value="ma">Maroc</option>
                                                <option value="tr">Turkey</option>
                                                <option value="tm">Turkmenistan</option>
                                                <option value="tv">Tuvalu</option>
                                                <option value="ug">Uganda</option>
                                                <option value="ua">Ukraine</option>
                                                <option value="gb">United Kingdom</option>
                                                <option value="us" >United States</option>
                                                <option value="uy">Uruguay</option>
                                                <option value="uz">Uzbekistan</option>
                                                <option value="ye">Yemen</option>
                                                <option value="zm">Zambia</option>
                                                <option value="zw">Zimbabwe</option>
                                            </select>
                                        </div>

                                    
                        <input type="hidden" name="latitude" required/>
                        <input type="hidden" name="longitude" required/>
                    

                    <div class="alert alert-danger alert-inscription-danger" role="alert">   </div>

                    <div class="alert alert-success alert-inscription-success" role="alert">   </div>
                </form>
                
                <!-- Button -->
                <button class="margin-top-10 button full-width button-sliding-icon ripple-effect" type="submit" form="register-account-form-1">Je m'inscris<i class="icon-material-outline-arrow-right-alt"></i></button>

            </div>

                        
            
            
            
            
            
            
            
            
            
            <!-- Register -->
                        <div class="popup-tab-content" id="register2">
                
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <h3>Créons votre compte!</h3>
                </div>

                       <!-- Form -->
              <form method="post" id="register-account-form">

                <!-- Account Type -->
                <div class="account-type">
                    <div>
                        <input type="radio" name="type" id="freelancer-radio" class="account-type-radio" value="utilisateur" checked/>
                        <label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Utilisateur</label>
                    </div>

                    <div>
                        <input type="radio" name="type" id="employer-radio" class="account-type-radio" value="entreprise" disabled />
                        <label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Entreprise</label>
                    </div>
                </div>
                    
                
                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-user"></i>
                        <input type="text" class="input-text with-border" name="nom" id="emailaddress-register" placeholder="NOM" required/>
                    </div>
                    <div class="input-with-icon-left">
                    <i class="fa-regular fa-user"></i>
                        <input type="text" class="input-text with-border" name="prenom" id="emailaddress-register" placeholder="PRENOM" required/>
                    </div>
                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-phone"></i>
                        <input type="text" class="input-text with-border" name="telephone" id="emailaddress-register" placeholder="TELEPHONE" required/>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="text" class="input-text with-border" name="email" id="emailaddress-register" placeholder="EMAIL" required/>
                    </div>
                    
                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-user-plus"></i>
                        <input type="text" class="input-text with-border" name="pseudo" id="emailaddress-register" placeholder="PSEUDO" required/>
                    </div>
                    <div class="input-with-icon-left" data-tippy-placement="bottom">
                        <i class="icon-material-outline-lock"></i>
                        <input type="password" class="input-text with-border" name="mot_de_passe" id="password-register" placeholder="MOT DE PASSE" required/>
                    </div>

                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-image"></i>
                        <input type="file" class="input-text with-border" name="photo" id="password-repeat-register" required/>
                    </div>

                    <div class="submit-field">
                
                                            <select data-size="7"  data-live-search="true" name="pays">
                                            
                                                <option value="" selected>Pays</option>
                                                <option value="ar">Argentina</option>
                                                <option value="am">Armenia</option>
                                                <option value="aw">Aruba</option>
                                                <option value="au">Australia</option>
                                                <option value="at">Austria</option>
                                                <option value="az">Azerbaijan</option>
                                                <option value="bs">Bahamas</option>
                                                <option value="bh">Bahrain</option>
                                                <option value="bd">Bangladesh</option>
                                                <option value="bb">Barbados</option>
                                                <option value="by">Belarus</option>
                                                <option value="be">Belgium</option>
                                                <option value="bz">Belize</option>
                                                <option value="bj">Benin</option>
                                                <option value="bm">Bermuda</option>
                                                <option value="bt">Bhutan</option>
                                                <option value="bg">Bulgaria</option>
                                                <option value="bf">Burkina Faso</option>
                                                <option value="bi">Burundi</option>
                                                <option value="kh">Cambodia</option>
                                                <option value="cm">Cameroon</option>
                                                <option value="ca">Canada</option>
                                                <option value="cv">Cape Verde</option>
                                                <option value="ky">Cayman Islands</option>
                                                <option value="co">Colombia</option>
                                                <option value="km">Comoros</option>
                                                <option value="cg">Congo</option>
                                                <option value="ck">Cook Islands</option>
                                                <option value="cr">Costa Rica</option>
                                                <option value="ci">Côte d'Ivoire</option>
                                                <option value="hr">Croatia</option>
                                                <option value="cu">Cuba</option>
                                                <option value="cw">Curaçao</option>
                                                <option value="cy">Cyprus</option>
                                                <option value="cz">Czech Republic</option>
                                                <option value="dk">Denmark</option>
                                                <option value="dj">Djibouti</option>
                                                <option value="dm">Dominica</option>
                                                <option value="do">Dominican Republic</option>
                                                <option value="ec">Ecuador</option>
                                                <option value="eg">Egypt</option>
                                                <option value="gp">Guadeloupe</option>
                                                <option value="gu">Guam</option>
                                                <option value="gt">Guatemala</option>
                                                <option value="gg">Guernsey</option>
                                                <option value="gn">Guinea</option>
                                                <option value="gw">Guinea-Bissau</option>
                                                <option value="gy">Guyana</option>
                                                <option value="ht">Haiti</option>
                                                <option value="hn">Honduras</option>
                                                <option value="hk">Hong Kong</option>
                                                <option value="hu">Hungary</option>
                                                <option value="is">Iceland</option>
                                                <option value="in">India</option>
                                                <option value="id">Indonesia</option>
                                                <option value="no">Norway</option>
                                                <option value="om">Oman</option>
                                                <option value="pk">Pakistan</option>
                                                <option value="pw">Palau</option>
                                                <option value="pa">Panama</option>
                                                <option value="pg">Papua New Guinea</option>
                                                <option value="py">Paraguay</option>
                                                <option value="pe">Peru</option>
                                                <option value="ph">Philippines</option>
                                                <option value="pn">Pitcairn</option>
                                                <option value="pl">Poland</option>
                                                <option value="pt">Portugal</option>
                                                <option value="pr">Puerto Rico</option>
                                                <option value="qa">Qatar</option>
                                                <option value="re">Réunion</option>
                                                <option value="ro">Romania</option>
                                                <option value="ru">Russian Federation</option>
                                                <option value="rw">Rwanda</option>
                                                <option value="sz">Swaziland</option>
                                                <option value="se">Sweden</option>
                                                <option value="ch">Switzerland</option>
                                                <option value="sn">Senegal</option>
                                                <option value="ma">Maroc</option>
                                                <option value="tr">Turkey</option>
                                                <option value="tm">Turkmenistan</option>
                                                <option value="tv">Tuvalu</option>
                                                <option value="ug">Uganda</option>
                                                <option value="ua">Ukraine</option>
                                                <option value="gb">United Kingdom</option>
                                                <option value="us" >United States</option>
                                                <option value="uy">Uruguay</option>
                                                <option value="uz">Uzbekistan</option>
                                                <option value="ye">Yemen</option>
                                                <option value="zm">Zambia</option>
                                                <option value="zw">Zimbabwe</option>
                                            </select>
                                        </div>

                    <div class="alert alert-danger alert-inscription-danger" role="alert">   </div>

                    <div class="alert alert-success alert-inscription-success" role="alert">   </div>
                </form>
                
                <!-- Button -->
                <button class="margin-top-10 button full-width button-sliding-icon ripple-effect" type="submit" form="register-account-form">Je m'inscris<i class="icon-material-outline-arrow-right-alt"></i></button>

            </div>

        </div>
    </div>
</div>



<script>
    function showPosition(position){
        document.querySelector('#register-account-form-1 input[name = "latitude"]').value = position.coords.latitude;
        document.querySelector('#register-account-form-1 input[name = "longitude"]').value = position.coords.longitude;
    }
    function showError(error){
        switch(error.code){
            case error.PERMISSION_DENIED:
                alert("ACTIVEZ LA PERMISSION DE VOTRE LOCALISATION");
                break;
        }
    }
    function getLocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
    }
    window.onload=getLocation();
</script>

<!-- Sign In Popup / End -->

<!-- Scripts
================================================== -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.0.min.js"></script>
<script src="js/mmenu.min.js"></script>
<script src="js/tippy.all.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src="js/bootstrap-slider.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/snackbar.js"></script>
<script src="js/clipboard.min.js"></script>
<script src="js/counterup.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
    Snackbar.show({
        text: 'Your status has been changed!',
        pos: 'bottom-center',
        showAction: false,
        actionText: "Dismiss",
        duration: 3000,
        textColor: '#fff',
        backgroundColor: '#383838'
    }); 
}); 
</script>

<!-- Google Autocomplete -->
<script>
    function initAutocomplete() {
         var options = {
          types: ['(cities)'],
          // componentRestrictions: {country: "us"}
         };

         var input = document.getElementById('autocomplete-input');
         var autocomplete = new google.maps.places.Autocomplete(input, options);
    }

    // Autocomplete adjustment for homepage
    if ($('.intro-banner-search-form')[0]) {
        setTimeout(function(){ 
            $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
        }, 300);
    }

</script>

<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&libraries=places&callback=initAutocomplete"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script> 
$(".alert-inscription-danger").hide();
$(".alert-inscription-success").hide();
$(".alert-warning").hide();
</script>
<script src="ajax.js"></script>
</body>
</html>
