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
							<li><a href="dashboardE.php"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							<li><a href="messages.php"><i class="icon-material-outline-question-answer"></i> Messages</a></li>
							<li><a href="mesoffres.php"><i class="icon-material-outline-business-center"></i>Mes Offres</a></li>
                            <li><a href="poster.php"><i class="icon-material-outline-add"></i>Poster une Annonce</a></li>
						</ul>

                        <ul data-submenu-title="EJob">
						<li ><a href="rechercheProfil.php"><i class="icon-line-awesome-users"></i>Rechercher des Profils</a></li>
							<li><a href="#small-dialog" class="popup-with-zoom-anim"><i class="icon-line-awesome-commenting-o"></i>Ajouter un Avis sur EJob</a></li>
						</ul>

						<ul data-submenu-title="Mon Compte">
							<li class="active"><a href="#"><i class="icon-material-outline-settings"></i>Paramètre</a></li>
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
				<h3>Paramètre</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="dashboardE.php">Dashboard</a></li>
						<li>Paramètre</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<form method="post" id="parametreRecruteur">

				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i>MON COMPTE</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

								<div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Changer Photo de profil">
										<img class="profile-pic" src="<?php echo $_SESSION['photo_e']?>" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" type="file" name="photo" >
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>NOM</h5>
												
												<input type="text" name="nom_e" class="with-border" value="<?php echo $_SESSION['nom_e']?>">
											</div>
										</div>
                                         
                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>SIGLE</h5>
												<input type="text" name="sigle_e" class="with-border"  value="<?php echo $_SESSION['sigle_e']?>">
											</div>
										</div>

										
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>PAYS</h5>
                                                <div class="submit-field">
				
                <select data-size="7" data-live-search="true" name="pays_e">
                
                    <option value="<?=$_SESSION['pays_e'] ?>" selected>Ancien Pays</option>
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
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>EMAIL</h5>
												<input type="text" name="email_e" class="with-border" value="<?php echo $_SESSION['email_e']?>">
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>TELEPHONE</h5>
												<input type="text" name="telephone_e" class="with-border" value="<?php echo $_SESSION['telephone_e']?>">
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>DATE DE CREATION</h5>
												<input type="date" name="date_de_creation" class="with-border" value="<?php echo $_SESSION['date_de_creation']?>">
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>NOMBRE D'EMPLOYES</h5>
												<input type="number" name="employe" class="with-border" value="<?php echo $_SESSION['nombre_employe']?>">
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>PSEUDO</h5>
												<input type="text" name="pseudo" class="with-border" value="<?php echo $_SESSION['pseudo']?>">
											</div>
										</div>

                                        <div class="col-xl-12">
											<div class="submit-field">
												<h5>DESCRIPTION</h5>
												<textarea name="description"  rows="4"><?php echo $_SESSION['description_e']?></textarea>
											</div>
										</div>

										<div class="col-xl-6">
											<!-- Account Type -->
											<div class="submit-field">
												<div class="account-type">
													<div>
													<input type="radio" value="Recruteur" id="freelancer-radio" class="account-type-radio" checked/>
														<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle" ></i>RECRUTEUR</label>
													</div>
												</div>
											</div>
										</div>

									</div>
                                    
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div id="test1" class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-lock"></i>SECURITE</h3>
						</div>

						<div class="content with-padding">
							<div class="row">
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>MOT DE PASSE ACTUEL</h5>
										<input type="password" name="pws_actuel" class="with-border">
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>NOUVEAU MOT DE PASSE</h5>
										<input type="password" name="pws1" class="with-border">
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>RETAPER LE MOT DE PASSE</h5>
										<input type="password"  name="pws2" class="with-border">
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Button -->
				<div class="col-xl-12">
				<button class="button ripple-effect big margin-top-10" type="submit" form="parametreRecruteur">ENREGISTRER</button>	
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

<script src="parametreE.js"></script>


<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initAutocomplete"></script>


</body>
</html>