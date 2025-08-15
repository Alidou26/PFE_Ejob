<?php

$idAnnonce=$_GET['id_annonce'];

$req=$bd->prepare("SELECT * FROM `annonces`,`entreprises`,`localisations` where `annonces`.`id_entreprise`=`entreprises`.`id_entreprise` 
and `annonces`.`id_localisation`=`localisations`.`id_localisation`
and  `id_annonce`= ? ");

$req->execute(array($idAnnonce));

$annonce=$req->fetch();

$req2=$bd->prepare("SELECT AVG(`note`) as `total` from `avis_entreprises` where `id_entreprise`= ? ");
$req2->execute(array($annonce['id_entreprise']));

$rate=$req2->fetch();

$req3=$bd->prepare("SELECT * FROM `annonces`,`entreprises`,`localisations` where `annonces`.`id_entreprise`=`entreprises`.`id_entreprise` 
and `annonces`.`id_localisation`=`localisations`.`id_localisation`
and  `id_categorie`= ? and `id_annonce`!= ? ");

$req3->execute(array($annonce['id_categorie'],$_GET['id_annonce']));

$similaires=$req3->fetchAll();

if(isset($_SESSION['utilisateur_connecte'])){

    $verif=$bd->prepare("SELECT * FROM `postulation` where `id_utilisateur`=? and `id_annonce`= ? ");
    $verif->execute(array($_SESSION['id_utilisateur'],$_GET['id_annonce']));

}


?>