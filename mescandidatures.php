<?php
require('BaseDeDonnees.php');

session_start();

include("affichemescandidatures.php");


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
							<li><a href="dashboardU.php"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							<li><a href="messages.php"><i class="icon-material-outline-question-answer"></i> Messages</a></li>
							<li class="active"><a href="#"><i class="icon-material-outline-business-center"></i>Mes Candidatures</a></li>
						</ul>
						<ul data-submenu-title="Mon Profil">
                            <?php if($_SESSION['verifie']=="NON"){ ?>
							<li><a href="CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Completer Mon Profil</a></li>
                            <?php } else{ ?>
                            <li><a href="CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Modifier Mon Profil</a></li>
                            <?php } ?>
                            <li><a href="mesdomaines.php"><i class="icon-material-outline-language"></i>Mes domaines</a></li>
                            <li><a href="mesformations.php"><i class="icon-material-outline-school"></i>Mes Formations</a></li>
                            <li ><a href="mesexperiences.php"><i class="icon-material-outline-reorder"></i>Mes Expériences</a></li>
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


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Mes experiences</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="dashboardU.php">Dashboard</a></li>
						<li>Mes Candidatures</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

			<!-- Boxed List -->
			<div class="boxed-list dashboard-box">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-reorder"></i>Mes Candidatures </h3>
				</div>
				<ul class="boxed-list-ul">

                <?php

                foreach($candidatures as $candidature){

                ?>
					<li>
						<div class="boxed-list-item">
							<!-- Avatar -->
							<div class="item-image">
								<img src="<?=$candidature['photo_e'] ?>" alt="">
							</div>
							
							<!-- Content -->
							<div class="item-content">
								<h4><?=$candidature['titre'] ?></h4>
								<div class="item-details margin-top-7">
									<div class="detail-item"><a href="profilE.php?id_entreprise=<?=$candidature['id_entreprise'] ?>"><i class="icon-material-outline-business"></i><?=$candidature['sigle_e'] ?></a></div>
									<div class="detail-item"><i class="icon-material-outline-date-range"></i> <?=$candidature['date_annonce'] ?> - <?=$candidature['date_fin'] ?></div>
								</div>
								<div class="item-description">
									<p><?=$candidature['description'] ?></p>
								</div>
							</div>
                            									
						</div>
					</li>

                  <?php }  ?>
				
				</ul>
			</div>
			<!-- Boxed List / End -->


			</div>
			<!-- Row / End -->

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



<script src="experiences.js"></script>

</body>
</html>