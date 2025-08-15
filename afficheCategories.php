<?php

$req=$bd->prepare("SELECT * FROM `categories`");

$req->execute();

$categories=$req->fetchAll();

?>