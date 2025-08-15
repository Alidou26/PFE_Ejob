<?php
require('BaseDeDonnees.php');

session_start();

if(!isset($_GET['id_utilisateur'])){
    header('location: index.php');
}
else{
    include('afficheProfilAction.php');
}



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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/blue.css">

</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

<?php include('navbar.php') ?>



<!-- Titlebar
================================================== -->
<div class="single-page-header freelancer-header" data-background-image="<?=$utilisateur['photo'] ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image freelancer-avatar"><img src="<?=$utilisateur['photo'] ?>" alt=""></div>
						<div class="header-details">
							<h3><?=$utilisateur['nom'].'  '.$utilisateur['prenom'] ?><span><?=$utilisateur['email'] ?> / <?=$utilisateur['telephone'] ?></span></h3>
							<ul>
								<li><img class="flag" src="images/flags/<?=$utilisateur['pays'] ?>.svg" alt=""> <?=strtoupper($utilisateur['pays']) ?></li>
                                <?php if($utilisateur['verifie']=='OUI'){ ?>
								<li><div class="verified-badge-with-title">Verifié</div></li>
                                <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		
		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">
			
			<!-- Page Content -->
			<div class="single-page-section">
				<h3 class="margin-bottom-25">A Propos de <?=$utilisateur['nom'].'  '.$utilisateur['prenom'] ?></h3>
				<p><?=$utilisateur['presentation'] ?></p>
			</div>

			
			<!-- Boxed List -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-school"></i> FORMATIONS</h3>
				</div>
				<ul class="boxed-list-ul">
                    <?php foreach($formations as $formation){ ?>

					<li>
						<div class="boxed-list-item">
							<!-- Avatar -->
							<div class="item-image">
								<img src="<?= $formation['photo_ecole'] ?>" alt="">
							</div>
							
							<!-- Content -->
							<div class="item-content">
								<h4><?= $formation['filiere'] ?></h4>
								<div class="item-details margin-top-7">
									<div class="detail-item"><a href=""><i class="icon-material-outline-school"></i><?= $formation['nom_ecole'] ?></a></div>
									<div class="detail-item"><i class="icon-material-outline-date-range"></i> <?= $formation['date_debut'] ?> - <?= $formation['date_fin'] ?></div>
								</div>
							</div>
						</div>
					</li>

                    <?php } ?>
					
				</ul>
			</div>
			<!-- Boxed List / End -->

            <!-- Boxed List -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-business"></i> Expériences </h3>
				</div>
				<ul class="boxed-list-ul">

                    <?php foreach($experiences as $experience){ ?>

					<li>
						<div class="boxed-list-item">
							<!-- Avatar -->
							<div class="item-image">
								<img src="<?= $experience['photo_organisme'] ?>" alt="">
							</div>
							
							<!-- Content -->
							<div class="item-content">
								<h4><?= $experience['poste'] ?></h4>
								<div class="item-details margin-top-7">
									<div class="detail-item"><a href=""><i class="icon-material-outline-business"></i><?= $experience['nom_organisme'] ?></a></div>
									<div class="detail-item"><i class="icon-material-outline-date-range"></i> <?= $experience['date_debut'] ?> A <?= $experience['date_fin'] ?></div>
								</div>
								<div class="item-description">
									<p><?= $experience['tache'] ?></p>
								</div>
							</div>
						</div>
					</li>

                    <?php } ?>

				</ul>
			</div>
			<!-- Boxed List / End -->

		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">
				
				<!-- Profile Overview -->
				<div class="profile-overview">
					<div class="overview-item"><strong>MAD <?= $utilisateur['pretention_salarial'] ?></strong><span>Prétention Salarial</span></div>
				</div>

				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>Compétences</h3>
					<div class="task-tags">
                        <?php foreach($competences as $competence){ ?>
						<span><?= $competence['nom_competence'] ?></span>
                        <?php } ?>

					</div>
				</div>

				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>documents</h3>
					<div class="attachments-container">
                        <?php if($utilisateur['verifie']=="OUI"){ ?>
						<a href="<?= $utilisateur['cv'] ?>" class="attachment-box ripple-effect"><span>CV</span><i>PDF</i></a>
                        <?php } ?>
					</div>
				</div>

				<!-- Sidebar Widget -->
				<div class="sidebar-widget">

					<!-- Copy URL -->
					<div class="copy-url">
						<input id="copy-url" type="text" value="" class="with-border">
						<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Partager le profil" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->

<?php include('footer.php') ?>


<script>

// Snackbar for copy to clipboard button
$('.copy-url-button').click(function() { 
	Snackbar.show({
		text: 'Lien Copié!',
	}); 
}); 
</script>

</body>
</html>