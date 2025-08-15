<?php 

$req1=$bd->query("SELECT * FROM `categories` ");

$categories=$req1->fetchAll();

$req2=$bd->query("SELECT * FROM `localisations` ");

$localisations=$req2->fetchAll();

if(isset($_GET['id_annonce'])){
$req3=$bd->query("SELECT * FROM `annonces` where `id_annonce`={$_GET['id_annonce']} ");

$info=$req3->fetch();

}

?>