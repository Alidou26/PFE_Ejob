<?php  

//categories
$req1=$bd->query("SELECT * FROM `categories` ");

$categories=$req1->fetchAll();

//lieux
$req2=$bd->query("SELECT * FROM `localisations`");

$localisations=$req2->fetchAll();

//nombre Annonce
$req3=$bd->query("SELECT COUNT(*) as `total` from `annonces` ");

$totalA=$req3->fetch();

//nombre utilisateurs
$req4=$bd->query("SELECT COUNT(*) as `total` from `utilisateurs` ");

$totalU=$req4->fetch();

//nombre recruteur
$req5=$bd->query("SELECT COUNT(*) as `total` from `entreprises` ");

$totalE=$req5->fetch();

//categorie populaire
$req5=$bd->query("SELECT *,count(`A`.`id_categorie`) as `total` FROM `annonces` as `A`,`categories` as `C` 
WHERE `A`.`id_categorie`=`C`.`id_categorie` 
group by `A`.`id_categorie`");

$Cpopulaires=$req5->fetchAll();

//Categorie populaire par defaut
$req6=$bd->query("SELECT * FROM `categories` limit 8 ");

$CpopulairesD=$req6->fetchAll();

//les nouvelles offres
$req7=$bd->query("SELECT * FROM `annonces` as `A`,`entreprises` as `E`,`localisations` as L where `A`.`id_entreprise`=`E`.`id_entreprise`
and  `A`.`id_localisation`=`L`.`id_localisation`
order by `date_annonce` desc ");

$Nannonces=$req7->fetchAll();

//entreprises les mieux notees
$req8=$bd->query("SELECT *,avg(`note`) as `total` FROM `avis_entreprises` as `A`,`entreprises` as `E` 
WHERE `A`.`id_entreprise`=`E`.`id_entreprise`
group by `A`.`id_entreprise`
order by `total`
");

$Epopulaires=$req8->fetchAll();

//entreprises les mieux notees defaut

$req9=$bd->query("SELECT * FROM `entreprises` limit 4 ");

$EpopulairesD=$req9->fetchAll();

//avis sur EJOB
$req10=$bd->query("SELECT * FROM `avis_ejob` order by `date` desc ");

$Aviss=$req10->fetchAll();

//taux de satisfaction
$req11=$bd->query("SELECT AVG(`note_satisfaction`) as `total` from `avis_ejob` ");

$res11=$req11->fetch();

$satisfaction=($res11['total']/5)*100;

//nombre de candidature

$req12=$bd->query('SELECT COUNT(*) as `total` from `postulation` ');

if($req12->rowcount() > 0){
    $nombreC=$req12->fetch();
}
else{
    $nombreC['total']=0;
}





?>