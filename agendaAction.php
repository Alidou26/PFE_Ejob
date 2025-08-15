<?php 

session_start();

include("BaseDeDonnees.php");

$req=$bd->prepare("INSERT INTO `agenda`(`priorite`,`texte`,`pseudo`) values(?,?,?) ");
$req->execute(array($_POST['priorite'],$_POST['note'],$_POST['pseudo']));

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>