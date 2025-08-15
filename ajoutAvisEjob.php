<?php

require('BaseDeDonnees.php');

session_start();

$rating=$_POST['rating'];
$pseudo=$_POST['pseudo'];
$type=$_POST['type'];
$message=$_POST['message'];

if(isset($_SESSION['utilisateur_connecte'])){

    $designation=$_POST['nom'].' '.$_POST['prenom'];

}
else{
    $designation=$_POST['nom'].'-'.$_POST['prenom'];
}


$req=$bd->prepare("INSERT INTO `avis_ejob`(`pseudo`,`designation`,`type`,`note_satisfaction`,`avis`) values(?,?,?,?,?) ");

$req->execute(array($pseudo,$designation,$type,$rating,$message));

header('location: index.php#AvisSurEjob');


?>