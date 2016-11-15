<body class=" loginWrapper"><!-- DEBUT CORPS DE LA PAGE-->
	
<div id="content"><h4 class="innerAll margin-none border-bottom text-center"><i class="fa fa-lock"></i> Connexion</h4>


<!-- FORMULAIRE DE CONNEXION -->
<div class="login spacing-x2">
	<div class="placeholder text-center logo"><?php echo img('deliveroo_logo.png','logo-deliveroo'); ?></div>
	<div class="col-sm-6 col-sm-offset-3">
		<div class="panel panel-default">
			<div class="panel-body innerAll">
		  		<form role="form">

		  			<!-- AFFICHAGE D'ERREUR -->
		  			<div id="message"> 
			  		</div>
			  		<!-- END AFFICHAGE D'ERREUR -->

		  	  		<div class="form-group">
			    		<label for="matricule">Matricule</label>
		    			<input type="text" class="form-control" id="matricule" name="matricule" placeholder="Entrer matricule">
			  		</div>

			  		<div id="error_matricule"> 
			  		</div>

			  		<div class="form-group">
			    		<label for="motdepass">Mot de passe</label>
			    		<input type="password" class="form-control" id="pass" name="pass" placeholder="Entrer mot de passe">
			  		</div>
					
					<div id="error_pass"> 
			  		</div>

			  		<button type="submit" id="submit" class="btn btn-success btn-block">Se connecter</button>
		
				</form>
		  	</div>
		</div>
	</div>
</div>
<!-- END FORMULAIRE DE CONNEXION -->