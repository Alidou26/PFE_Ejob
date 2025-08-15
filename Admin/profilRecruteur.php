<?php

require('../BaseDeDonnees.php');
session_start();
require('../functions.php');

@$id=$_GET['id'];
$recruteur=recruteurbyId($id);

include("header.php");

?>




        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Profil</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ejob</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil Recruteur</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                  
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profil</a>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="row clearfix">
                  
                  
                    <div class="col-md-12">
                        <div class="tab-content " id="pills-tabContent">
                            
                           
                            <div class="tab-pane fade show active" id="pills-calendar" role="tabpanel" aria-labelledby="pills-calendar-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Modifier Profil</h3>
                                        <div class="card-options">
                                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            <div class="item-action dropdown ml-2">
                                                <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                             
                                            </div>
                                        </div>
                                    </div>
                                    <form method="POST" id="parametreUtilisateur">
                                    <div class="card-body form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">nom <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="nom" value="<?=$recruteur['nom_e']?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Sigle<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="sigle" value="<?=$recruteur['sigle_e']?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Pseudo<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="pseudo" value="<?=$recruteur['pseudo']?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Email<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="email" value="<?=$recruteur['email_e']?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Telephone<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="telephone" value="<?=$recruteur['telephone_e']?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Nombre Employer<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="nombre" value="<?=$recruteur['nombre_employe']?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Description<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="description" value="<?=$recruteur['description_e']?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Mot de passe<span class="text-danger"></span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Entrez un mot de passe" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Photo<span class="text-danger"></span></label>
                                            <div class="col-md-7">
                                                <input type="file" class="form-control" name="photo">
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" name="id" style="visibility:hidden;" value="<?=$recruteur['id_entreprise']?>">
                                    </div>

                                    <div class="alert alert-primary success" role="alert" style="width:500px; margin-left:28%;"><p>INFORMATIONS ENREGISTREES AVEC SUCCES</p></div>
                                    <div class="notification error closeable " > </div>
                                    <div class="alert alert-danger error" role="alert" style="width:500px; margin-left:28%;"></div>
                                    <hr>
                                    <div c style="margin-left:45%; padding:20px;">
                                        <input type="submit" form="parametreUtilisateur" class="btn btn-primary" value="Modifier">
                                    </div>
                                </form>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php");?>

    </div>    
</div>
<script>

$(".error").hide();
$(".success").hide();
$("#msg_pass").hide();
</script>

<script>
    $(document).ready(function(e){

$("#parametreUtilisateur").on('submit', function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'modificationR.php',
		data: new FormData(this),
		dataType: 'json',
		contentType: false,
		cache: false,
		processData:false,
		success: function(reponse){
		   if(reponse['status']==0)
		   {
			$(".success ").show();
			
			setTimeout(function(){$(".success").hide();},5000);

		   }
		   else if(reponse['status']==1){
			$("#msg_pass").show();
			
			setTimeout(function(){$("#msg_pass").hide();},5000);
			
		   }
		   else {
			
			$(".error").show();
			$(".error").html(reponse['status']);
			setTimeout(function(){$(".error").hide();},5000);
		   }
		
			}
			
		});

}) 
    });
</script>


<!-- Start Main project js, jQuery, Bootstrap -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start all plugin js -->
<script src="../assets/bundles/fullcalendar.bundle.js"></script>
<script src="../assets/bundles/knobjs.bundle.js"></script>

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
<script src="assets/js/page/calendar.js"></script>
<script src="assets/js/chart/knobjs.js"></script>
</body>
</html>
