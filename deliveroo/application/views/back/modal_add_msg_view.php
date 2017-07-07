<!-- MODAL -->
<div class="modal fade" id="ajouter_msg" style="z-index:10001 !important;">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- MODAL HEADER -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="modal-title"><span class="label label-success">Création d'un message</span></h2>
			<div style="display:none;" class="alert alert-success" id="id_warning" align="center">Enregistrement effectué!</div>
			<div class="alert alert alert-danger" style="display:none;" id="warning">
				<strong>Il y a eu une erreur sur la date.</strong>
			</div>
			</div>
			<!-- END MODAL HEADER -->

			<!-- MODAL BODY -->
			<div class="modal-body" id="mod_content">
				<div class="innerAll">
					
					<div class="row">
					    <div class="col-xs-12 col-md-12  col-lg-6">
					        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
					            <div class="form-group">
							    	<label for="matricule">Matricule : </label>
							    	<select id="matricule" class="form-control select2" multiple="multiple">
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
						            		 <label for="msg_deb">Date début : </label>
											 <input type="text" class="form-control" id="msg_deb" data-format="dd/MM/yyyy" value='<?php echo date("d/m/Y");?>' />
						            	</div>
						            	<div class = "col-md-6">
						            		 <label for="msg_fin">Date fin : </label>
											 <input type="text" class="form-control" id="msg_fin" value='<?php echo date("d/m/Y");?>' />
						            	</div>
						            </div>	
								</div>
						        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
						            <label for="categ">Catégorie : </label>
									<select id="categ" class="form-control">
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
					</div>

					<div class="row">
						<div class="form-group">
							<div class=" col-md-12">
						            <div class="form-group">
								    	<label for="objet">Objet : </label>
								    	<p>
								    		<input type="text" id="objet" class="form-control">
								    	</p>
									</div>
						        </div>
					    		
						</div>
    				</div>

					<div class="row">
						<div class="form-group">
							<div class=" col-md-12">
						            <div class="form-group">
								    	<label for="message">Description : </label>
								    	<p>
								    		<textarea id='msg_insert' class='form-control' rows='4' style='resize:none;'></textarea>
																<?php  echo display_ckeditor($msg_10); ?>
								    	</p>
									</div>
						        </div>
					    		
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
								<button class="btn btn-success btn-stroke" style="float:right !important;" id="send_msg">
									<i class="fa fa-envelope"></i>
									Envoyer le message
								</button>
							</div>
							<div class="col-md-4" >
								
							</div>
						</div>
    				</div>
    			

    				
			<!--  END MODAL BODY -->
		</div>
	</div>
</div>