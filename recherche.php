<?php
require('BaseDeDonnees.php');

session_start();

include('affichageIndex.php');

include('rechercheAction.php');


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
<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

<?php include('navbar.php') ?>

<!-- Spacer -->
<div class="margin-top-90"></div>
<!-- Spacer / End-->

<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		
		<div class="col-xl-11 col-lg-8 content-left-offset">

			<h3 class="page-title">Resultats</h3>

			
			<!-- Tasks Container -->
			<div class="tasks-list-container tasks-grid-layout margin-top-35">

            <?php foreach($resultats as $resultat){ ?>
				
				<!-- Task -->
				<a href="annonces.php?id_annonce=<?=$resultat['id_annonce'] ?>" class="task-listing">

					<!-- Job Listing Details -->
					<div class="task-listing-details">

						<!-- Details -->
						<div class="task-listing-description">
							<h3 class="task-listing-title"><?=$resultat['titre'] ?></h3>
							<ul class="task-icons">
                                <?php $re=$bd->query("SELECT * FROM `localisations` where `id_localisation`={$resultat['id_localisation']} ");
                                $ville=$re->fetch();
                                ?>
								<li><i class="icon-material-outline-location-on"></i><?= $ville['nom_localisation'] ?></li>
								<li><i class="icon-material-outline-access-time"></i><?=$resultat['date_annonce'] ?></li>
							</ul>
						</div>

					</div>

					<div class="task-listing-bid">
						<div class="task-listing-bid-inner">
							<div class="task-offers">
								<strong><?=$resultat['salaire'] ?> MAD</strong>
							</div>
						</div>
					</div>
				</a>

                <?php } ?>

			</div>
			<!-- Tasks Container / End -->

		</div>
	</div>
</div>


<?php include('footer.php') ?>


</body>
</html>