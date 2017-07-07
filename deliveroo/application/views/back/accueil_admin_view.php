<div id="content" >
	<h1 style="z-index:1 !important;" class="content-heading bg-white border-bottom <?php if($level != "admin"){ echo "hidden"; }?>">
		
		<div class="row" style="z-index:0 !important;">
			<div class="col-md-4"> 
	    		<a href="#ajout-traitement" data-toggle="modal" class="btn btn-success">AJOUTER TRAITEMENT</a>
	    	</div>
	    	
	    	<div class="col-md-8"> 
		    	<div class="form-group">
			    	<label for="source-cat">Choisir le <?php echo ascii_to_entities("catégorie"); ?>: </label>

			    	<select id="source-cat" onchange="charge_categories()">
			    		<?php 
			    		if(!empty($liste_cat) && !empty($id_cat)){ 
			    			foreach ($liste_cat as $val_select) {
			    		?>
						<option value="<?php echo $val_select->fte_categories_id; ?>" <?php if($id_cat==$val_select->fte_categories_id) echo "selected"; ?>><?php echo ascii_to_entities($val_select->libelle_categories); ?></option>
						<?php
							}
						} 
						?>
					</select>
					<i id="spin" style="display:none;" class="fa fa-spinner fa-spin"></i>
				</div>

				
				

			</div>
		</div>
		
	</h1> 
<div class="innerAll spacing-x2">

    	
<!-- CONTENT -->    
<div class="row <?php  if($level == "admin"){ echo "corp-info"; } ?>">
	<?php 
	
	if(!empty($categories)){

		foreach ($categories as $val_cat) {
		 

		 	$traits = $lst_cat[$val_cat->fte_categories_id];

		 
	?>
	<div class="col-md-12">
		<div class="widget widget-inverse" >
			<div class="widget-head">
				<div class="row">
					<div class="col-md-10">	
						<h4 class="heading">
							<?php echo strtoupper(ascii_to_entities($val_cat->libelle_categories)); ?>&nbsp;<?php echo ascii_to_entities("( ".$val_cat->contenu_categorie." )"); ?>							
								
						</h4>
					</div>
					<div class="col-md-1">
							
						<a style="margin-bottom : 4px !important;" href="#modifier-cat-traitement-<?php echo $val_cat->fte_categories_id;  ?>" data-toggle="modal" class="btn btn-success"><i class="fa fa-pencil"></i> Modifier</a>
						
					</div>
					<div class="col-md-1">	
						
						<a style="margin-bottom : 4px !important;" href="#supprimer-traitement-<?php echo $val_cat->fte_categories_id;  ?>" data-toggle="modal" class="btn btn-danger"><i class="fa fa-times"></i></a>
						
					</div>
				</div>	
			</div>
			<div class="widget-body">
				
				

						
						<?php 
								if(!empty($traits)){
									foreach ($traits as $val_trait) {

									$deb_procs = $deb_proc[$val_trait->fte_categories_id];

						?>

						
							<ul>
								
								<div class="row">
									<div class="col-md-9">	
										<?php 
											if(!empty($deb_procs)){
												foreach ($deb_procs as $val_deb) {
												
										?>
											<li class="style_li"><button class="btn btn-block btn-warning" onclick="traiter(<?php echo $val_trait->traitement_id; ?> , <?php  echo $val_deb->fte_process_id; ?>)"><?php echo ascii_to_entities($val_trait->libelle_categories); ?></button></li>
										
										<?php 
												}
											}
										?>
									</div>
									<div class="col-md-1">	
										<li class="style_li"><a href="#modifier-categorie-<?php echo $val_trait->fte_categories_id; ?>" data-toggle="modal" class="btn btn-success"><i class="fa fa-pencil"></i> Modifier</a></li>
									</div>
									<div class="col-md-1">	
										<li class="style_li"><a href="#" onclick="editer(<?php echo $val_trait->traitement_id; ?>); return false;" class="btn btn-info"><i class="fa fa-plus"></i> Editer</a></li>
									</div>
									<div class="col-md-1">	
										<li class="style_li"><a href="#supprimer-categorie-<?php echo $val_trait->fte_categories_id; ?>" data-toggle="modal" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
									</div>
								</div>
								
							</ul> 
						<?php
							}
						}
						?>
						
				
				
			</div>	
		</div>		
	</div>
	<?php
		}
	}
	?>

</div>
<!-- END CONTENT -->


	
		
		
		