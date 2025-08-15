<?php


$req5=$bd->prepare("SELECT * FROM `agenda` where `pseudo`=? ");
$req5->execute(array($_SESSION['pseudo']));
$agendas=$req5->fetchAll();

$req6=$bd->prepare("SELECT COUNT(*) AS `total` FROM `postulation` where `id_utilisateur`=?  ");
$req6->execute(array($_SESSION['id_utilisateur']));
$cand=$req6->fetch();

$req7=$bd->prepare("SELECT COUNT(*) AS `total` FROM `avis_entreprises` where `id_utilisateur`=?  ");
$req7->execute(array($_SESSION['id_utilisateur']));
$avisT=$req7->fetch();

?>