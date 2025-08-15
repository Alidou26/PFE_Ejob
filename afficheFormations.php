<?php

$req=$bd->prepare("SELECT * FROM `formations` where `id_utilisateur`=? ");

$req->execute(array($_SESSION['id_utilisateur']));

$formations=$req->fetchAll();

?>