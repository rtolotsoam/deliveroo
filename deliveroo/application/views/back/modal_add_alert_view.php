<!-- MODAL -->
<div class="modal fade" id="ajouter_alert" style="z-index:10001 !important;">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- MODAL HEADER -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="modal-title"><span class="label label-inverse">Création d'une alerte</span></h2>
			<div style="display:none;" class="alert alert-success" id="id_warning_a" align="center">Enregistrement effectué!</div>
			<div class="alert alert alert-danger" style="display:none;" id="warning_a">
				<strong>Il y a eu une erreur sur la date.</strong>
			</div>
			</div>
			<!-- END MODAL HEADER -->

			<!-- MODAL BODY -->
			<div class="modal-body" id="mod_content">
				<div class="row">
					    <div class="col-xs-12 col-md-12  col-lg-6">
					        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
					            <div class="form-group">
							    	<label for="matricule_alert">Matricule : </label>
							    	<select id="matricule_alert" class="form-control select2" multiple="multiple">
									  <?php 
									  	$content  		 ="";
									  	$content 		.="<option selected value ='all' >--Toutes--</option>";
									  	foreach ($users_modal as  $value) {
									  		$matricule 	 = $value->matricule;
									  		$prenom      = $value->prenom;
											$content    .="<option value ='".$matricule."' >".$matricule." - ".$prenom."</option>";
									  	}
									  	echo $content;
									  ?>
									</select>
								</div>
					        </div>
					    </div>
					    <div class="col-xs-12 col-md-12  col-lg-6">
						    <div class="form-group">
						        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
						            <div class="row">	
						            	<div class = "col-md-6">
						            		 <label for="alert_deb">Date début : </label>
											 <input type="text" class="form-control datedeb_edit" id="alert_deb" data-format="dd/MM/yyyy" value='<?php echo date("d/m/Y");?>' />
						            	</div>
						            	<div class = "col-md-6">
						            		 <label for="alert_fin">Date fin : </label>
											 <input type="text" class="form-control datefin_edit" id="alert_fin" value='<?php echo date("d/m/Y");?>' />
						            	</div>
						            </div>	
								</div>
						        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
						            <label for="alert_categ">Catégorie : </label>
									<select id="alert_categ" class="form-control">
									  <?php 
									  	$content_cat  		 ="";
									  	$content_cat 		.="<option selected value ='0' >--Toutes--</option>";
									  	foreach ($categories as  $categorie) {
									  		$li_cate 	 	 = $categorie->libelle_categories;
									  		$id_cat        		 = $categorie->fte_categories_id;
											$content_cat    .="<option value ='".$id_cat."' >".$li_cate."</option>";
									  	}
									  	echo $content_cat;
									  ?>
									</select>
								</div>
							</div>
					    </div>
					   </div>  <!--  END  row -->


					   <div class="row">
							<div class="form-group">
								<div class="col-xs-12 col-md-12  col-lg-6">
									<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
										<div class="form-group">
											<label for="matricule_alert">Type d'alerte : </label>
											<select id="typ_alert" class="form-control">
											  <option  value ='0' >--Aucun--</option>
													<option selected value ='1' >Offre promo</option>
													<option  value ='2' >Intermpérie</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-md-12  col-lg-6">
									<div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
										<div class="row">	
											<div class = "col-md-12">
						            		 <label for="alert_type">Type (chaleur, neige, ...) : </label>
											<select id="alert_type" class="form-control">
												<option selected value ='0' >--Toutes--</option>
												<?php 
													$content_all_type ="";
													foreach ($all_type as $value_type) {
														$content_all_type .="<option value='".$value_type->id_type."'>".$value_type->type."</option>";
													}
													echo $content_all_type;
												?>
											</select>
											</div>
						            	
										</div>	
									</div>
								</div>
							</div>  <!--  END  row -->
						</div>

					   <div class="row">
					   <div class="form-group">
					    <div class="col-xs-12 col-md-12  col-lg-6">
					        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
					            
							    	<label for="type_alert_zone">Zone : </label>
							    	<?php echo $all_zone; ?>
								</div>
					        
					    </div>
					    <div class="col-xs-12 col-md-12  col-lg-6">
						    
						        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
						            <div class="row">	
						            	<div class = "col-md-12">
						            		 <label for="montant">Montant (€) : </label>
										     <input type="text" id="montant" required pattern="[0-9]*.?[0-9]{0,2}|[0-9]*,?[0-9]{0,2}|[0-9]*" class="form-control" 
										     onblur="if (!this.checkValidity()){val = this.value;res = val.match(/[0-9]*.?[0-9]{0,2}|[0-9]*,?[0-9]{0,2}|[0-9]*/g);this.value = res[0];}"
										     />
										</div>
						            	
						            </div>	
								</div>
						       
							
					    </div>
					   </div> 
					   </div>
					   <div class="row">
					   		<div class="col-xs-12 col-md-12  col-lg-12">
					   			<label for="montant">Description : </label>
					   			<textarea id='alert_insert' class='form-control' rows='4' style='resize:none;'></textarea>
					   			<?php  echo display_ckeditor($alert_10); ?>
					   		</div>	
					   </div> 
					   	
					   	</br>
					<div class="row">
						<div class="form-group">
							
							<div class="col-md-2" >
								<button class="btn btn-default" data-dismiss="modal" style="float:left !important;"  aria-hidden="true">
									Annuler
								</button>
							</div>
							<div class="col-md-4" >
								<button class="btn btn-inverse btn-stroke" style="float:right !important;" id="send_alert">
									<i class="fa fa-exclamation-circle"></i>
									Envoyer l'alerte
								</button>
							</div>
							<div class="col-md-4" >
								
							</div>
						</div>
    				</div>
					</div>


    			</br>
    		
			</div> <!--  END MODAL BODY -->

	</div>
</div>
</div>
