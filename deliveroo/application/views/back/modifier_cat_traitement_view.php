		<!-- MODAL -->
		<div class="modal fade" id="modifier-cat-traitement-<?php echo $id_cat_trait; ?>">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- MODAL HEADER -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">Modifier <?php echo ascii_to_entities("Catégories"); ?></h3>
					</div>
					<!-- END MODAL HEADER -->

					<!-- MODAL BODY -->
					<div class="modal-body">
						<div class="innerAll">
							<p id="message_error_modif_<?php echo $id_cat_trait; ?>"></p>
							<form class="margin-none innerLR inner-2x">	
								<div class="form-group">
									<p id="error_libelle_<?php echo $id_cat_trait; ?>"></p>
							    	<label for="libelle_cat_trait_modif_<?php echo $id_cat; ?>">Libelle du <?php echo ascii_to_entities("Catégories"); ?></label>
							    	<input type="text" class="form-control" value="<?php echo ascii_to_entities($libelle_cat_trait); ?>" id="libelle_cat_trait_modif_<?php echo $id_cat_trait; ?>" placeholder="Entrer Libelle sous catégories" />
							  	</div>
							  	<div class="form-group">
							  		<p id="error_cont_<?php echo $id_cat_trait; ?>"></p>
							    	<label for="cont_cat_modif_<?php echo $id_cat_trait; ?>">Contenu du <?php echo ascii_to_entities("Catégories"); ?></label>
							    	<input type="text" class="form-control" value="<?php echo ascii_to_entities($cont_cat_trait); ?>" id="cont_cat_trait_modif_<?php echo $id_cat_trait; ?>" placeholder="Entrer Contenu sous catégories" />
							  	</div>
							  	<div class="form-group">
							    	<label for="flag_cat_trait_modif_<?php echo $id_cat_trait; ?>">Visibilité</label>
							    	<select class="form-control" id="flag_cat_trait_modif_<?php echo $id_cat_trait; ?>">
										
										<option value="0" <?php if( $flag_cat_trait==0){ echo "selected"; } ?>><?php echo ascii_to_entities("Désactiver"); ?></option>
										<option value="1" <?php if( $flag_cat_trait==1){ echo "selected"; } ?>><?php echo ascii_to_entities("Activer"); ?></option>
									
									</select>
							  	</div>
							</form>
						</div>
					</div>
					<!--  END MODAL BODY -->

					<!-- MODAL FOOTER -->
					<div class="modal-footer">
						<button class="btn btn-block btn-info" onclick="modifier_cat_traitement(<?php echo $id_cat_trait; ?>);">Modifier</button>
					</div>
					<!--  END MODAL FOOTER -->
				
				</div>
			</div> 
		</div>
		<!-- END MODAL -->