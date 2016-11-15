		<!-- MODAL -->
		<div class="modal fade" id="ajouter-user">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- MODAL HEADER -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">Ajouter Nouveau Utilisateur</h3>
					</div>
					<!-- END MODAL HEADER -->

					<!-- MODAL BODY -->
					<div class="modal-body">
						<div class="innerAll">
							<p id="message_error"></p>

							<form class="margin-none innerLR inner-2x">	
								
								<div class="row">

									<div class="col-md-6">
										
										<p id="matricule_error"></p>

										<div class="form-group">
									    	<label for="matricule">Entrer Matricule</label>
									    	<input type="numeric" class="form-control" id="matricule" placeholder="Entrer Matricule" />
									  	</div>

									  	<p id="prenom_error"></p>
									  	
									  	<div class="form-group">
									    	<label for="prenom">Entrer <?php echo ascii_to_entities("Prénom"); ?></label>
									    	<input type="text" class="form-control" id="prenom" placeholder="Entrer Prénom" />
									  	</div>

									  	<p id="mail_error"></p>

									  	<div class="form-group">
									    	<label for="mail">Entrer Adresse E-mail</label>
									    	<input type="mail" class="form-control" id="mail" placeholder="Entrer E-mail" />
									  	</div>

									  	<p id="pass_error"></p>

										<div class="form-group">
									    	<label for="pass">Entrer Mot de passe</label>
									    	<input type="password" class="form-control" id="pass" placeholder="Entrer Mot de passe" />
									  	</div>

									  	<div class="form-group">
									    	<label for="confpass">Confirmer Mot de passe</label>
									    	<input type="password" class="form-control" id="confpass" placeholder="Comfirmer Mot de passe" />
									  	</div>
								  	</div>

								  	<div class="col-md-6">
								  	
								  		<div class="form-group">
									    	<label for="level">Choisir le type d'utilisateur</label>
									    	<select class="form-control" id="level">
									    		<option value="user">Utilisateur</option>
												<option value="admin">Admin</option>
											</select>
									  	</div>

									  	<div class="form-group">
									    	<label for="statut">Choisir statut</label>
									    	<select class="form-control" id="statut">
									    		<option value="1"><?php echo ascii_to_entities("Activer"); ?></option>
												<option value="0"><?php echo ascii_to_entities("Désactiver"); ?></option>
											</select>
									  	</div>

									<div id="gestion_droit"> 	
									
									  	<div class="form-group">
									    	<label for="access_1"><?php echo ascii_to_entities("Accès"); ?> DELIVERY SUPPORT</label>
									    	<select class="form-control" id="access_1">
												<option value="1"><?php echo ascii_to_entities("Oui"); ?></option>
												<option value="0"><?php echo ascii_to_entities("Non"); ?></option>
											</select>
									  	</div>
									  	<div class="form-group">
									    	<label for="access_2"><?php echo ascii_to_entities("Accès"); ?> RESTAURANT SUPPORT</label>
									    	<select class="form-control" id="access_2">
												<option value="1"><?php echo ascii_to_entities("Oui"); ?></option>
												<option value="0"><?php echo ascii_to_entities("Non"); ?></option>
											</select>
									  	</div>
									  	<div class="form-group">
									    	<label for="access_3"><?php echo ascii_to_entities("Accès"); ?> CUSTOMER SUPPORT</label>
									    	<select class="form-control" id="access_3">
												<option value="1"><?php echo ascii_to_entities("Oui"); ?></option>
												<option value="0"><?php echo ascii_to_entities("Non"); ?></option>
											</select>
									  	</div>
									  	<div class="form-group">
									    	<label for="access_4"><?php echo ascii_to_entities("Accès"); ?> ORDER MONITORING</label>
									    	<select class="form-control" id="access_4">
												<option value="1"><?php echo ascii_to_entities("Oui"); ?></option>
												<option value="0"><?php echo ascii_to_entities("Non"); ?></option>
											</select>
									  	</div>
									</div>
									<div id="gestion_role">
								  		<p id="gestion_ug"></p>

								  		<div class="form-group">
									    	<label for="gestion_u"><?php echo ascii_to_entities("Accès"); ?> GESTION UTILISATEURS</label>
									    	<select class="form-control" id="gestion_u">
									    		<option value="0"><?php echo ascii_to_entities("Non"); ?></option>
												<option value="1"><?php echo ascii_to_entities("Oui"); ?></option>
											</select>
									  	</div>

									  	<div class="form-group">
									    	<label for="gestion_g"><?php echo ascii_to_entities("Accès"); ?> GESTION PROCESSUS</label>
									    	<select class="form-control" id="gestion_g">
												<option value="0"><?php echo ascii_to_entities("Non"); ?></option>
												<option value="1"><?php echo ascii_to_entities("Oui"); ?></option>
											</select>
									  	</div>
									</div>

								  	</div>

								</div>  	
							</form>
						</div>
					</div>
					<!--  END MODAL BODY -->

					<!-- MODAL FOOTER -->
					<div class="modal-footer">
						<button class="btn btn-block btn-info" onclick="ajout_user();">Ajouter</button>
					</div>
					<!--  END MODAL FOOTER -->
				
				</div>
			</div> 
		</div>
		<!-- END MODAL -->

		<script>
		$(document).ready(function(){
			var lev = $('#level').val();

			if(lev == "user"){

				$('#gestion_role').addClass('hidden');

				console.log(lev);

			}

			$('#level').change(
				function(){

					var lev2 = $('#level').val();

					if(lev2 == "admin"){

						$('#gestion_role').removeClass('hidden');

						$('#gestion_droit').addClass('hidden');
						
						console.log(lev2);
					}else{

						$('#gestion_role').addClass('hidden');

						$('#gestion_droit').removeClass('hidden');
						

						console.log(lev2);
					}


				}
			);

		});
		</script>