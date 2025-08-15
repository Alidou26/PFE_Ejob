<?php

require('../BaseDeDonnees.php');
session_start();
require('../functions.php');

$recruteur=recruteur();
$utilisateur=utilisateur();
$bestRecruteur=recruteurPlusOffre();
$bestcandidat=candidatPlus();
$nombrePays=pays();
$preferences=preferences();

include("header.php");
?>


        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Dashboard</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ejob</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#admin-Dashboard">Dashboard</a></li>
               
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="row clearfix row-deck">
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green" data-toggle="tooltip" title="Recruteur"><?php echo count($recruteur);?></div>
                                <a href="recruteur.php" class="my_sort_cut text-muted">
                                    <i class="fa fa-black-tie"></i>
                                    <span>Recruteur</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box orange" data-toggle="tooltip" title="Candidat"><?php echo count($utilisateur);?></div>
                                <a href="candidat.php" class="my_sort_cut text-muted">
                                    <i class="fa fa-user-circle-o"></i>
                                    <span>Candidat</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="cvs.php" class="my_sort_cut text-muted">
                                    <i class="fa fa-folder"></i>
                                    <span>Les CV</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <a href="offres.php" class="my_sort_cut text-muted">
                                    <i class="fa fa-address-book"></i>
                                    <span>Les annonces</span>
                                </a>
                            </div>
                        </div>
                    </div>
                   
                    
                  
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="admin-Dashboard" role="tabpanel">

                        <div class="row clearfix row-deck">
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Recruteur avec le plus d'offre</h3>
                                        <div class="card-options">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                            <div class="item-action dropdown ml-2" >
                                                <!-- <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a> -->
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive" style="height: 310px;">
                                        <table class="table card-table table-vcenter text-nowrap table-striped mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>ID</th>                                                    
                                                    <th>Nom</th>
                                                    <th></th>
                                                    <th>Nbre</th>
                                                    <th>Sigle</th>
                                                </tr>
                                                <?php foreach($bestRecruteur as $recru){?>
                                                       
                                                <tr>
                                                   
                                                    <td><?= $recru->id_entreprise?></td>
                                                  
                                                    <td class="w40">
                                                        <div class="avatar">
                                                        <a href="annonces.php?id=<?= $recru->id_entreprise?>">
                                                            <img class="avatar" src="../<?= $recru->photo_e?>" alt="avatar">
                                                            </a>
                                                        </div>
                                                    </td> 
                                                   
                                                    <td>
                                                        <div><?= $recru->nom_e?></div>
                                                        <div class="text-muted"><?= $recru->telephone_e?></div>
                                                    </td>
                                                    <td><?= $recru->nb?></td>
                                                    <td><?= $recru->sigle_e?></td>
                                                </tr>
                                                 
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        




                           <div class="col-xl-5 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Donnees Statistiques</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                        <div class="item-action dropdown ml-2">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-lg-4 col-4 border-right">
                                            <label class="mb-0 font-10">Pays</label>
                                            <h4 class="font-20 font-weight-bold"><?= count($nombrePays)?></h4>
                                        </div>
                                        <div class="col-lg-4 col-4 border-right">
                                            <label class="mb-0 font-10">Total Recruteur</label>
                                            <h4 class="font-20 font-weight-bold"><?php echo count($recruteur);?></h4>
                                        </div>
                                        <div class="col-lg-4 col-4">
                                            <label class="mb-0 font-10">Total Candidat</label>
                                            <h4 class="font-20 font-weight-bold"><?= count($utilisateur)?></h4>
                                        </div>
                                    </div>
                                    <table class="table table-striped mt-4">
                                        <tbody>
                                        <?php 
                                                $nbrs=count($preferences);
                                                foreach($preferences as $pre){?>    
                                        <tr>
                                            <td>
                                              
                                                <label class="d-block"><?=$pre->nom_categorie?><span class="float-right"><?=$pre->nombre*100/$nbrs?>%</span></label>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-indigo" role="progressbar" aria-valuenow="<?=$pre->nombre*100/$nbrs?>" aria-valuemin="0" aria-valuemax="100" style="width: 43%;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                      <?php  }?>
                                      
                                    </tbody></table> 
                                </div>
                               
                            </div>
                        </div>





                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">candidats avec le plus de candidature</h3>
                                        <div class="card-options">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0 text-nowrap">
                                                <thead>
                                              
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nom</th>
                                                        <th>prenom</th>
                                                        <th>Date Inscription</th>
                                                        <th>contact</th>
                                                        <th>Email</th>
                                                        <th>supprimer</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                <?php foreach($bestcandidat as $can){?>
                                                    <tr>
                                                        <td><?= $can->id_utilisateur?></td>
                                                        <td><?= $can->nom?></td>
                                                        <td><?= $can->prenom?></td>
                                                        <td><?= $can->date_inscription?></td>
                                                        <td>
                                                            <span class="tag tag-success"><?= $can->telephone?></span>
                                                        </td>
                                                        <td><?= $can->email?></td>
                                                        <td>
                                                            
                                                            <a href="../Actions.php?deleteUser=<?= $can->id_utilisateur?>"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Start main footer -->
        <div class="section-body">
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            Copyright © 2023 <a href="https://themeforest.net/user/puffintheme/portfolio"> par Soukroumde Ki Saltani  </a>.
                        </div>
                        
                    </div>
                </div>
            </footer>
        </div>
    </div>    
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start all plugin js -->
<script src="../assets/bundles/counterup.bundle.js"></script>
<script src="../assets/bundles/apexcharts.bundle.js"></script>
<script src="../assets/bundles/summernote.bundle.js"></script>

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
<script src="assets/js/page/index.js"></script>
<script src="assets/js/page/summernote.js"></script>
</body>
</html>
