<?php
require_once 'functions.php';
session_start();


if(isset($_GET['follow'])){

    $user_id = $_POST['user_id'];

    if(followUser($user_id)){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}


//for managing add post
if(isset($_GET['addpost'])){

    $response['status']=true;

    $user_id=$_SESSION['id_utilisateur'];
    $pseudo=$_SESSION['pseudo'];
    if(!empty($_POST['texte'] )){

    if($_FILES['photoVideo']['name']){

       $image_name = time().basename($_FILES['photoVideo']['name']);
       $image_dir="poste/$image_name";
       move_uploaded_file($_FILES['photoVideo']['tmp_name'],$image_dir);
   
       $query=$bd->prepare("INSERT INTO posts(id_utilisateur,texte,image_poste,pseudo,date_poste)VALUES (?,?,?,?,current_timestamp())");
      $query->execute(Array($user_id,$_POST['texte'],$image_dir,$pseudo));
      $response['status']=true;
 
  }else{
   $query=$bd->prepare("INSERT INTO posts(id_utilisateur,texte,pseudo,date_poste)VALUES (?,?,?,current_timestamp())");
   $query->execute(Array( $user_id,$_POST['texte'],$pseudo));
   $response['status']=true;
  
  }
 
}else if(!empty($_FILES['photoVideo'])){


   $image_name = time().basename($_FILES['photoVideo']['name']);
   $image_dir="poste/$image_name";
   move_uploaded_file($_FILES['photoVideo']['tmp_name'],$image_dir);

   $query=$bd->prepare("INSERT INTO posts(id_utilisateur,image_poste,pseudo,date_poste)VALUES (?,?,?,current_timestamp())");
  $query->execute(Array( $user_id,$image_dir,$pseudo));
 
  $response['status']=true;

}

 echo json_encode($response);
 }










 if(isset($_GET['like'])){
        $post_id = $_POST['post_id'];
    
        if(!checkLikeStatus($post_id)){
            if(like($post_id)){
                $response['status']=true;
            }else{
                $response['status']=false;
            }
        
            echo json_encode($response);
        }
    
      
    }
    
    
    if(isset($_GET['unlike'])){
        $post_id = $_POST['post_id'];
    
        if(checkLikeStatus($post_id)){
            if(unlike($post_id)){
                $response['status']=true;
            }else{
                $response['status']=false;
            }
        
            echo json_encode($response);
        }
    
      
    }
    
    




    
if(isset($_GET['addcomment'])){
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];
    $style='bx bx-dots-horizontal-rounded';
        if(addComment($post_id,$comment)){
      $cuser = getUser($_SESSION['id_utilisateur']);
      $time = date("Y-m-d H:i:s");
            $response['status']=true;
            $response['comment']='						
								

                                <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="'.$cuser['photo'].'" alt="" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <strong class="text-gray-dark"><a href="#" class="fs-8">'.$cuser['nom'].' '.$cuser['pseudo'].'</strong>
                                        <a href="#"><i class='.$style.'></i></a>
                                    </div>
                                    <span class="d-block comment-created-time">'.$time.'</span>
                                    <p class="fs-8 pt-2">'.$comment.'</p>
                                    
                                </div>
                            </li>				
        ';
        }else{
            $response['status']=false;
        }
    
        echo json_encode($response);
    

  
}






// if(isset($_GET['unfollow'])){
//     $user_id = $_POST['user_id'];


//     if(unfollowUser($user_id)){
//         $response['status']=true;
//     }else{
//         $response['status']=false;
//     }

//     echo json_encode($response);
// }





if(isset($_GET['recherche'])){
    $mots = $_POST['recherche_utilisateur'];
    $resultat = recherche($mots);
    $affichage="";
    if(count( $resultat)>0){
        $response['status']=true;
     

        foreach($resultat as $utilisateur){
            $fbtn='';
        
        
       $affichage.='  
                        <li>
							<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											<div class="freelancer-avatar">
												<div class="verified-badge"></div>
												<a href="profile.php?u='.$utilisateur['id_utilisateur'].'"><img src="'.$utilisateur['photo'].'" alt=""></a>
											</div>

											<!-- Name -->
											<div class="freelancer-name">
												<h4><a href="#">'.$utilisateur['nom'].' '.$utilisateur['prenom'].' <img class="flag" src="images/flags/de.svg" alt="" title="Germany" data-tippy-placement="top"></a></h4>

												<!-- Details -->
												<span class="freelancer-detail-item"><a href="gmail.com"><i class="icon-feather-mail"></i> '.$utilisateur['email'].'</a></span>
												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-0">
                                                
													<a href="profile.php?u='.$utilisateur['id_utilisateur'].'"  class="popup-with-zoom-anim button ripple-effect" ><i class="icon-material-outline-check" ></i>profil</a>
                                                    
                                                    <a href="#small-dialog-2" class="popup-with-zoom-anim button dark ripple-effect"><i class="icon-feather-mail"></i>Envoyer un message</a>
													<a href="#small-dialog-3" class=" button red ripple-effect"><i class="icon-feather-mail"></i>Desabonne</a>
												</div>
											</div>
										</div>
									</div>
								</li>
                             

                        ';
        
        }
                    
        
$response['affiche']=$affichage;

    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}