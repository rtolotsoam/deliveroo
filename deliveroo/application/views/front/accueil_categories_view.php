<div id="content"><h1 class="content-heading bg-white border-bottom hidden">PROCESSUS</h1> 
<div class="innerAll">

    	
<!-- CONTENT -->
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="row">
			<?php 
				if(!empty($categories)){
					foreach ($categories as $val_cat) {
					
			?>
				<div class="col-md-3 columns">
					<?php 
						if($access_1 == 1 && $val_cat->fte_categories_id == 1){
					?>
					
					<div class="button"><a href="<?php echo site_url('front/accueil_traitement/'.$val_cat->fte_categories_id); ?>" class="titre_bouton"><?php echo ascii_to_entities($val_cat->libelle_categories);?></a></div>	   
					
					<?php 
						}else if($access_2 == 1 && $val_cat->fte_categories_id == 2){
					?>

					<div class="button"><a href="<?php echo site_url('front/accueil_traitement/'.$val_cat->fte_categories_id); ?>" class="titre_bouton"><?php echo ascii_to_entities($val_cat->libelle_categories);?></a></div>	   
					
					<?php 
						}else if($access_3 == 1 && $val_cat->fte_categories_id == 3){
					?>
					
					<div class="button"><a href="<?php echo site_url('front/accueil_traitement/'.$val_cat->fte_categories_id); ?>" class="titre_bouton"><?php echo ascii_to_entities($val_cat->libelle_categories);?></a></div>	   

					<?php 
						}else if($access_4 == 1 && $val_cat->fte_categories_id == 4){
					?>

					<div class="button"><a href="<?php echo site_url('front/accueil_traitement/'.$val_cat->fte_categories_id); ?>" class="titre_bouton"><?php echo ascii_to_entities($val_cat->libelle_categories);?></a></div>	   

					<?php 
						}else{
					?>

					<div class="button"><a href="#" class="titre_bouton"><i class="fa fa-lock"></i> PAS D'ACCESS</a></div>	   	

					<?php 
						}
					?>

				</div>

			<?php 
					}
				}
			?>
		</div>
	</div>
</div>
<!-- END CONTENT -->
		
		