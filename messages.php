<?php
require('BaseDeDonnees.php');

session_start();




?>

<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>Ejob</title>
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

<?php include('navbar.php'); ?>


<?php if(isset($_SESSION['utilisateur_connecte'])){ ?>


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
							<li><a href="dashboardU.php"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							<li class="active"><a href="#"><i class="icon-material-outline-question-answer"></i> Messages</a></li>
							<li><a href="mescandidatures.php"><i class="icon-material-outline-business-center"></i>Mes Candidatures</a></li>
						</ul>
						<!-- <i class="icon-material-outline-business-center"></i> -->
						<ul data-submenu-title="Mon Profil">
                            <?php if($_SESSION['verifie']=="NON"){ ?>
							<li><a href="CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Completer Mon Profil</a></li>
                            <?php } else{ ?>
                            <li><a href="CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Modifier Mon Profil</a></li>
                            <?php } ?>
                            <li><a href="mesdomaines.php"><i class="icon-material-outline-language"></i>Mes domaines</a></li>
                            <li><a href="mesexperiences.php"><i class="icon-material-outline-school"></i>Mes Formations</a></li>
                            <li><a href="mesexperiences.php"><i class="icon-material-outline-reorder"></i>Mes Expériences</a></li>
                            <li><a href="generercv.php"><i class="icon-material-outline-speaker-notes"></i>Générer CV</a></li>

						</ul>

						<ul data-submenu-title="EJob">
							<li><a href="#small-dialog" class="popup-with-zoom-anim"><i class="icon-line-awesome-commenting-o"></i>Ajouter un Avis sur EJob</a></li>
						</ul>

						<ul data-submenu-title="Mon Compte">
							<li><a href="parametreU.php"><i class="icon-material-outline-settings"></i>Paramètre</a></li>
							<li><a href="deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i>Déconnexion</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->

    <?php } else{ ?>



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
							<li class="active"><a href="#"><i class="icon-material-outline-question-answer"></i> Messages</a></li>
							<li><a href="mesoffres.php"><i class="icon-material-outline-business-center"></i>Mes Offres</a></li>
                            <li><a href="poster.php"><i class="icon-material-outline-add"></i>Poster une Annonce</a></li>
						</ul>

                        <ul data-submenu-title="EJob">
						<li ><a href="rechercheProfil.php"><i class="icon-line-awesome-users"></i>Rechercher des Profils</a></li>
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



    <?php } ?>


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Messages</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Messages</li>
					</ul>
				</nav>
			</div>
	
				<div class="messages-container margin-top-0" style="width:39%;margin:auto;">

					<div class="messages-container-inner">

						<!-- Messages -->
						<div class="messages-inbox" >
							<div class="messages-headline">
								<div class="input-with-icon">
										<input id="autocomplete-input" type="text" placeholder="Message" disabled>
									<i class="icon-brand-rocketchat"></i>
								</div>
							</div>

							<ul >
                          <?php  include("afficheMessageRecu.php");  ?>

							</ul>
						</div>
						<!-- Messages / End -->

                        </div>
					</div>
			</div>
			<!-- Messages Container / End -->



			
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



</body>
</html>