<?php

namespace MyApp;
use PDO;





class User{
    
    public $db, $id_utilisateur, $sessionID;

    public function  __construct(){
        $db = new  \MyApp\DB;
        $this->db = $db->connect();
        $this->id_utilisateur= $this->ID();

        $this->sessionID= $this->getSessionID();
    }
    public function ID(){
        if($this->isLoggedIn()){
            if(isset($_SESSION['id_utilisateur'])){
            return $_SESSION['id_utilisateur'];
            }
            else{
                return $_SESSION['id_entreprise'];
            }
        }
    }
    public function getSessionID(){
        return session_id();
    }

      
        public function redirect($location){
            header("location: ".BASE_URL.$location);
        }
     
        public function userData($id_utilisateur= ''){

                $id_utilisateur = ((!empty($id_utilisateur))? $id_utilisateur : $this->id_utilisateur);
                $stmt = $this->db->prepare("SELECT * FROM `utilisateurs` where `id_utilisateur` = :id_utilisateur");
                $stmt->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_STR);
                $stmt->execute();

                if($stmt->rowcount() > 0 ){
            
                return  $stmt->fetch(PDO::FETCH_OBJ);
                }
                else{
                    $id_utilisateur = ((!empty($id_utilisateur))? $id_utilisateur : $this->id_utilisateur);
                    $stmt = $this->db->prepare("SELECT * FROM `entreprises` where `id_entreprise` = :id_utilisateur");
                    $stmt->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_STR);
                    $stmt->execute();
                
                    return  $stmt->fetch(PDO::FETCH_OBJ);
                }

        }

        public function isLoggedIn(){

            if(isset($_SESSION['id_utilisateur'])){
                return ((isset($_SESSION['id_utilisateur'])) ? true : false);
                }
                else{
                    return ((isset($_SESSION['id_entreprise'])) ? true : false);
                }
            
            
        }

        public function logout(){
           $_SESSION =array();
           session_destroy();
           session_regenerate_id();
           $this->redirect('../index.php');
        }


        public function getUserByUsername($pseudo){

            if(isset($_SESSION['id_utilisateur'])){

                $stmt = $this->db->prepare("SELECT * FROM `entreprises` where `pseudo` = :pseudo");
                $stmt->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
                $stmt->execute();
            
                return  $stmt->fetch(PDO::FETCH_OBJ);

                }
                else{

                    $stmt = $this->db->prepare("SELECT * FROM `utilisateurs` where `pseudo` = :pseudo");
                    $stmt->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
                    $stmt->execute();
                
                    return  $stmt->fetch(PDO::FETCH_OBJ);
                }


        }
        
        public function updateSession(){

            if(isset($_SESSION['id_utilisateur'])){

                $stmt = $this->db->prepare(" UPDATE  `utilisateurs` SET `sessionID` = :sessionID where `id_utilisateur`= :id_utilisateur");
                $stmt->bindParam(":sessionID", $this->sessionID, PDO::PARAM_STR);
                $stmt->bindParam(":id_utilisateur", $this->id_utilisateur, PDO::PARAM_INT);
                $stmt->execute();

                }
                else{

            $stmt = $this->db->prepare(" UPDATE  `entreprises` SET `sessionID` = :sessionID where `id_entreprise`= :id_utilisateur");
            $stmt->bindParam(":sessionID", $this->sessionID, PDO::PARAM_STR);
            $stmt->bindParam(":id_utilisateur", $this->id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();

                }

        }


        public function getUserBySession($sessionID){
            $stmt = $this->db->prepare("SELECT * FROM `utilisateurs` where `sessionID` = :sessionID");
            $stmt->bindParam(":sessionID", $sessionID, PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowcount() > 0){
            return $stmt->fetch(PDO::FETCH_OBJ);
            }
            else{
                $stmt = $this->db->prepare("SELECT * FROM `entreprises` where `sessionID` = :sessionID");
                $stmt->bindParam(":sessionID", $sessionID, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_OBJ);
            }
        }

        public function updateConnection($connectionID, $id_utilisateur){

            $req=$this->db->query("SELECT * FROM `utilisateurs` where `id_utilisateur`={$id_utilisateur}");

            if($req->rowcount() > 0 ){
            $stmt = $this->db->prepare("UPDATE `utilisateurs` SET `connectionID` = :connectionID where `id_utilisateur`= :id_utilisateur");
            $stmt->bindParam(":connectionID", $connectionID, PDO::PARAM_STR);
            $stmt->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $stmt->execute();
            
        }
            else{

                $stmt = $this->db->prepare("UPDATE `entreprises` SET `connectionID` = :connectionID where `id_entreprise`= :id_utilisateur");
                $stmt->bindParam(":connectionID", $connectionID, PDO::PARAM_STR);
                $stmt->bindParam(":id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
                $stmt->execute();

            }
        }

    }
