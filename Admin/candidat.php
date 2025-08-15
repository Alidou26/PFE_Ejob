<?php

require('../BaseDeDonnees.php');
session_start();
require('../functions.php');
$utilisateur=utilisateur();

include("ActionRecherche.php");

include("header.php");
?>


        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Candidat</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ejob</a></li>
                            <li class="breadcrumb-item active" aria-current="page">candidat</li>
                        </ol>
                    </div>
                  
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Student-all">
                        <div class="card">
                            <div class="card-body">
                            <form action="" method="GET">
                                <div class="row">
                                  
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Pseudo" name="pseudo">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Nom" name="nom">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="prenom" name="prenom">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-2 col-md-4 col-sm-6">
                                        <button type="submit"  class="btn btn-sm btn-primary btn-block" > RECHERCHER</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive card">
                            <table class="table table-hover table-vcenter table-striped mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th></th>
                                        <th>prenom</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Date Inscription</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($resultats) && !empty($resultats)){foreach($resultats as $ca){?>
          
                                    <tr>
                                        <td style=" border: 1px solid blue;"><?=$ca->id_utilisateur?></td>
                                        <td class="w60">
                                            <img class="avatar" src="../<?=$ca->photo?>" alt="">
                                        </td>
                                        <td><span class="font-16"><?=$ca->nom?></span></td>
                                        <td><?=$ca->prenom?></td>
                                        <td><?=$ca->email?></td>
                                        <td><?=$ca->telephone?></td>
                                        <td><?=$ca->date_inscription?></td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Voir les postes"> <a href="publication.php?id=<?=$ca->id_utilisateur?>"><i class="fa fa-eye"></a></i></button>
                                            <a href="profil.php?id=<?=$ca->id_utilisateur?>">  <button class="btn btn-primary btn-icon-text btn-edit-profile" title="Modifier" ><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Supprimer"><a href="../actions.php?deleteUser=<?=$ca->id_utilisateur?>"><i class="fa fa-trash-o text-danger"></i> </a></button>
                                        </td>
                                    </tr>
                                    <?php }}?>

                                <?php foreach($utilisateur as $can){?>
                                    <tr>
                                        <td><?=$can->id_utilisateur?></td>
                                        <td class="w60">
                                            <img class="avatar" src="../<?=$can->photo?>" alt="">
                                        </td>
                                        <td><span class="font-16"><?=$can->nom?></span></td>
                                        <td><?=$can->prenom?></td>
                                        <td><?=$can->email?></td>
                                        <td><?=$can->telephone?></td>
                                        <td><?=$can->date_inscription?></td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="View"> <a href="publication.php?id=<?=$can->id_utilisateur?>"><i class="fa fa-eye"></a></i></button>
                                            <a href="profil.php?id=<?=$can->id_utilisateur?>">  <button class="btn btn-primary btn-icon-text btn-edit-profile" ><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete"><a href="../actions.php?deleteUser=<?=$can->id_utilisateur?>"><i class="fa fa-trash-o text-danger"></i> </a></button>
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
      <?php
      include("footer.php");
      ?>


    </div>    
</div>


<!-- Start Main project js, jQuery, Bootstrap -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<!-- Start Plugin Js -->
<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/plugins/dropify/js/dropify.min.js"></script>
<script src="../assets/bundles/summernote.bundle.js"></script>
<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>



<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
<script src="assets/js/form/dropify.js"></script>
<script src="assets/js/page/summernote.js"></script>
<script src="assets/js/page/dialogs.js"></script>


</body>
</html>
