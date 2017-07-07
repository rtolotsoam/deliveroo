
<div id="content"><h1 class="content-heading bg-white border-bottom <?php if($level != "admin"){ echo "hidden"; }?>"><a href="#ajout-traitement" data-toggle="modal" class="btn btn-success">AJOUTER TRAITEMENT</a>&nbsp;<a href="#ajout-photos-traitement" data-toggle="modal" class="btn btn-success">AJOUTER PHOTOS TRAITEMENT</a></h1> 
<div class="innerAll spacing-x2">

    	
<!-- CONTENT -->    
<div class="row <?php  if($level == "admin"){ echo "corp-info"; } ?>">
	<?php 
	
	$var_sources = $sources;
	
	foreach ($sources as $val_source) {
		 
	?>
	<div class="col-md-12">
		<div class="widget widget-inverse" >
			<div class="widget-head">
				<h4 class="heading"><?php echo strtoupper($val_source->source_info); ?></h4>
			</div>
			<div class="widget-body">
				
				

						
						<?php 
							foreach ($info_trait as $val_info) {
								$deb_proc  =  $first_proc[$val_info->fte_traitement_id];
									foreach ($deb_proc as $val_deb) {
										if ($val_info->source_info == $val_source->source_info) {
						?>

						
							<ul>
								<?php if($level == "admin"){ ?>
								<div class="row">
									<div class="col-md-9">	
								<?php } ?>		
										<li class="style_li"><button class="btn btn-block btn-warning" onclick="traiter(<?php echo $val_info->fte_traitement_id; ?> , <?php  echo $val_deb->fte_process_id; ?>)"><?php echo ascii_to_entities($val_info->info_traitement); ?></button></li>
								<?php if($level == "admin"){ ?>	
									</div>
									<div class="col-md-1">	
										<li class="style_li"><a href="<?php echo "#modifier_traitement".$val_info->fte_traitement_id; ?>" data-toggle="modal" class="btn btn-success"><i class="fa fa-pencil"></i> Modifier</a></li>
									</div>
									<div class="col-md-1">	
										<li class="style_li"><a href="#" class="btn btn-info" onclick="editer(<?php echo $val_info->fte_traitement_id; ?>); return false;"><i class="fa fa-plus"></i> Editer</a></li>
									</div>
									<div class="col-md-1">	
										<li class="style_li"><a href="<?php echo site_url("back/traitement_admin/supprimer_traitement/".$val_info->fte_traitement_id); ?>" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
									</div>
								</div>
								<?php } ?>
							</ul> 
										

										<!-- MODAL -->
										<div class="modal fade" id="<?php echo "modifier_traitement".$val_info->fte_traitement_id; ?>">
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
															<p id="<?php echo "message_error_modif".$val_info->fte_traitement_id; ?>"></p>
															<form class="margin-none innerLR inner-2x">
																<div class="form-group">
																	<input type="text" class="form-control hidden" value="<?php echo $val_info->fte_traitement_id; ?>" id="<?php echo "id_traitement_modif".$val_info->fte_traitement_id; ?>" />
																</div>	
																<div class="form-group">
															    	<label for="<?php echo "libelle_traits_modif".$val_info->fte_traitement_id; ?>">Libelle du traitement</label>
															    	<input type="text" class="form-control" value="<?php echo ascii_to_entities($val_info->info_traitement); ?>" id="<?php echo "libelle_traits_modif".$val_info->fte_traitement_id; ?>" placeholder="Entrer Libelle traitement" />
															  	</div>
															  	<div class="form-group">
															    	<label for="<?php echo "source_trait_modif".$val_info->fte_traitement_id; ?>">Source du traitement</label>
															    	<select class="form-control" id="<?php echo "source_traits_modif".$val_info->fte_traitement_id; ?>">
																		<?php foreach ($var_sources as $val_var_source) { ?>
																		<option value="<?php echo $val_var_source->source_info; ?>" <?php if($val_var_source->source_info == $val_source->source_info){ echo "selected";} ?>><?php echo $val_var_source->source_info; ?></option>
																		<?php } ?>
																	</select>
															  	</div>
															  	<div class="form-group">
															    	<label for="source-traits">Activation du traitement</label>
															    	<select class="form-control" id="<?php echo "flag_traits_modif".$val_info->fte_traitement_id; ?>">
																		<option value="0" <?php if($val_info->flag == 0){ echo "selected"; } ?>>désactiver</option>
																		<option value="1" <?php if($val_info->flag == 1){ echo "selected"; } ?>>activer</option>
																	</select>
															  	</div>
															</form>
														</div>
													</div>
													<!--  END MODAL BODY -->

													<!-- MODAL FOOTER -->
													<div class="modal-footer">
														<button class="btn btn-block btn-info" id="modifier_traits" onclick="modifier_traitement(<?php echo $val_info->fte_traitement_id; ?>)">Modifier</button>
													</div>
													<!--  END MODAL FOOTER -->
												
												</div>
											</div> 
										</div>
										<!-- END MODAL -->

						

						<?php
										}
									} 
							}
						?>
						
				
				
			</div>	
		</div>		
	</div>
	<?php
	}
	?>


	<!-- MODAL -->
	<div class="modal fade" id="ajout-traitement">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- MODAL HEADER -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Ajouter traitement</h3>
				</div>
				<!-- END MODAL HEADER -->

				<!-- MODAL BODY -->
				<div class="modal-body">
					<div class="innerAll">
						<p id="message_error"></p>
						<form class="margin-none innerLR inner-2x">
							<div class="form-group">
						    	<label for="libelle_traits">Libelle du traitement</label>
						    	<input type="text" class="form-control" id="libelle_traits" placeholder="Entrer Libelle traitement" />
						  	</div>
						  	<div class="form-group">
						    	<label for="source-traits">Source du traitement</label>
						    	<select class="form-control" id="source_traits">
						    		<?php 
						  
						    		foreach ($sources as $val_source) { 
						    		
						    		?>
									<option value="<?php echo $val_source->source_info; ?>"><?php echo $val_source->source_info; ?></option>
									<?php 
									}
									?>
								</select>
						  	</div>
						  	<div class="form-group">
						    	<label for="nouveau_source_traits">Nouveau Source traitement</label>
						    	<input type="text" class="form-control" id="nouveau_source_traits" placeholder="Entrer nouveau source traitement Sinon laisser vide" />
						  	</div>
						</form>
					</div>
				</div>
				<!--  END MODAL BODY -->

				<!-- MODAL FOOTER -->
				<div class="modal-footer">
					<button class="btn btn-block btn-info" id="bouton_ajout_traits" onclick="ajout_traitement()">Ajouter</button>
				</div>
				<!--  END MODAL FOOTER -->
			
			</div>
		</div> 
	</div>
	<!-- END MODAL -->



</div>
<!-- END CONTENT -->


	
		
		
		