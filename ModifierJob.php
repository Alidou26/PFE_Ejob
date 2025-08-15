<?php

include('BaseDeDonnees.php');

$titre=strtoupper(htmlspecialchars($_POST['titre']));
$type=$_POST['type'];
$categorie=$_POST['categorie'];
$salaire=$_POST['salaire'];
$localisation=$_POST['localisation'];
$date_fin=$_POST['date_fin'];
$description=$_POST['description'];
$id_annonce=$_POST['id_annonce'];

$req=$bd->prepare("UPDATE `annonces` set `description`=?,`salaire`=?,`type`=?,`date_fin`=?,`id_categorie`=?,
`id_localisation`=?,`titre`=? where `id_annonce`= ? ");

$req->execute(array($description,$salaire,$type,$date_fin,$categorie,$localisation,$titre,$id_annonce));

header('location: mesoffres.php')



?>