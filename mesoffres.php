<?php
require('BaseDeDonnees.php');

session_start();

include('afficheMesOffres.php');

?>


<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>E-Job</title>
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
						<span class="trigger-title"></span>
					</a>
					
					<!-- Navigation -->
					<div class="dashboard-nav">
						<div class="dashboard-nav-inner">
	
							<ul data-submenu-title="Start">
								<li><a href="dashboardE.php"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
								<li><a href="messages.php"><i class="icon-material-outline-question-answer"></i> Messages</span></a></li>
								<li class="active"><a href="#"><i class="icon-material-outline-business-center"></i>Mes Offres</a></li>
								<li><a href="poster.php"><i class="icon-material-outline-add"></i>Poster une Annonce</a></li>
							</ul>
	
							<ul data-submenu-title="EJob">
							<li ><a href="rechercheProfil.php"><i class="icon-line-awesome-users"></i>Rechercher des Profils</a></li>
								<li><a href="#small-dialog" class="popup-with-zoom-anim"><i class="icon-line-awesome-commenting-o"></i>Ajouter un Avis sur EJob</a></li>
							</ul>
	
							<ul data-submenu-title="Mon Compte">
								<li><a href="parametreE.php"><i class="icon-material-outline-settings"></i>Paramètre</a></li>
								<li><a href="deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i>Deconnexion</a></li>
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
				<h3>Mes Offres</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Mes Offres</li>
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
							<h3><i class="icon-material-outline-business-center"></i> Ma Liste</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">

                            <?php foreach($offres as $offre){  ?>
								<li>
									<!-- Job Listing -->
									<div class="job-listing">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">

                                                <?php if($offre['date_fin'] >= Date('Y-m-d')){ ?>
												<h3 class="job-listing-title"><a href="offre.php?id_annonce=<?=$offre['id_annonce'] ?>"><?=$offre['titre'] ?></a> <span class="dashboard-status-button green">En Cours</span></h3>
                                                <?php } else { ?>
                                                    <h3 class="job-listing-title"><a href="offre.php?id_annonce=<?=$offre['id_annonce'] ?>"><?=$offre['titre'] ?></a> <span class="dashboard-status-button red">Expiré</span></h3>
                                                <?php } ?>
												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-date-range"></i> Posté le <?=$offre['date_annonce'] ?></li>
														<li><i class="icon-material-outline-date-range"></i> Expire le <?=$offre['date_fin'] ?></li>
													</ul>
												</div>
											</div>
										</div>
									</div>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="offre.php?id_annonce=<?=$offre['id_annonce'] ?>" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Gérer l'offre <span class="button-info"><?=nombreCandidature($offre['id_annonce']) ?></span></a>
										<a href="poster.php?id_annonce=<?=$offre['id_annonce'] ?>" class="button gray ripple-effect ico" title="Modifier" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
										<a href="supprimerOffre.php?id_annonce=<?=$offre['id_annonce'] ?>" class="button gray ripple-effect ico" title="Supprimer" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
									</div>
								</li>

                                <?php } ?>

							</ul>
						</div>
					</div>
				</div>

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

</body>
</html>