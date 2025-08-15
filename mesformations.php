<?php
require('BaseDeDonnees.php');

session_start();

include('afficheFormations.php');
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
							<li><a href="mesavis.php"><i class="icon-material-outline-rate-review"></i>Mes Avis</a></li>
						</ul>
						<!-- <i class="icon-material-outline-business-center"></i> -->
						<ul data-submenu-title="Mon Profil">
                            <?php if($_SESSION['verifie']=="NON"){ ?>
							<li><a href="CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Completer Mon Profil</a></li>
                            <?php } else{ ?>
                            <li><a href="CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Modifier Mon Profil</a></li>
                            <?php } ?>
                            <li><a href="mesdomaines.php"><i class="icon-material-outline-language"></i>Mes domaines</a></li>
                            <li class="active"><a href="#"><i class="icon-material-outline-school"></i>Mes Formations</a></li>
                            <li><a href="mesexperiences.php"><i class="icon-material-outline-reorder"></i>Mes Expériences</a></li>
                            <li><a href="generercv.php"><i class="icon-material-outline-speaker-notes"></i>Générer CV</a></li>

						</ul>

                        <ul data-submenu-title="EJob">
							<li><a href="#small-dialog" class="popup-with-zoom-anim"><i class="icon-line-awesome-commenting-o"></i>Ajouter un Avis sur EJob</a></li>
                            <li><a href="sondage.php"><i class="icon-line-awesome-list-ul"></i>Sondage</a></li>
						</ul>

						<ul data-submenu-title="Mon Compte">
							<li><a href="parametreU.php"><i class="icon-material-outline-settings"></i>Paramètre</a></li>
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
				<h3>Mes Formations</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="dashboardU.php">Dashboard</a></li>
						<li>Mes Formations</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-school"></i>Mes Formations </h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">

                            <?php foreach($formations as $formation){ ?>

								<li>
									<!-- Overview -->
									<div class="freelancer-overview">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											<div class="freelancer-avatar">
												<a href="#"><img src="<?=$formation['photo_ecole'] ?>" alt="" style="height:5rem;width:7rem;"></a>
											</div>

											<!-- Name -->
											<div class="freelancer-name">
												<h4><a href="#"><?=$formation['nom_ecole'] ?> <img class="flag" src="images/flags/<?=$formation['lieu_formation'] ?>.svg" alt="" data-tippy-placement="top"></a></h4>
												<span><?=$formation['filiere'] ?></span>

												<div class="freelancer-rating">
                                                <span><?=$formation['date_debut']?>--<?= $formation['date_fin'] ?> </span>
												</div>
											</div>
										</div>
									</div>

									<!-- Buttons -->
									<div class="buttons-to-right">
									<a href="mesformations.php?id_formation=<?=$formation['id_formation'] ?>" class="button blue ripple-effect ico" title="Modifier" data-tippy-placement="left"><i class="icon-line-awesome-pencil-square-o"></i></a>
                                    <a href="supprimerformation.php?id_formation=<?=$formation['id_formation'] ?>" class="button red ripple-effect ico" title="Supprimer" data-tippy-placement="left"><i class="icon-feather-trash-2"></i></a>
									</div>
								</li>

                                <?php } ?>
								

							</ul>
						</div>
					</div>
				</div>

<?php if(!isset($_GET['id_formation'])) { ?>

                <div class="col-xl-12">
					<div class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-add-circle-outline"></i>Ajouter Formation</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

                            <form id="AjouterFormation">

								<div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Ajouter une image">
										<img class="profile-pic" src="formation.png" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" type="file" name="photo" required>
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>NOM DE L'ETABLISSEMENT</h5>
												
												<input type="text" name="nom" class="with-border" required>
											</div>
										</div>
										
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>PAYS DE FORMATION</h5>
                                                <div class="submit-field">
				
                                        <select data-size="7" data-live-search="true" name="pays">
                
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
												<h5>ANNEE DEBUT</h5>
												     <select name="anneeDebut">
          <option value="2030">2030</option>
          <option value="2029">2029</option>
          <option value="2028">2028</option>
          <option value="2027">2027</option>
          <option value="2026">2026</option>
          <option value="2025">2025</option>
          <option value="2024">2024</option>
          <option value="2023" selected>2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
          <option value="2009">2009</option>
          <option value="2008">2008</option>
          <option value="2007">2007</option>
          <option value="2006">2006</option>
          <option value="2005">2005</option>
          <option value="2004">2004</option>
          <option value="2003">2003</option>
          <option value="2002">2002</option>
          <option value="2001">2001</option>
          <option value="2000">2000</option>
          <option value="1999">1999</option>
          <option value="1998">1998</option>
          <option value="1997">1997</option>
          <option value="1996">1996</option>
          <option value="1995">1995</option>
          <option value="1994">1994</option>
          <option value="1993">1993</option>
          <option value="1992">1992</option>
          <option value="1991">1991</option>
          <option value="1990">1990</option>
          <option value="1989">1989</option>
          <option value="1988">1988</option>
          <option value="1987">1987</option>
          <option value="1986">1986</option>
          <option value="1985">1985</option>
          <option value="1984">1984</option>
          <option value="1983">1983</option>
          <option value="1982">1982</option>
          <option value="1981">1981</option>
          <option value="1980">1980</option>
          <option value="1979">1979</option>
          <option value="1978">1978</option>
          <option value="1977">1977</option>
          <option value="1976">1976</option>
          <option value="1975">1975</option>
          <option value="1974">1974</option>
          <option value="1973">1973</option>
          <option value="1972">1972</option>
          <option value="1971">1971</option>
          <option value="1970">1970</option>
          <option value="1969">1969</option>
          <option value="1968">1968</option>
          <option value="1967">1967</option>
          <option value="1966">1966</option>
          <option value="1965">1965</option>
          <option value="1964">1964</option>
          <option value="1963">1963</option>
          <option value="1962">1962</option>
          <option value="1961">1961</option>
          <option value="1960">1960</option>
     </select>
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>DATE FIN</h5>
                                                <select name="anneeFin">
          <option value="Présent" selected>Jusqu'à présent</option>                                         
          <option value="2030">2030</option>
          <option value="2029">2029</option>
          <option value="2028">2028</option>
          <option value="2027">2027</option>
          <option value="2026">2026</option>
          <option value="2025">2025</option>
          <option value="2024">2024</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
          <option value="2009">2009</option>
          <option value="2008">2008</option>
          <option value="2007">2007</option>
          <option value="2006">2006</option>
          <option value="2005">2005</option>
          <option value="2004">2004</option>
          <option value="2003">2003</option>
          <option value="2002">2002</option>
          <option value="2001">2001</option>
          <option value="2000">2000</option>
          <option value="1999">1999</option>
          <option value="1998">1998</option>
          <option value="1997">1997</option>
          <option value="1996">1996</option>
          <option value="1995">1995</option>
          <option value="1994">1994</option>
          <option value="1993">1993</option>
          <option value="1992">1992</option>
          <option value="1991">1991</option>
          <option value="1990">1990</option>
          <option value="1989">1989</option>
          <option value="1988">1988</option>
          <option value="1987">1987</option>
          <option value="1986">1986</option>
          <option value="1985">1985</option>
          <option value="1984">1984</option>
          <option value="1983">1983</option>
          <option value="1982">1982</option>
          <option value="1981">1981</option>
          <option value="1980">1980</option>
          <option value="1979">1979</option>
          <option value="1978">1978</option>
          <option value="1977">1977</option>
          <option value="1976">1976</option>
          <option value="1975">1975</option>
          <option value="1974">1974</option>
          <option value="1973">1973</option>
          <option value="1972">1972</option>
          <option value="1971">1971</option>
          <option value="1970">1970</option>
          <option value="1969">1969</option>
          <option value="1968">1968</option>
          <option value="1967">1967</option>
          <option value="1966">1966</option>
          <option value="1965">1965</option>
          <option value="1964">1964</option>
          <option value="1963">1963</option>
          <option value="1962">1962</option>
          <option value="1961">1961</option>
          <option value="1960">1960</option>
     </select>
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>FILIERE</h5>
												<input type="text" name="filiere" class="with-border" required>
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
				<button class="button ripple-effect big margin-top-10" type="submit" form="AjouterFormation">ENREGISTRER</button>	
				</div>

<?php   }else{    
    
    $req=$bd->prepare("SELECT * FROM `formations` WHERE `id_formation` = ? ");
    $req->execute(array($_GET['id_formation']));
    $form=$req->fetch();
    
    ?>


    <div class="col-xl-12">
					<div class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-add-circle-outline"></i>Modifier Formation</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

                            <form id="ModifFormation">

								<div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Ajouter une image">
										<img class="profile-pic" src="<?=$form['photo_ecole'] ?>" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" type="file" name="photo">
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>NOM DE L'ETABLISSEMENT</h5>
												
												<input type="text" name="nom" class="with-border" value="<?=$form['nom_ecole'] ?>" required>
											</div>
										</div>
										
										<div class="col-xl-6">
											<div class="submit-field">
												<h5>PAYS DE FORMATION</h5>
                                                <div class="submit-field">
				
                                        <select data-size="7" data-live-search="true" name="pays">

                                            <option value="<?=$form['lieu_formation'] ?>" selected>Ancien pays</option>
                
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
												<h5>ANNEE DEBUT</h5>
												     <select name="anneeDebut">
                                                     
                                                     <option value="<?=$form['date_debut'] ?>" selected><?=$form['date_debut'] ?></option>
          <option value="2030">2030</option>
          <option value="2029">2029</option>
          <option value="2028">2028</option>
          <option value="2027">2027</option>
          <option value="2026">2026</option>
          <option value="2025">2025</option>
          <option value="2024">2024</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
          <option value="2009">2009</option>
          <option value="2008">2008</option>
          <option value="2007">2007</option>
          <option value="2006">2006</option>
          <option value="2005">2005</option>
          <option value="2004">2004</option>
          <option value="2003">2003</option>
          <option value="2002">2002</option>
          <option value="2001">2001</option>
          <option value="2000">2000</option>
          <option value="1999">1999</option>
          <option value="1998">1998</option>
          <option value="1997">1997</option>
          <option value="1996">1996</option>
          <option value="1995">1995</option>
          <option value="1994">1994</option>
          <option value="1993">1993</option>
          <option value="1992">1992</option>
          <option value="1991">1991</option>
          <option value="1990">1990</option>
          <option value="1989">1989</option>
          <option value="1988">1988</option>
          <option value="1987">1987</option>
          <option value="1986">1986</option>
          <option value="1985">1985</option>
          <option value="1984">1984</option>
          <option value="1983">1983</option>
          <option value="1982">1982</option>
          <option value="1981">1981</option>
          <option value="1980">1980</option>
          <option value="1979">1979</option>
          <option value="1978">1978</option>
          <option value="1977">1977</option>
          <option value="1976">1976</option>
          <option value="1975">1975</option>
          <option value="1974">1974</option>
          <option value="1973">1973</option>
          <option value="1972">1972</option>
          <option value="1971">1971</option>
          <option value="1970">1970</option>
          <option value="1969">1969</option>
          <option value="1968">1968</option>
          <option value="1967">1967</option>
          <option value="1966">1966</option>
          <option value="1965">1965</option>
          <option value="1964">1964</option>
          <option value="1963">1963</option>
          <option value="1962">1962</option>
          <option value="1961">1961</option>
          <option value="1960">1960</option>
     </select>
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>DATE FIN</h5>
                                                <select name="anneeFin">

                                                <option value="<?=$form['date_fin'] ?>" selected><?=$form['date_fin'] ?></option>

          <option value="Présent">Jusqu'à présent</option>                                         
          <option value="2030">2030</option>
          <option value="2029">2029</option>
          <option value="2028">2028</option>
          <option value="2027">2027</option>
          <option value="2026">2026</option>
          <option value="2025">2025</option>
          <option value="2024">2024</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
          <option value="2009">2009</option>
          <option value="2008">2008</option>
          <option value="2007">2007</option>
          <option value="2006">2006</option>
          <option value="2005">2005</option>
          <option value="2004">2004</option>
          <option value="2003">2003</option>
          <option value="2002">2002</option>
          <option value="2001">2001</option>
          <option value="2000">2000</option>
          <option value="1999">1999</option>
          <option value="1998">1998</option>
          <option value="1997">1997</option>
          <option value="1996">1996</option>
          <option value="1995">1995</option>
          <option value="1994">1994</option>
          <option value="1993">1993</option>
          <option value="1992">1992</option>
          <option value="1991">1991</option>
          <option value="1990">1990</option>
          <option value="1989">1989</option>
          <option value="1988">1988</option>
          <option value="1987">1987</option>
          <option value="1986">1986</option>
          <option value="1985">1985</option>
          <option value="1984">1984</option>
          <option value="1983">1983</option>
          <option value="1982">1982</option>
          <option value="1981">1981</option>
          <option value="1980">1980</option>
          <option value="1979">1979</option>
          <option value="1978">1978</option>
          <option value="1977">1977</option>
          <option value="1976">1976</option>
          <option value="1975">1975</option>
          <option value="1974">1974</option>
          <option value="1973">1973</option>
          <option value="1972">1972</option>
          <option value="1971">1971</option>
          <option value="1970">1970</option>
          <option value="1969">1969</option>
          <option value="1968">1968</option>
          <option value="1967">1967</option>
          <option value="1966">1966</option>
          <option value="1965">1965</option>
          <option value="1964">1964</option>
          <option value="1963">1963</option>
          <option value="1962">1962</option>
          <option value="1961">1961</option>
          <option value="1960">1960</option>
     </select>
											</div>
										</div>

                                        <div class="col-xl-6">
											<div class="submit-field">
												<h5>FILIERE</h5>
												<input type="text" name="filiere" class="with-border" value="<?=$form['filiere'] ?>" required>
                                                <input type="hidden" name="id_formation" class="with-border" value="<?=$form['id_formation'] ?>" >
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
				<button class="button ripple-effect big margin-top-10" type="submit" form="ModifFormation">MODIFIER</button>	
				</div>



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

<script>

$(".error").hide();
$(".success").hide();
$("#msg_pass").hide();
</script>

<script src="formations.js"></script>

</body>
</html>