<?php

$req=$bd->prepare("SELECT * FROM `annonces` as A,`entreprises` as   E, `localisations` as L  
where A.`id_localisation`=L.`id_localisation` and A.`id_entreprise`=E.`id_entreprise`  and 
`id_categorie`= ? order by `date_annonce` desc  ");

$req->execute(array($_GET['id_categorie']));

$resultats=$req->fetchAll();

$req1=$bd->prepare("SELECT * FROM `categories` where `id_categorie`= ? ");

$req1->execute(array($_GET['id_categorie']));

$categorie=$req1->fetch();


?>
