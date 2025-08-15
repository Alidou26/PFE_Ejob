<?php
require('BaseDeDonnees.php');

session_start();

if(!isset($_GET['id_entreprise'])){
    header('location: index.php');
}
else{
    include('afficheProfilEAction.php');
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
<div class="single-page-header" data-background-image="<?=$entreprise['photo_e']?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image"><img src="<?=$entreprise['photo_e'] ?>" alt=""></div>
						<div class="header-details">
							<h3><?=$entreprise['sigle_e'] ?><span><?=$entreprise['nom_e'] ?></span></h3>
							<ul>
                                <?php if(!empty($moyenne['moyenne'])){ ?>
								<li><div class="star-rating" data-rating="<?=$moyenne['moyenne'] ?>"></div></li>
                                <?php } else{ ?>
                                    <li><div class="star-rating" data-rating="0"></div></li>
                                    <?php } ?>
								<li><img class="flag" src="images/flags/<?=$entreprise['pays_e'] ?>.svg" alt=""><?= strtoupper($entreprise['pays_e']) ?></li>
							</ul>
						</div>
					</div>
					<div class="right-side">
						<!-- Breadcrumbs -->
						<nav id="breadcrumbs" class="white">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="#">Entreprise</a></li>
								<li><?=$entreprise['sigle_e'] ?></li>
							</ul>
						</nav>
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

			<div class="single-page-section">
				<h3 class="margin-bottom-25">A Propos de  <?=$entreprise['nom_e'] ?></h3>
				<p><?=$entreprise['description_e'] ?></p>
                <p>Date de création: <?=$entreprise['date_de_creation'] ?></p>
                <p>Nombre d'employe: <?=$entreprise['nombre_employe'] ?></p>
                <p>Email: <?=$entreprise['email_e'] ?></p>
                <p>Téléphone: <?=$entreprise['telephone_e'] ?></p>
			</div>
			
			<!-- Boxed List -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-business-center"></i> Annonces </h3>
				</div>

				<div class="listings-container compact-list-layout">

                <?php foreach($annonces as $annonce){  ?>
					
					<!-- Job Listing -->
					<a href="annonces.php?id_annonce=<?=$annonce['id_annonce'] ?>" class="job-listing">

						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title"><?=$annonce['titre'] ?></h3>

								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-location-on"></i><?=$annonce['nom_localisation'] ?></li>
										<li><i class="icon-material-outline-business-center"></i><?=$annonce['type'] ?></li>
										<li><i class="icon-material-outline-access-time"></i><?=$annonce['date_fin'] ?></li>
									</ul>
								</div>
							</div>
						</div>
					</a>

                    <?php  } ?>

				</div>

			</div>
			<!-- Boxed List / End -->

			<!-- Boxed List -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-thumb-up"></i>Avis sur <?=$entreprise['nom_e'] ?></h3>
				</div>
				<ul class="boxed-list-ul">

                <?php foreach($commentaires as $commentaire){ ?>

					<li>
						<div class="boxed-list-item">
							<!-- Content -->
							<div class="item-content">
								<a href="profilU.php?id_utilisateur=<?=$commentaire['id_utilisateur']?>"><h4><?= $commentaire['nom'].' '.$commentaire['prenom'] ?><span><?=$commentaire['pseudo'] ?></span></h4></a>
								<div class="item-details margin-top-10">
									<div class="star-rating" data-rating="<?=$commentaire['note'] ?>"></div>
									<div class="detail-item"><i class="icon-material-outline-date-range"></i><?=$commentaire['date_ajout'] ?></div>
								</div>
								<div class="item-description">
									<p><?=$commentaire['avis'] ?></p>
								</div>
							</div>
						</div>
					</li>
                     
                    <?php } ?>

				</ul>
                  
                <?php if(isset($_SESSION['utilisateur_connecte'])){ ?>
				<div class="centered-button margin-top-35">
					<a href="#small-dialog" class="popup-with-zoom-anim button button-sliding-icon">Ajouter un Avis sur <?=$entreprise['nom_e'] ?> <i class="icon-material-outline-arrow-right-alt"></i></a>
				</div>
                <?php } ?>

			</div>
			<!-- Boxed List / End -->

		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				<!-- Location -->
				<div class="sidebar-widget">
					<h3>Loalisation</h3>
					<div id="single-job-map-container">
                    <iframe src = "https://maps.google.com/maps?q=<?=$entreprise['latitude']?>,<?=$entreprise['longitude']?>&hl=es;z=14&amp;output=embed" style="width:100%;height:25rem;"></iframe>
					</div>
				</div>

				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					<!-- Copy URL -->
					<div class="copy-url">
						<input id="copy-url" type="text" value="" class="with-border">
						<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Partager" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
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


<!-- Leave a Review Popup
================================================== -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#tab">Ajouter un Avis</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Que Pensez-vous de <?=$entreprise['nom_e'] ?></h3>
					
				<!-- Form -->
				<form method="post" id="leave-company-review-form" action="ajoutAvisEntrepriseAction.php">

					<!-- Leave Rating -->
					<div class="clearfix"></div>
					<div class="leave-rating-container">
						<div class="leave-rating margin-bottom-5">
							<input type="radio" name="rating" id="rating-1" value="5" required>
							<label for="rating-1" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-2" value="4" required>
							<label for="rating-2" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-3" value="3" required>
							<label for="rating-3" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-4" value="2" required>
							<label for="rating-4" class="icon-material-outline-star"></label>
							<input type="radio" name="rating" id="rating-5" value="1" required>
							<label for="rating-5" class="icon-material-outline-star"></label>
						</div>
					</div>
					<div class="clearfix"></div>
					<!-- Leave Rating / End-->

				</div>

                    <input type="hidden" name="id_entreprise" value="<?=$_GET['id_entreprise']?>" required>
					<textarea class="with-border" placeholder="Avis" name="message" id="message" cols="7"  required></textarea>

				</form>
				
				<!-- Button -->
				<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit" form="leave-company-review-form">Ajouter<i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
<!-- Leave a Review Popup / End -->


<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>

// Snackbar for copy to clipboard button
$('.copy-url-button').click(function() { 
	Snackbar.show({
		text: 'Lien Copié!',
	}); 
}); 
</script>

<!-- Google API & Maps -->
<!-- Geting an API Key: https://developers.google.com/maps/documentation/javascript/get-api-key -->
<script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>
<script src="js/infobox.min.js"></script>
<script src="js/markerclusterer.js"></script>
<script src="js/maps.js"></script>

</body>
</html>