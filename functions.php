<?php

require("BaseDeDonnees.php");

//for getting userdata by id
function getUser($user_id){
    global $bd;
    $query=$bd->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur=?");
    $query->execute(Array($user_id));
    $run= $query->fetch();
 return  $run;

}

function getPostByUser($id){
    global $bd;
    $query=$bd->prepare("SELECT utilisateurs.id_utilisateur as uid,posts.id_poste,posts.id_utilisateur,posts.image_poste,posts.texte,posts.date_poste,utilisateurs.nom,utilisateurs.prenom,utilisateurs.pseudo,utilisateurs.photo FROM posts JOIN utilisateurs ON utilisateurs.id_utilisateur=posts.id_utilisateur where utilisateurs.id_utilisateur=? ORDER BY id_poste DESC");
    $query->execute(array($id));
    $run =$query->fetchAll(PDO::FETCH_OBJ);

    return $run;

}

function utilisateur(){
    global $bd;
    $query=$bd->prepare("SELECT * FROM utilisateurs");
    $query->execute();
    $run= $query->fetchAll(PDO::FETCH_OBJ);
 return  $run;

}

function recruteur(){
    global $bd;
    $query=$bd->prepare("SELECT * FROM entreprises");
    $query->execute();
    $run= $query->fetchAll(PDO::FETCH_OBJ);
 return  $run;

}

function recruteurbyId($id){
    global $bd;
    $query=$bd->prepare("SELECT * FROM entreprises where id_entreprise=?");
    $query->execute(array($id));
    $run= $query->fetch();
 return  $run;

}

function pays(){
    global $bd;
    $query=$bd->prepare("SELECT distinct pays FROM utilisateurs ");
    $query->execute();
    $run= $query->fetchAll(PDO::FETCH_OBJ);
 return  $run;

}
function candidatPlus(){
    global $bd;
    $query=$bd->prepare("SELECT *,count(postulation.id_postulation) as nb FROM postulation,utilisateurs where utilisateurs.id_utilisateur=postulation.id_utilisateur group by postulation.id_utilisateur order by nb desc limit 5");
    $query->execute();
    $run= $query->fetchAll(PDO::FETCH_OBJ);
 return  $run;

}


function recruteurPlusOffre(){
    global $bd;
    $query=$bd->prepare("SELECT *,count(annonces.id_annonce) as nb FROM entreprises,annonces where entreprises.id_entreprise=annonces.id_entreprise group by entreprises.id_entreprise order by nb desc limit 5");
    $query->execute();
    $run= $query->fetchAll(PDO::FETCH_OBJ);
 return  $run;

}

function preferences(){
    global $bd;
    $query=$bd->prepare("SELECT*, count(id_preference) as nombre FROM preferences,categories where preferences.id_categorie=categories.id_categorie  group by categories.id_categorie order by nombre desc  limit 5 ");
    $query->execute();
    $run= $query->fetchAll(PDO::FETCH_OBJ);
 return  $run;

}
//function for follow the user
function followUser($user_pseudo){
    global $bd;
   // $cu = getUser($_SESSION['userdata']['id']);
    $current_user= $_SESSION['id_utilisateur'];
    $query=$bd->prepare("INSERT INTO followers(id_utilisateur,pseudo) VALUES(?,?)");
    $run= $query->execute(Array($current_user,$user_pseudo));
    return  $run;
    
}



function getFollowSuggestions(){
    global $bd;
    $pays=$_SESSION['pays'];
    $pseudo=$_SESSION['pseudo'];
    $query=$bd->prepare("SELECT * FROM utilisateurs WHERE pays=? and pseudo not LIKE ?");
    $query->execute(Array($pays,$pseudo));
    $run= $query->fetchAll();
    return  $run;
}
//filtrer les suggestion

function filterFollowSuggestion(){
    $list = getFollowSuggestions();
    $filter_list  = array();
    foreach($list as $user){
        if(!checkFollowStatus($user['pseudo']) && count($filter_list)<5){
         $filter_list[]=$user;
        }
    }
    
    return $filter_list;
    }
    


//verifier si l`utilisateur est abonne a l`utilisateur
function checkFollowStatus($pseudo){
    global $bd;
    $current_user = $_SESSION['id_utilisateur'];
    $query=$bd->prepare("SELECT count(*) as row FROM followers WHERE id_utilisateur=? and pseudo=?");
    $query->execute(Array($current_user,$pseudo));
  
    $run = $query->fetch();
    return $run['row'];
}










//function for creating comments
function addComment($post_id,$comment){
    global $bd;
    $current_user=$_SESSION['id_utilisateur'];
    $pseudo=$_SESSION['pseudo'];
    $query=$bd->prepare("INSERT INTO commentaire(id_utilisateur,id_poste,commentaires,pseudo,date_creation) VALUES(?,?,?,?,current_timestamp())");
    return  $query->execute(Array($current_user,$post_id,$comment,$pseudo));;
    
}


//for getting post
function getPosterId($post_id){
    global $bd;
    $query=$bd->prepare("SELECT id_utilisateur FROM posts WHERE id_poste=?");
    $query->execute(Array($post_id));
 $run =$query->fetch();
 return $run['id_utilisateur'];

}

//function for like the post
function like($post_id){
    global $bd;
    $current_user=$_SESSION['id_utilisateur'];
    $query=$bd->prepare("INSERT INTO likes(id_poste,id_utilisateur) VALUES(?,?)");
   
  
   
    return ($query->execute(Array($post_id,$current_user)));
    
}


//function for unlike the post
function unlike($post_id){

    global $bd;
    $current_user=$_SESSION['id_utilisateur'];

    $query=$bd->prepare("DELETE FROM likes WHERE id_utilisateur=? and id_poste=?");
   
   $run=$query->execute(Array($current_user,$post_id));

    return $run;
}




//function for getting likes count
function getComments($post_id){
    global $bd;
    $query=$bd->prepare("SELECT * FROM commentaire,utilisateurs WHERE commentaire.id_utilisateur=utilisateurs.id_utilisateur and id_poste=? ORDER BY id_com DESC");
    $query->execute(Array($post_id));
    $run = $query->fetchAll(PDO::FETCH_OBJ);
    return $run;
}


//for getting userdata by username
function getUserByUsername($username){
    global $bd;
    $query=$bd->prepare( "SELECT * FROM utilisateurs WHERE pseudo=?");
    $query->execute(Array($username));
 
    $run =$query->fetchAll();
    return $run;
}

//for getting posts
function getPost(){
    global $bd;
    $query=$bd->prepare("SELECT utilisateurs.id_utilisateur as uid,posts.id_poste,posts.id_utilisateur,posts.image_poste,posts.texte,posts.date_poste,utilisateurs.nom,utilisateurs.prenom,utilisateurs.pseudo,utilisateurs.photo FROM posts JOIN utilisateurs ON utilisateurs.id_utilisateur=posts.id_utilisateur ORDER BY id_poste DESC");
    $query->execute();
    $run =$query->fetchAll();

    return $run;

}


function deletePost($post_id){
    global $bd;
   

    $dellike=$bd->prepare("DELETE FROM likes WHERE id_poste=? and id_utilisateur=?");
    $dellike->execute(Array($post_id,$_SESSION['id_utilisateur']));
 
    $delcom=$bd->prepare("DELETE FROM commentaire WHERE id_poste=? and id_utilisateur=?");
    $delcom->execute(Array($post_id,$_SESSION['id_utilisateur']));

    $query=$bd->prepare("DELETE FROM posts WHERE id_poste=?");
   
    
    return $query->execute(Array($post_id));
}


function deleteUser($id){
    global $bd;
   
    $user=getUser($id);
    $pseudo= $user['pseudo'];

    $dellike=$bd->prepare("DELETE FROM likes WHERE  id_utilisateur=?");
    $dellike->execute(Array($id));
 
    $delcom=$bd->prepare("DELETE FROM commentaire WHERE id_utilisateur=?");
    $delcom->execute(Array($id));

    $query1=$bd->prepare("DELETE FROM posts WHERE pseudo=?");
    $query1->execute(Array($pseudo));

    $preference=$bd->prepare("DELETE FROM preferences WHERE id_utilisateur=?");
    $preference->execute(Array($id));

    $postulation=$bd->prepare("DELETE FROM postulation WHERE id_utilisateur=?");
    $postulation->execute(Array($id));

    $message=$bd->prepare(" DELETE FROM `messages` WHERE pseudo_envoyeur =? or pseudo_recepteur =?");
    $message->execute(Array($pseudo,$pseudo));

    $formation=$bd->prepare("   DELETE FROM `formations` WHERE id_utilisateur=?");
    $formation->execute(Array($id));
  
    $experience=$bd->prepare("  DELETE FROM `experience` WHERE id_utilisateur=?");
    $experience->execute(Array($id));
  
    $documents=$bd->prepare(" DELETE FROM `documents` WHERE id_utilisateur=?");
    $documents->execute(Array($id));
 
    $competences=$bd->prepare("  DELETE FROM `competences` WHERE id_utilisateur=?");
    $competences->execute(Array($id));
  
    $avis_entreprises=$bd->prepare(" DELETE FROM `avis_entreprises` WHERE id_utilisateur=?");
    $avis_entreprises->execute(Array($id));

    $avis_ejob=$bd->prepare("  DELETE FROM `avis_ejob` WHERE pseudo=?");
    $avis_ejob->execute(Array($pseudo));

    $agenda=$bd->prepare("DELETE FROM `agenda`WHERE pseudo=?");
    $agenda->execute(Array($pseudo));

    $query=$bd->prepare("DELETE FROM `utilisateurs`WHERE id_utilisateur=?");

    return $query->execute(Array($id));
}






function deleteRecruteur($id){
    global $bd;
   
    $recruteur=recruteurbyId($id);
    $pseudo= $recruteur['pseudo'];

    $avis=$bd->prepare("DELETE FROM `avis_entreprises` WHERE  id_entreprise=?");
    $avis->execute(Array($id));
 
    $annonce=$bd->prepare("DELETE FROM `annonces` WHERE id_entreprise=?");
    $annonce->execute(Array($id));

    $query1=$bd->prepare("DELETE FROM posts WHERE pseudo=?");
    $query1->execute(Array($pseudo));

 
    $message=$bd->prepare(" DELETE FROM `messages` WHERE pseudo_envoyeur =? or pseudo_recepteur =?");
    $message->execute(Array($pseudo,$pseudo));


    $avis_ejob=$bd->prepare("  DELETE FROM `avis_ejob` WHERE pseudo=?");
    $avis_ejob->execute(Array($pseudo));

    $agenda=$bd->prepare("DELETE FROM `agenda`WHERE pseudo=?");
    $agenda->execute(Array($pseudo));

    $query=$bd->prepare("DELETE FROM `entreprises`WHERE id_entreprise=?");

    return $query->execute(Array($id));
}


function getAnnonce($id){
    global $bd;
    $query=$bd->prepare("SELECT*FROM annonces,entreprises WHERE annonces.id_entreprise=entreprises.id_entreprise and entreprises.id_entreprise=? ");
    $query->execute(array($id));

    return $query->fetchAll(PDO::FETCH_OBJ);
}

function Annonce(){
    global $bd;
    $query=$bd->prepare("SELECT*FROM annonces,entreprises WHERE annonces.id_entreprise=entreprises.id_entreprise ");
    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
}

function deleteAnnonce($id){
    global $bd;

    $query=$bd->prepare("DELETE FROM annonces WHERE id_annonce=? ");
    return  $query->execute(array($id));

}

function deleteCv($id){
    global $bd;
    
    $query=$bd->prepare("UPDATE `utilisateurs` SET `cv`='' WHERE id_utilisateur=?");
    return  $query->execute(array($id));

}
// POUR OBTENIR TOUT LES POSTE

function filterPosts(){
    $list = getPost();
    $filter_list  = array();
    foreach($list as $post){
        if(checkFollowStatus($post['id_utilisateur']) || $post['id_utilisateur']==$_SESSION['id_utilisateur']){
         $filter_list[]=$post;
        }
    }
    
    return $filter_list;
    }


    function userOnline(){
        global $bd;
             $list  = array();
            $query=$bd->prepare("SELECT*FROM `utilisateurs` WHERE  `status`='CONNECTE' ");
            $query->execute();
         $run= $query->fetchAll();
                             foreach($run as $user){
                                if(checkFollowStatus($user['pseudo'])==1 ){
                                    $list[]= $user;  
                                }
                             }
      return  $list;
        }
    
    

//function checkLikeStatus
function checkLikeStatus($post_id){
    global $bd;
    $current_user = $_SESSION['id_utilisateur'];
    $query=$bd->prepare("SELECT count(*) as row FROM likes WHERE id_utilisateur=? and id_poste=?");
    $query->execute(array($_SESSION['id_utilisateur'],$post_id));
    $run = $query->fetch();
    return $run['row'];
}

//function for getting likes count
function getLikes($post_id){
    global $bd;
    $query=$bd->prepare("SELECT count(*) as row FROM likes WHERE id_poste=?");
    $query->execute(array($post_id));

    $run = $query->fetch();
    return $run['row'];
}


//for searching the users
function recherche($mot){
    global $bd;

    $query=$bd->prepare("SELECT * FROM utilisateurs WHERE nom LIKE '%".$mot."%' or prenom LIKE '%".$mot."%' or pseudo LIKE '%".$mot."%' LIMIT 5");
    $query->execute();

    $run = $query->fetchAll();

 return $run;

}



   
?>