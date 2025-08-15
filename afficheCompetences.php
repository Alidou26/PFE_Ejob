<?php

$req=$bd->prepare("SELECT * FROM `competences` where `id_utilisateur`=? ");

$req->execute(array($_SESSION['id_utilisateur']));

$competences=$req->fetchAll();

?>