		<!-- MODAL -->
		<div class="modal fade" id="modifier-categorie-<?php echo $id_cat; ?>">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- MODAL HEADER -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">Modifier traitement</h3>
					</div>
					<!-- END MODAL HEADER -->

					<!-- MODAL BODY -->
					<div class="modal-body">
						<div class="innerAll">
							<p id="message_error_modif_<?php echo $id_cat; ?>"></p>
							<form class="margin-none innerLR inner-2x">	
								<div class="form-group">
							    	<label for="libelle_cat_modif_<?php echo $id_cat; ?>">Libelle du traitement</label>
							    	<input type="text" class="form-control" value="<?php echo ascii_to_entities($libelle_cat); ?>" id="libelle_cat_modif_<?php echo $id_cat; ?>" placeholder="Entrer Libelle sous catégories" />
							  	</div>
							  	<div class="form-group">
							    	<label for="sous_cat_modif_<?php echo $id_cat; ?>">Choisir les sous catégories</label>
							    	<select class="form-control" id="sous_cat_modif_<?php echo $id_cat; ?>">
										<?php
										foreach ($lst_cat as $val_cat) {
										
										?>

											<option value="<?php echo $val_cat->fte_categories_id; ?>" <?php if( $val_cat->fte_categories_id==$parent_cat){ echo "selected"; } ?>><?php echo ascii_to_entities($val_cat->libelle_categories); ?></option>
										
										<?php
										}
										
										?>
									</select>
							  	</div>
							  	<div class="form-group">
							    	<label for="flag_cat_modif_<?php echo $id_cat; ?>">Visibilité</label>
							    	<select class="form-control" id="flag_cat_modif_<?php echo $id_cat; ?>">
										
										<option value="0" <?php if( $flag_cat==0){ echo "selected"; } ?>><?php echo ascii_to_entities("Désactiver"); ?></option>
										<option value="1" <?php if( $flag_cat==1){ echo "selected"; } ?>><?php echo ascii_to_entities("Activer"); ?></option>
									
									</select>
							  	</div>
							</form>
						</div>
					</div>
					<!--  END MODAL BODY -->

					<!-- MODAL FOOTER -->
					<div class="modal-footer">
						<button class="btn btn-block btn-info" onclick="modifier_categories(<?php echo $id_cat; ?>, <?php echo $id_cat_trait; ?>)">Modifier</button>
					</div>
					<!--  END MODAL FOOTER -->
				
				</div>
			</div> 
		</div>
		<!-- END MODAL -->