<?php
require('BaseDeDonnees.php');

session_start();

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
							<li><a href="mescandidatures.php"><i class="icon-material-outline-business-center"></i>Mes Candidatures</a></li>
						</ul>
						<!-- <i class="icon-material-outline-business-center"></i> -->
						<ul data-submenu-title="Mon Profil">
                            <?php if($_SESSION['verifie']=="NON"){ ?>
							<li class="active"><a href="#"><i class="icon-material-outline-assignment"></i>Completer Mon Profil</a></li>
                            <?php } else{ ?>
                            <li class="active"><a href="#"><i class="icon-material-outline-assignment"></i>Modifier Mon Profil</a></li>
                            <?php } ?>
                            <li><a href="mesdomaines.php"><i class="icon-material-outline-language"></i>Mes domaines</a></li>
                            <li><a href="mesformations.php"><i class="icon-material-outline-school"></i>Mes Formations</a></li>
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


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
                <?php if($_SESSION['verifie']=="NON"){ ?>
				<h3>Completer Mon Profil</h3>
                <?php }else { ?>
                <h3>Modifier Mon Profil</h3>
                <?php } ?>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="home.php">Home</a></li>
						<li><a href="dashboardU.php">Dashboard</a></li>
                        <?php if($_SESSION['verifie']=="NON"){ ?>
				        <li>Completer Mon Profil</li>
                        <?php }else { ?>
                        <li>Modifier Mon Profil</li>
                        <?php } ?>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<form method="post" id="completermonprofil">

				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
                        <?php if($_SESSION['verifie']=="NON"){ ?>
							<h3><i class="icon-material-outline-account-circle"></i>Completer Mon Profil</h3>
                            <?php }else { ?>
                            <h3><i class="icon-material-outline-account-circle"></i>Modifier Mon Profil</h3>
                            <?php } ?>
						</div>



                                    <div class="content">
							<ul class="fields-ul">
							<li>
								<div class="row">
									<div class="col-xl-12">
										<div class="submit-field">
											<div class="bidding-widget">
												<!-- Headline -->
												<span class="bidding-detail"> <strong>PRETENTION SALARIALE</strong></span>

												<!-- Slider -->
												<div class="bidding-value margin-bottom-10">MAD  <span id="biddingVal"></span></div>
												
                                                <input class="bidding-slider"  name="pretention" type="text"  data-slider-handle="custom" data-slider-currency="MAD" data-slider-min="0" data-slider-max="200000" data-slider-value="<?=$_SESSION['pretention_salarial']?>" data-slider-step="1" data-slider-tooltip="hide" />
												
											</div>
										</div>
									</div>

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>PRESENTEZ-VOUS !</h5>

                                            <div class="col-xl-12">
											<div class="submit-field">
                                                <textarea class="with-border" name="presentation" cols="20" rows="5" required><?=$_SESSION['presentation'] ?></textarea>
											</div>
									
												<div class="clearfix"></div>
											</div>
										</div>
									</div>

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>DOCUMENT</h5>

											<!-- Upload Button -->
											<div class="uploadButton margin-top-0">
                                                <?php if($_SESSION['verifie']=="NON"){ ?>
												<input class="uploadButton-input" type="file"  id="upload" name="fichier" required/>
												<label class="uploadButton-button ripple-effect" for="upload">Insérer CV</label>
                                                <?php } else{ ?>
                                                <input class="uploadButton-input" type="file"  id="upload" name="fichier"/>
												<label class="uploadButton-button ripple-effect" for="upload">Modifier CV</label>
                                                <?php } ?>
												
												<span>Taille Maximum du fichier: 10 MB---</span>
                                                <span class="uploadButton-file-name"></span>
											</div>

										</div>
									</div>
								</div>
							</li>

                            </ul>

									</div>
                                    
								</div>
					


				
				
				<!-- Button -->
				<div class="col-xl-12">
				<button class="button ripple-effect big margin-top-10" type="submit" form="completermonprofil">ENREGISTRER</button>	
				</div>
				<div class="notification error closeable " > </div>

				<div class="notification success closeable"> <p>INFORMATION ENREGISTRER AVEC SUCCES</p></div>
			</form>


				
			</div>
			<!-- Row / End -->

<?php include("footer2.php"); ?>

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

<script>

$(".error").hide();
$(".success").hide();
$("#msg_pass").hide();
</script>

<script src="parametreU.js"></script>


<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initAutocomplete"></script>


</body>
</html>