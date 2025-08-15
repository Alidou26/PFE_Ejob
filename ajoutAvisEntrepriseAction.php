<?php

require('BaseDeDonnees.php');

session_start();

if($_SESSION['utilisateur_connecte']){

    $note=$_POST['rating'];
    $avis=$_POST['message'];
    $id_entreprise=$_POST['id_entreprise'];

    $req1=$bd->prepare("INSERT INTO `avis_entreprises`(`id_utilisateur`,`note`,`avis`,`id_entreprise`) values(?,?,?,?) ");

    $req1->execute(array($_SESSION['id_utilisateur'],$note,$avis,$id_entreprise));



    header('location:profilE.php?id_entreprise='.$id_entreprise.'');


}
else{
    header('location:index.php');
}


?>