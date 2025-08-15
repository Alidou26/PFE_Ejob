<?php

$req=$bd->prepare("SELECT * FROM `preferences`,`categories` where `preferences`.`id_categorie`=`categories`.`id_categorie` and
 `id_utilisateur`=? ");

$req->execute(array($_SESSION['id_utilisateur']));

$prefs=$req->fetchAll();

?>