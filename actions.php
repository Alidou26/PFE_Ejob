<?php
session_start();
require_once 'functions.php';





if(isset($_GET['block'])){
    $user_id = $_GET['block'];
    $user = $_GET['username']; 
      if(blockUser($user_id)){
          header("location:../../?u=$user");
      }else{
          echo "something went wrong";
      }
  
    
  }

  if(isset($_GET['deletepost'])){
    $post_id = $_GET['deletepost'];
      if(deletePost($post_id)){
          header("location:{$_SERVER['HTTP_REFERER']}");
      }else{
          echo "something went wrong";
      }
  
    
  }



  if(isset($_GET['deleteUser'])){
    $id = $_GET['deleteUser'];
      if(deleteUser($id)){
        header("location:{$_SERVER['HTTP_REFERER']}");
      }else{
          echo "something went wrong";
      }
  
    
  }

  if(isset($_GET['deleteRecruteur'])){
    $id = $_GET['deleteRecruteur'];
      if( deleteRecruteur($id)){
        header("location:{$_SERVER['HTTP_REFERER']}");
      }else{
          echo "something went wrong";
      }
  
    
  }
  
  if(isset($_GET['deleteAnnonce'])){
    $id = $_GET['deleteAnnonce'];
      if( deleteAnnonce($id)){
        header("location:{$_SERVER['HTTP_REFERER']}");
      }else{
          echo "something went wrong";
      }
  
    
  }

  if(isset($_GET['deleteCv'])){
    $id = $_GET['deleteCv'];
      if(deleteCv($id)){
        header("location:{$_SERVER['HTTP_REFERER']}");
      }else{
          echo "something went wrong";
      }
  
    
  }

// //for managing add post
// if(isset($_GET['addpost'])){
//    $response = validatePostImage($_FILES['post_img']);

//    if($response['status']){
// if(createPost($_POST,$_FILES['post_img'])){
//     header("location:../../?new_post_added");
// }else{
//     echo "something went wrong";
// }
//    }else{
//     $_SESSION['error']=$response;
//     header("location:../../");
//    }
// }




