<?php
require('BaseDeDonnees.php');

session_start();

include('afficheExperiences.php');
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
						
						<ul data-submenu-title="Mon Profil">
                            <?php if($_SESSION['verifie']=="NON"){ ?>
							<li><a href="CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Completer Mon Profil</a></li>
                            <?php } else{ ?>
                            <li><a href="CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Modifier Mon Profil</a></li>
                            <?php } ?>
                            <li><a href="mesdomaines.php"><i class="icon-material-outline-language"></i>Mes domaines</a></li>
                            <li><a href="mesformations.php"><i class="icon-material-outline-school"></i>Mes Formations</a></li>
                            <li class="active"><a href="#"><i class="icon-material-outline-reorder"></i>Mes Expériences</a></li>
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
						<li>Mes Expériences</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

			<!-- Boxed List -->
			<div class="boxed-list dashboard-box">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-reorder"></i>Mes Expériences </h3>
				</div>
				<ul class="boxed-list-ul">

                <?php

                foreach($experiences as $experience){

                ?>
					<li>
						<div class="boxed-list-item">
							<!-- Avatar -->
							<div class="item-image">
								<img src="<?=$experience['photo_organisme'] ?>" alt="">
							</div>
							
							<!-- Content -->
							<div class="item-content">
								<h4><?=$experience['poste'] ?></h4>
								<div class="item-details margin-top-7">
									<div class="detail-item"><a href="#"><i class="icon-material-outline-business"></i><?=$experience['nom_organisme'] ?></a></div>
									<div class="detail-item"><i class="icon-material-outline-date-range"></i> <?=$experience['date_debut'] ?> - <?=$experience['date_fin'] ?></div>
								</div>
								<div class="item-description">
									<p><?=$experience['tache'] ?></p>
								</div>
							</div>
                            									<!-- Buttons -->
									<div>
									<a href="mesexperiences.php?id_experience=<?=$experience['id_experience'] ?>" class="button blue ripple-effect ico" title="Modifier" data-tippy-placement="left"><i class="icon-line-awesome-pencil-square-o"></i></a>
                                    <a href="supprimerexperience.php?id_experience=<?=$experience['id_experience'] ?>" class="button red ripple-effect ico" title="Supprimer" data-tippy-placement="left"><i class="icon-feather-trash-2"></i></a>
									</div>
						</div>
					</li>

                  <?php }  ?>
				
				</ul>
			</div>
			<!-- Boxed List / End -->

<?php if(!isset($_GET['id_experience'])) { ?>

                <div class="col-xl-12">
					<div class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-add-circle-outline"></i>Ajouter Expérience</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

                            <form id="AjouterExperience">

								<div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Ajouter une image">
										<img class="profile-pic" src="experience.png" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" type="file" name="photo" required>
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>NOM DE L'ORGANISME</h5>
												<input type="text" name="nom" class="with-border" required>
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>POSTE OCCUPE</h5>
												<input type="text" name="poste" class="with-border" required>
											</div>
										</div>
										
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>DATE DEBUT</h5>
                                                <input type="date" name="date_debut" class="with-border" required>
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>DATE FIN</h5>
                                                <input type="date" name="date_fin" class="with-border">
											</div>
										</div>

                                        <div class="col-xl-12">
											<div class="submit-field">
												<h5>TACHE EFFECTUEE</h5>
                                                <textarea name="tache" rows="4" required></textarea>
											</div>
										</div>

									</div>
                                    
								</div>
							</div>
						</div>
					</div>
				</div>


                				<!-- Button -->
				<div class="col-xl-12">
                <div class="notification error closeable " > </div>
                <div class="notification success closeable"> <p>INFORMATIONS ENREGISTREES AVEC SUCCES</p></div>
				<button class="button ripple-effect big margin-top-10" type="submit" form="AjouterExperience">ENREGISTRER</button>	
				</div>

<?php   }else{    
    
    $req=$bd->prepare("SELECT * FROM `experience` WHERE `id_experience` = ? ");
    $req->execute(array($_GET['id_experience']));
    $exp=$req->fetch();
    
    ?>


<div class="col-xl-12">
					<div class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-add-circle-outline"></i>Modifier Expérience</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

                            <form id="ModifierExperience">

								<div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Ajouter une image">
										<img class="profile-pic" src="<?= $exp['photo_organisme']?>" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" type="file" name="photo">
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>NOM DE L'ORGANISME</h5>
												<input type="text" name="nom" class="with-border" value="<?= $exp['nom_organisme']?>" required>
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>POSTE OCCUPE</h5>
												<input type="text" name="poste" class="with-border" value="<?= $exp['poste']?>" required>
											</div>
										</div>
										
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>DATE DEBUT</h5>
                                                <input type="date" name="date_debut" class="with-border" value="<?= $exp['date_debut']?>" required>
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>DATE FIN</h5>
                                                <?php if($exp['date_fin'] != "Présent") { ?>
                                                <input type="date" name="date_fin" class="with-border" value="<?= $exp['date_fin']?>">
                                                <?php } else{ ?>
                                                <input type="date" name="date_fin" class="with-border">
                                                <?php } ?>
											</div>
										</div>

                                        <div class="col-xl-12">
											<div class="submit-field">
												<h5>TACHE EFFECTUEE</h5>
                                                <textarea name="tache" rows="4" required><?= $exp['tache']?></textarea>
											</div>
										</div>

                                        <input type="hidden" name="id_experience" value="<?= $exp['id_experience']?>" required>

									</div>
                                    
								</div>
							</div>
						</div>
					</div>
				</div>


                				<!-- Button -->
				<div class="col-xl-12">
                <div class="notification error closeable " > </div>
                <div class="notification success closeable"> <p>INFORMATIONS ENREGISTREES AVEC SUCCES</p></div>
				<button class="button ripple-effect big margin-top-10" type="submit" form="ModifierExperience">MODIFIER</button>	



    <?php  } ?>

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

<script>

$(".error").hide();
$(".success").hide();
$("#msg_pass").hide();
</script>

<script src="experiences.js"></script>

</body>
</html>