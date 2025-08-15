<!-- Sign In Popup
================================================== -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li><a href="#login">Connexion</a></li>
			<li><a href="#register2">Utilisateur</a></li>
			<li><a href="#register">Entreprise</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Login -->
			<div class="popup-tab-content" id="login">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Nous sommes heureux de vous revoir!!</h3>
					<span>Vous avez pas de compte? <a href="#" class="register-tab">Inscris-toi!</a></span>
				</div>
					
				<!-- Form -->
				<form method="post" id="login-form">
					<div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="pseudo" id="emailaddress" placeholder="PSEUDO" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="mot_de_passe" id="password" placeholder="MOT DE PASSE" required/>
					</div>

                    <div class="alert alert-warning" role="alert">   </div>

				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="login-form">Se Connecter <i class="icon-material-outline-arrow-right-alt"></i></button>
				
				<!-- Social Login -->
				<div class="social-login-separator"><span>OU</span></div>
				<div class="social-login-buttons" style="padding-left:35%;">
					<a href="face.php?connexion=true"><button class="facebook-login ripple-effect"><img src="face.jpg" style="width:80%;height:65%;"></button></a>
				</div>

			</div>

			<!-- Register -->
			<div class="popup-tab-content" id="register">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Créons votre compte!</h3>
				</div>


                       <!-- Form -->
              <form method="post" id="register-account-form-1">

				<!-- Account Type -->
				<div class="account-type">
					<div>
						<input type="radio" name="type" id="freelancer-radio" class="account-type-radio" value="utilisateur" disabled/>
						<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Utilisateur</label>
					</div>

					<div>
						<input type="radio" name="type" id="employer-radio" class="account-type-radio" value="entreprise" checked />
						<label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Entreprise</label>
					</div>
				</div>
					
				
					<div class="input-with-icon-left">
                    <i class="fa-solid fa-building"></i>
						<input type="text" class="input-text with-border" name="nom" id="emailaddress-register" placeholder="NOM" required/>
					</div>
                    <div class="input-with-icon-left">
                    <i class="fa-regular fa-building"></i>
						<input type="text" class="input-text with-border" name="sigle" id="emailaddress-register" placeholder="SIGLE" required/>
					</div>
                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-phone"></i>
						<input type="text" class="input-text with-border" name="telephone" id="emailaddress-register" placeholder="TELEPHONE" required/>
					</div>
                    <div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="email" id="emailaddress-register" placeholder="EMAIL" required/>
					</div>
					<div class="input-with-icon-left">
						<i class="fa-solid fa-calendar"></i>
						<input type="date" class="input-text with-border" name="date_de_creation" id="emailaddress-register" title="DATE DE CREATION" required/>
					</div>
					<div class="input-with-icon-left">
						<i class="fa-solid fa-sort-numeric-desc"></i>
						<input type="number" class="input-text with-border" min="0" name="employe" id="emailaddress-register" placeholder="NOMBRE EMPLOYE" required/>
					</div>
					<div class="input-with-icon-left">
						<i class="fa-solid fa-text-width "></i>
						<input type="text" class="input-text with-border" name="description" id="emailaddress-register" placeholder="DESCRIPTION" required/>
					</div>
                    
                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-user-plus"></i>
						<input type="text" class="input-text with-border" name="pseudo" id="emailaddress-register" placeholder="PSEUDO" required/>
					</div>
					<div class="input-with-icon-left" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="mot_de_passe" id="password-register" placeholder="MOT DE PASSE" required/>
					</div>

					<div class="input-with-icon-left">
                    <i class="fa-solid fa-image"></i>
						<input type="file" class="input-text with-border" name="photo" id="password-repeat-register" required/>
					</div>

					<div class="submit-field">
				
											<select data-size="7" data-live-search="true" name="pays">
											
											    <option value="" selected>Pays</option>
											    <option value="ar">Argentina</option>
												<option value="am">Armenia</option>
												<option value="aw">Aruba</option>
												<option value="au">Australia</option>
												<option value="at">Austria</option>
												<option value="az">Azerbaijan</option>
												<option value="bs">Bahamas</option>
												<option value="bh">Bahrain</option>
												<option value="bd">Bangladesh</option>
												<option value="bb">Barbados</option>
												<option value="by">Belarus</option>
												<option value="be">Belgium</option>
												<option value="bz">Belize</option>
												<option value="bj">Benin</option>
												<option value="bm">Bermuda</option>
												<option value="bt">Bhutan</option>
												<option value="bg">Bulgaria</option>
												<option value="bf">Burkina Faso</option>
												<option value="bi">Burundi</option>
												<option value="kh">Cambodia</option>
												<option value="cm">Cameroon</option>
												<option value="ca">Canada</option>
												<option value="cv">Cape Verde</option>
												<option value="ky">Cayman Islands</option>
												<option value="co">Colombia</option>
												<option value="km">Comoros</option>
												<option value="cg">Congo</option>
												<option value="ck">Cook Islands</option>
												<option value="cr">Costa Rica</option>
												<option value="ci">Côte d'Ivoire</option>
												<option value="hr">Croatia</option>
												<option value="cu">Cuba</option>
												<option value="cw">Curaçao</option>
												<option value="cy">Cyprus</option>
												<option value="cz">Czech Republic</option>
												<option value="dk">Denmark</option>
												<option value="dj">Djibouti</option>
												<option value="dm">Dominica</option>
												<option value="do">Dominican Republic</option>
												<option value="ec">Ecuador</option>
												<option value="eg">Egypt</option>
												<option value="gp">Guadeloupe</option>
												<option value="gu">Guam</option>
												<option value="gt">Guatemala</option>
												<option value="gg">Guernsey</option>
												<option value="gn">Guinea</option>
												<option value="gw">Guinea-Bissau</option>
												<option value="gy">Guyana</option>
												<option value="ht">Haiti</option>
												<option value="hn">Honduras</option>
												<option value="hk">Hong Kong</option>
												<option value="hu">Hungary</option>
												<option value="is">Iceland</option>
												<option value="in">India</option>
												<option value="id">Indonesia</option>
												<option value="no">Norway</option>
												<option value="om">Oman</option>
												<option value="pk">Pakistan</option>
												<option value="pw">Palau</option>
												<option value="pa">Panama</option>
												<option value="pg">Papua New Guinea</option>
												<option value="py">Paraguay</option>
												<option value="pe">Peru</option>
												<option value="ph">Philippines</option>
												<option value="pn">Pitcairn</option>
												<option value="pl">Poland</option>
												<option value="pt">Portugal</option>
												<option value="pr">Puerto Rico</option>
												<option value="qa">Qatar</option>
												<option value="re">Réunion</option>
												<option value="ro">Romania</option>
												<option value="ru">Russian Federation</option>
												<option value="rw">Rwanda</option>
												<option value="sz">Swaziland</option>
												<option value="se">Sweden</option>
												<option value="ch">Switzerland</option>	
											    <option value="sn">Senegal</option>
												<option value="ma">Maroc</option>
												<option value="tr">Turkey</option>
												<option value="tm">Turkmenistan</option>
												<option value="tv">Tuvalu</option>
												<option value="ug">Uganda</option>
												<option value="ua">Ukraine</option>
												<option value="gb">United Kingdom</option>
												<option value="us" >United States</option>
												<option value="uy">Uruguay</option>
												<option value="uz">Uzbekistan</option>
												<option value="ye">Yemen</option>
												<option value="zm">Zambia</option>
												<option value="zw">Zimbabwe</option>
											</select>
										</div>

									
						<input type="hidden" name="latitude" required/>
						<input type="hidden" name="longitude" required/>
					


                    <div class="alert alert-danger alert-inscription-danger" role="alert">   </div>

                    <div class="alert alert-success alert-inscription-success" role="alert">   </div>
				</form>
				
				<!-- Button -->
				<button class="margin-top-10 button full-width button-sliding-icon ripple-effect" type="submit" form="register-account-form-1">Je m'inscris<i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>


						
			
			
			
			
			
			
			
			
			
			<!-- Register -->
						<div class="popup-tab-content" id="register2">
				
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Créons votre compte!</h3>
				</div>


                       <!-- Form -->
              <form method="post" id="register-account-form">

				<!-- Account Type -->
				<div class="account-type">
					<div>
						<input type="radio" name="type" id="freelancer-radio" class="account-type-radio" value="utilisateur" checked/>
						<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Utilisateur</label>
					</div>

					<div>
						<input type="radio" name="type" id="employer-radio" class="account-type-radio" value="entreprise" disabled />
						<label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Entreprise</label>
					</div>
				</div>
					
				
					<div class="input-with-icon-left">
                    <i class="fa-solid fa-user"></i>
						<input type="text" class="input-text with-border" name="nom" id="emailaddress-register" placeholder="NOM" required/>
					</div>
                    <div class="input-with-icon-left">
                    <i class="fa-regular fa-user"></i>
						<input type="text" class="input-text with-border" name="prenom" id="emailaddress-register" placeholder="PRENOM" required/>
					</div>
                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-phone"></i>
						<input type="text" class="input-text with-border" name="telephone" id="emailaddress-register" placeholder="TELEPHONE" required/>
					</div>
                    <div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="email" id="emailaddress-register" placeholder="EMAIL" required/>
					</div>
                    
                    <div class="input-with-icon-left">
                    <i class="fa-solid fa-user-plus"></i>
						<input type="text" class="input-text with-border" name="pseudo" id="emailaddress-register" placeholder="PSEUDO" required/>
					</div>
					<div class="input-with-icon-left" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="mot_de_passe" id="password-register" placeholder="MOT DE PASSE" required/>
					</div>

					<div class="input-with-icon-left">
                    <i class="fa-solid fa-image"></i>
						<input type="file" class="input-text with-border" name="photo" id="password-repeat-register" required/>
					</div>

					<div class="submit-field">
				
											<select data-size="7"  data-live-search="true" name="pays">
											
											    <option value="" selected>Pays</option>
											    <option value="ar">Argentina</option>
												<option value="am">Armenia</option>
												<option value="aw">Aruba</option>
												<option value="au">Australia</option>
												<option value="at">Austria</option>
												<option value="az">Azerbaijan</option>
												<option value="bs">Bahamas</option>
												<option value="bh">Bahrain</option>
												<option value="bd">Bangladesh</option>
												<option value="bb">Barbados</option>
												<option value="by">Belarus</option>
												<option value="be">Belgium</option>
												<option value="bz">Belize</option>
												<option value="bj">Benin</option>
												<option value="bm">Bermuda</option>
												<option value="bt">Bhutan</option>
												<option value="bg">Bulgaria</option>
												<option value="bf">Burkina Faso</option>
												<option value="bi">Burundi</option>
												<option value="kh">Cambodia</option>
												<option value="cm">Cameroon</option>
												<option value="ca">Canada</option>
												<option value="cv">Cape Verde</option>
												<option value="ky">Cayman Islands</option>
												<option value="co">Colombia</option>
												<option value="km">Comoros</option>
												<option value="cg">Congo</option>
												<option value="ck">Cook Islands</option>
												<option value="cr">Costa Rica</option>
												<option value="ci">Côte d'Ivoire</option>
												<option value="hr">Croatia</option>
												<option value="cu">Cuba</option>
												<option value="cw">Curaçao</option>
												<option value="cy">Cyprus</option>
												<option value="cz">Czech Republic</option>
												<option value="dk">Denmark</option>
												<option value="dj">Djibouti</option>
												<option value="dm">Dominica</option>
												<option value="do">Dominican Republic</option>
												<option value="ec">Ecuador</option>
												<option value="eg">Egypt</option>
												<option value="gp">Guadeloupe</option>
												<option value="gu">Guam</option>
												<option value="gt">Guatemala</option>
												<option value="gg">Guernsey</option>
												<option value="gn">Guinea</option>
												<option value="gw">Guinea-Bissau</option>
												<option value="gy">Guyana</option>
												<option value="ht">Haiti</option>
												<option value="hn">Honduras</option>
												<option value="hk">Hong Kong</option>
												<option value="hu">Hungary</option>
												<option value="is">Iceland</option>
												<option value="in">India</option>
												<option value="id">Indonesia</option>
												<option value="no">Norway</option>
												<option value="om">Oman</option>
												<option value="pk">Pakistan</option>
												<option value="pw">Palau</option>
												<option value="pa">Panama</option>
												<option value="pg">Papua New Guinea</option>
												<option value="py">Paraguay</option>
												<option value="pe">Peru</option>
												<option value="ph">Philippines</option>
												<option value="pn">Pitcairn</option>
												<option value="pl">Poland</option>
												<option value="pt">Portugal</option>
												<option value="pr">Puerto Rico</option>
												<option value="qa">Qatar</option>
												<option value="re">Réunion</option>
												<option value="ro">Romania</option>
												<option value="ru">Russian Federation</option>
												<option value="rw">Rwanda</option>
												<option value="sz">Swaziland</option>
												<option value="se">Sweden</option>
												<option value="ch">Switzerland</option>
												<option value="sn">Senegal</option>
												<option value="ma">Maroc</option>
												<option value="tr">Turkey</option>
												<option value="tm">Turkmenistan</option>
												<option value="tv">Tuvalu</option>
												<option value="ug">Uganda</option>
												<option value="ua">Ukraine</option>
												<option value="gb">United Kingdom</option>
												<option value="us" >United States</option>
												<option value="uy">Uruguay</option>
												<option value="uz">Uzbekistan</option>
												<option value="ye">Yemen</option>
												<option value="zm">Zambia</option>
												<option value="zw">Zimbabwe</option>
											</select>
										</div>


                    <div class="alert alert-danger alert-inscription-danger" role="alert">   </div>

                    <div class="alert alert-success alert-inscription-success" role="alert">   </div>
				</form>
				
				<!-- Button -->
				<button class="margin-top-10 button full-width button-sliding-icon ripple-effect" type="submit" form="register-account-form">Je m'inscris<i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>




<script>
	function showPosition(position){
		document.querySelector('#register-account-form-1 input[name = "latitude"]').value = position.coords.latitude;
		document.querySelector('#register-account-form-1 input[name = "longitude"]').value = position.coords.longitude;
	}
	function showError(error){
		switch(error.code){
			case error.PERMISSION_DENIED:
				alert("ACTIVEZ LA PERMISSION DE VOTRE LOCALISATION");
				break;
		}
	}
	function getLocation(){
		if(navigator.geolocation){
			navigator.geolocation.getCurrentPosition(showPosition,showError);
		}
	}
	window.onload=getLocation();
</script>

<!-- Sign In Popup / End -->