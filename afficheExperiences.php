<?php

$req=$bd->prepare("SELECT * FROM `experience` where `id_utilisateur`=? ");

$req->execute(array($_SESSION['id_utilisateur']));

$experiences=$req->fetchAll();

?>