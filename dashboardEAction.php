<?php

$req=$bd->query("SELECT COUNT(*) as `total` from `annonces` where `id_entreprise`={$_SESSION['id_entreprise']} ");
$totalA=$req->fetch();


$req2=$bd->query("SELECT * from `annonces` where `id_entreprise`={$_SESSION['id_entreprise']} ");
$AnnonceT=$req2->fetchAll();

$nombreC=0;

foreach($AnnonceT as $Annonce){

    $req3=$bd->query("SELECT COUNT(*) as `total` from `postulation` where `id_annonce`={$Annonce['id_annonce']} ");
    $i=$req3->fetch();
    $nombreC+=$i['total'];
}

$req4=$bd->query("SELECT COUNT(*) as `totalA`,AVG(`note`) as `moyenne` from `avis_entreprises` 
where `id_entreprise`={$_SESSION['id_entreprise']} ");

$Ent=$req4->fetch();

$totM=$Ent['moyenne'];

$req5=$bd->prepare("SELECT * FROM `agenda` where `pseudo`=? ");
$req5->execute(array($_SESSION['pseudo']));
$agendas=$req5->fetchAll();





?>