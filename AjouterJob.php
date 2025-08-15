<?php

session_start();

require('BaseDeDonnees.php');

include('phpmailer/mail.php');

$titre=strtoupper(htmlspecialchars($_POST['titre']));
$type=$_POST['type'];
$categorie=$_POST['categorie'];
$salaire=$_POST['salaire'];
$localisation=$_POST['localisation'];
$date_fin=$_POST['date_fin'];
$description=$_POST['description'];

$req=$bd->prepare("INSERT INTO `annonces`(`description`,`salaire`,`type`,`date_fin`,
`id_categorie`,`id_localisation`,`titre`,`id_entreprise`) values(?,?,?,?,?,?,?,?) ");

$req->execute(array($description,$salaire,$type,$date_fin,$categorie,$localisation,$titre,$_SESSION['id_entreprise']));

$req2=$bd->query("SELECT * FROM `annonces` `A`,`entreprises` `E` WHERE `A`.`id_entreprise`=`E`.`id_entreprise`
order by `id_annonce` desc limit 1");

$infosA=$req2->fetch();

$req3=$bd->query("SELECT * FROM `preferences` `P`,`utilisateurs` `U` where `P`.`id_utilisateur`=`U`.`id_utilisateur` 
and `id_categorie`=".$categorie);

$utilisateurs=$req3->fetchAll();

foreach($utilisateurs as $U){

    $body='
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 


    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
<style>

html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}


.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

.im {
    color: inherit !important;
}

img.g-img + div {
    display: none !important;
}

@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}

</style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
<style>

.primary{
	background: #f3a333;
}

.bg_white{
	background: #ffffff;
}
.bg_light{
	background: #fafafa;
}
.bg_black{
	background: #000000;
}
.bg_dark{
	background: rgba(0,0,0,.8);
}
.email-section{
	padding:2.5em;
}

/*BUTTON*/
.btn{
	padding: 10px 15px;
}
.btn.btn-primary{
	border-radius: 30px;
	background: #f3a333;
	color: #ffffff;
}



h1,h2,h3,h4,h5,h6{
	font-family: "Playfair Display", serif;
	color: #000000;
	margin-top: 0;
}

body{
	font-family: "Montserrat", sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	color: rgba(0,0,0,.4);
}

a{
	color: #f3a333;
}

table{
}
/*LOGO*/

.logo h1{
	margin: 0;
}
.logo h1 a{
	color: #000;
	font-size: 20px;
	font-weight: 700;
	text-transform: uppercase;
	font-family: "Montserrat", sans-serif;
}

/*HERO*/
.hero{
	position: relative;
}
.hero img{

}
.hero .text{
	color: rgba(255,255,255,.8);
}
.hero .text h2{
	color: #ffffff;
	font-size: 30px;
	margin-bottom: 0;
}


/*HEADING SECTION*/
.heading-section{
}
.heading-section h2{
	color: #000000;
	font-size: 28px;
	margin-top: 0;
	line-height: 1.4;
}
.heading-section .subheading{
	margin-bottom: 20px !important;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(0,0,0,.4);
	position: relative;
}
.heading-section .subheading::after{
	position: absolute;
	left: 0;
	right: 0;
	bottom: -10px;
	content: "";
	width: 100%;
	height: 2px;
	background: #f3a333;
	margin: 0 auto;
}

.heading-section-white{
	color: rgba(255,255,255,.8);
}
.heading-section-white h2{
	font-size: 28px;
	font-family: 
	line-height: 1;
	padding-bottom: 0;
}
.heading-section-white h2{
	color: #ffffff;
}
.heading-section-white .subheading{
	margin-bottom: 0;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(255,255,255,.4);
}


.icon{
	text-align: center;
}
.icon img{
}


/*SERVICES*/
.text-services{
	padding: 10px 10px 0; 
	text-align: center;
}
.text-services h3{
	font-size: 20px;
}

/*BLOG*/
.text-services .meta{
	text-transform: uppercase;
	font-size: 14px;
}

/*TESTIMONY*/
.text-testimony .name{
	margin: 0;
}
.text-testimony .position{
	color: rgba(0,0,0,.3);

}


/*VIDEO*/
.img{
	width: 100%;
	height: auto;
	position: relative;
}
.img .icon{
	position: absolute;
	top: 50%;
	left: 0;
	right: 0;
	bottom: 0;
	margin-top: -25px;
}
.img .icon a{
	display: block;
	width: 60px;
	position: absolute;
	top: 0;
	left: 50%;
	margin-left: -25px;
}



/*COUNTER*/
.counter-text{
	text-align: center;
}
.counter-text .num{
	display: block;
	color: #ffffff;
	font-size: 34px;
	font-weight: 700;
}
.counter-text .name{
	display: block;
	color: rgba(255,255,255,.9);
	font-size: 13px;
}


/*FOOTER*/

.footer{
	color: rgba(255,255,255,.5);

}
.footer .heading{
	color: #ffffff;
	font-size: 20px;
}
.footer ul{
	margin: 0;
	padding: 0;
}
.footer ul li{
	list-style: none;
	margin-bottom: 10px;
}
.footer ul li a{
	color: rgba(255,255,255,1);
}


@media screen and (max-width: 500px) {

	.icon{
		text-align: left;
	}

	.text-services{
		padding-left: 0;
		padding-right: 20px;
		text-align: left;
	}

}

</style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #222222;">
	<center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
    	<!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
      	<tr>
          <td class="bg_white logo" style="padding: 1em 2.5em; text-align: center">
            <h1><a href="#">Ejob</a></h1>
          </td>
	      </tr><!-- end tr -->
				<tr>
          <td valign="middle" class="hero" style="background-image: url(https://img.freepik.com/vecteurs-libre/petites-personnes-recherche-opportunites-commerciales_74855-19928.jpg?w=1060&t=st=1678899359~exp=1678899959~hmac=f29cd311951953de967ff203856cb29830cc9162476b6967604c5e0bfa889c44); background-size: cover; height: 400px;">
            <table>
            	<tr>
            		<td>

            		</td>
            	</tr>
            </table>
          </td>
	      </tr><!-- end tr -->
		  <tr>
		            <td class="bg_white email-section">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
		            		<span class="subheading">Annonces</span>
		              	<h2>Nouvelle offre dans votre domaine de preference</h2>
		              	
		            	</div>
		            	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
		            		<tr>
                      <td valign="top" width="50%" style="padding-top: 20px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td style="padding-right: 10px;">
                              <img src="'.$infosA['photo_e'].'" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                            </td>
                          </tr>
                          <tr>
                            <td class="text-services" style="text-align: left;">
                            	<p class="meta"><span>Poste le '.$infosA['date_annonce'].'</span></p>
                            	<h3>'.$infosA['titre'].'</h3>
                             	<p>'.$infosA['description'].'</p>
                             	<p><a href="../../../../../../../../localhost/Ejob/annonces.php?id_annonce='.$infosA['id_annonce'].'" class="btn btn-primary">En savoir plus</a></p>
                            </td>
                          </tr>
                        </table>
                      </td>
                    
                    </tr>
		            	</table>
		            </td>
		          </tr><!-- end: tr -->
		         
        <tr>
        	<td valign="middle" class="bg_black footer email-section">
        		<table>
            	<tr>
                <td valign="top" width="33.333%">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-right: 10px;">
                      	<p>&copy; 2023 Ejob. Tous droits reserves</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top" width="33.333%">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">

                  </table>
                </td>
              </tr>
            </table>
        	</td>
        </tr>
      </table>

    </div>
  </center>
</body>
</html>
    ';

    envoiMail('EjobAnnonce@gmail.com',$U['email'],"Nouvelle Annonce",$body);

    $req4=$bd->query("SELECT MAX(`id_notification`) as `notif` from `notifications`");
    $res=$req4->fetch();
    $idnotif=$res['notif']+1;

    $notif='<a href="annonces.php?id_annonce='.$infosA['id_annonce'].'&id_notif='.$idnotif.'">
    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
    <span class="notification-text">
        <strong>l\'entreprise '.$_SESSION['nom_e'].'</strong> recherche <span class="color">'.$titre.'</span>
    </span>
</a>';
    

    $bd->prepare("INSERT INTO `notifications`(`pseudo`,`notif`) values(?,?)")->execute(array($U['pseudo'],$notif));

}







header('location: mesoffres.php')

?>