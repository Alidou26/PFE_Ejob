<?php

$req=$bd->query("SELECT * FROM `postulation` `P`,`annonces` `A`,`entreprises` `E` where
`P`.`id_annonce`=`A`.`id_annonce` and `A`.`id_entreprise`=`E`.`id_entreprise` and `P`.`id_utilisateur`={$_SESSION['id_utilisateur']}");

$candidatures=$req->fetchAll();

?>