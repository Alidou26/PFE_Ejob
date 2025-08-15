<?php
require('BaseDeDonnees.php');

session_start();

include('rechercheProfilAction.php');

?>

<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>E-job</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/blue.css">

</head>
<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

<?php include('navbar.php') ?>


<!-- Dashboard Container -->
<div class="dashboard-container">

	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Start">
							<li><a href="dashboardE.php"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							<li><a href="messages.php"><i class="icon-material-outline-question-answer"></i> Messages</a></li>
							<li><a href="mesoffres.php"><i class="icon-material-outline-business-center"></i>Mes Offres</a></li>
                            <li><a href="poster.php"><i class="icon-material-outline-add"></i>Poster une Annonce</a></li>
						</ul>

                        <ul data-submenu-title="EJob">
                            <li class="active"><a href="#"><i class="icon-line-awesome-users"></i>Rechercher des Profils</a></li>
							<li><a href="#small-dialog" class="popup-with-zoom-anim"><i class="icon-line-awesome-commenting-o"></i>Ajouter un Avis sur EJob</a></li>
						</ul>

						<ul data-submenu-title="Mon Compte">
							<li><a href="parametreE.php"><i class="icon-material-outline-settings"></i>Paramètre</a></li>
							<li><a href="deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i>Déconnexion</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Rechercher des profils</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="dashboardE.php">Dashboard</a></li>
						<li>Recherche de Profil</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-find-in-page"></i>Recherche</h3>
						</div>


					<form method="GET" action="rechercheProfil.php" id="rechercheProfil">

                   <div class="content with-padding padding-bottom-10">
	               <div class="row">

		<div class="col-xl-10">
			<div class="submit-field">
				<h5>Catégorie</h5>
				<select class="selectpicker with-border" data-size="7" title="Catégorie" name="categorie" required>
					<option value="competence">Compétence</option>
                    <option value="experience">Expérience</option>
                    <option value="formation">Formation</option>
                    <option value="ecole">Ecole</option>
				</select>
			</div>
		</div>

		<div class="col-xl-10">
			<div class="submit-field">
				<h5>Mot de Recherche</h5>
				<input type="text" name="recherche" required>
			</div>
		</div>

	</div>
</div>
</div>
</div>

</form>



<div class="col-xl-12">
<button class="button ripple-effect big margin-top-30" type="submit" form="rechercheProfil">Rechercher</button>
</div>

				
			</div>
			<!-- Row / End -->

            <?php if(isset($_GET['categorie']) && isset($_GET['recherche'])){ ?>

            <!-- Row -->
			<div class="row">

<!-- Dashboard Box -->
<div class="col-xl-12" style="margin-top:3rem;">
    <div class="dashboard-box margin-top-0">

        <div class="content">
            <ul class="dashboard-box-list">

            <?php foreach($resultats as $utilisateur){ ?>

                <li>
                    <!-- Overview -->
                    <div class="freelancer-overview manage-candidates">
                        <div class="freelancer-overview-inner">

                            <!-- Avatar -->
                            <div class="freelancer-avatar">
                                <a href="profilU.php?id_utilisateur=<?=$utilisateur['id_utilisateur'] ?>"><img src="<?=$utilisateur['photo'] ?>" alt=""></a>
                            </div>

                            <!-- Name -->
                            <div class="freelancer-name">
                                <h4><a href="profilU.php?id_utilisateur=<?=$utilisateur['id_utilisateur'] ?>"><?=$utilisateur['nom'].' '.$utilisateur['prenom'] ?> <img class="flag" src="images/flags/<?=$utilisateur['pays'] ?>.svg" alt="" data-tippy-placement="top"></a></h4>

                                <!-- Details -->
                                <span class="freelancer-detail-item"><a href="profilU.php?id_utilisateur=<?=$utilisateur['id_utilisateur'] ?>"><i class="icon-feather-mail"></i><?=$utilisateur['email'] ?></a></span>
                                <span class="freelancer-detail-item"><i class="icon-feather-phone"></i> <?=$utilisateur['telephone'] ?></span>

                                <!-- Buttons -->
                                <div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
                                    <a href="<?=$utilisateur['cv']?>" class="button ripple-effect"><i class="icon-feather-file-text"></i> Télécharger CV</a>
                                    <a href="vchat/message.php?pseudo=<?=$utilisateur['pseudo']?>" class="button dark ripple-effect"><i class="icon-feather-mail"></i>Envoyer un Message</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <?php } ?>

            </ul>
        </div>
    </div>
</div>

</div>
<!-- Row / End -->

<?php } ?>

             <?php include('footer2.php') ?>

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->


<?php include('PopUpAvisEjob.php');  ?>


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


<script src="parametreE.js"></script>


<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initAutocomplete"></script>


</body>
</html>