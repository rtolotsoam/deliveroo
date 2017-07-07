
<div id="content"><h1 class="content-heading bg-white border-bottom"><?php if(isset($nb_process)) echo $nb_process; ?>&nbsp;Résultat(s) trouvé(s)</h1> 
<div class="innerAll spacing-x2">

    	
<!-- CONTENT -->  

<?php
if(isset($traitement) && !empty($traitement)){
$i = 0;
foreach ($traitement as $val_traits) {
	if(!empty($val_traits)){
	foreach ($val_traits as $val) {
		$i++;
?>

<div class="row">
	
	<div class="col-md-12">
		<div class="widget widget-inverse <?php if ($i==1) { ?> corp-info <?php } ?>">
			<div class="widget-head">
				<h4 class="heading">
					<?php

					if($val->libelle_categories){ 
						echo "<strong>".strtoupper($val->libelle_categories)."</strong>"; 
					}else{
						echo "<strong>ALERTE</strong>"; 
					}

					?>
				</h4>
			</div>
			<div class="widget-body">
							
						<?php		

						if(!empty($process)){ 
							foreach ($process as $val_pro) {	
								
								if($val->fte_categories_id == $val_pro->parent_id){	

									$deb = $first_proc[$val_pro->traitement_id];

										foreach ($deb as $val_deb) {
											
										
						?>
							
									<ul>		
										<li class="style_li"><button class="btn btn-block btn-warning" onclick="traiter(<?php echo $val_pro->traitement_id; ?> , <?php  echo $val_deb->fte_process_id; ?>)"><?php echo ascii_to_entities($val_pro->libelle_categories); ?></button></li><br>
									</ul> 


						<?php
										}	
										
								}	
								
							}
						}else{
							echo "<div class=\"alert alert-warning\" style=\"text-align: center;\">AUCUN DONNER DISPONIBLE</div>"; 
						}
						?>
						
				
				
			</div>	
		</div>		
	</div>
	
</div>

<?php
	}
}
}
}
?>
<!-- END CONTENT -->


	
		
		
		