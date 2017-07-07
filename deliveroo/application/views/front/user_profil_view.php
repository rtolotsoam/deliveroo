		<!-- MODAL -->
		<div class="modal fade" id="profil_user">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- MODAL HEADER -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">Votre Profil</h3>
					</div>
					<!-- END MODAL HEADER -->

					<!-- MODAL BODY -->
					<div class="modal-body">
						<div class="innerAll">
							<p id="message_error"></p>

							<form class="margin-none innerLR inner-2x">	
								
								<div class="row">

									<div class="col-md-12">

										<div class="form-group">
									    	<label for="matricule">Matricule</label>
									    	<input type="numeric" class="form-control" id="matricule" value="<?php echo $matricule; ?>" disabled />
									  	</div>

									  	<p id="prenom_error"></p>
									  	
									  	<div class="form-group">
									    	<label for="prenom"><?php echo ascii_to_entities("Prénom"); ?></label>
									    	<input type="text" class="form-control" id="prenom" value="<?php echo ascii_to_entities(ucfirst(strtolower($prenom))); ?>" placeholder="Entrer Prénom" />
									  	</div>

									  	<p id="mail_error"></p>

									  	<div class="form-group">
									    	<label for="mail">Adresse E-mail</label>
									    	<input type="mail" class="form-control" id="mail" value="<?php echo $mail; ?>" placeholder="Entrer E-mail" />
									  	</div>

										<div class="form-group">
									    	<label for="pass">Mot de passe</label>
									    	<input type="text" class="form-control" id="pass" value="<?php echo $pass; ?>" disabled />
									  	</div>

									  	<p id="modif_pass_error"></p>

									  	<div class="form-group">
									    	<label for="nouvpass">Nouveau Mot de passe</label>
									    	<input type="password" class="form-control" id="nouvpass"  placeholder="Laisser vide pour aucun changement" />
									  	</div>

									  	<div class="form-group">
									    	<label for="confnouvpass">Confirmer Nouveau Mot de passe</label>
									    	<input type="password" class="form-control" id="confnouvpass"  placeholder="Laisser vide pour aucun changement" />
									  	</div>

								  	</div>

								</div>
							</form>
						</div>
					</div>
					<!--  END MODAL BODY -->

					<!-- MODAL FOOTER -->
					<div class="modal-footer">
						<button class="btn btn-block btn-info" onclick="modifier_user_profil(<?php echo $id_user; ?>);">Modifier</button>
					</div>
					<!--  END MODAL FOOTER -->
				
				</div>
			</div> 
		</div>
		<!-- END MODAL -->
