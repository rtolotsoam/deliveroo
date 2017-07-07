<style >
.blink{
  opacity: 0;
  animation: blinking 1s linear infinite;
}

@keyframes blinking {from,49.9% {opacity: 0;}50%,to {opacity: 1;
  }
}

#hidecontent_tt{
	position : relative;
	top : 50px;
}
#allcontent_tt{
	position : relative;
	top : 50px;
}

</style>
<div id="content"><h1 class="content-heading bg-white border-bottom" style="z-index:0;"><?php if(!empty($menu)){ echo $menu;} ?></h1> 
<div class="innerAll">

<br/>
<!-- alerte-->
<div id='hidecontent_tt' class="alert alert-danger" style='width: 70% !important;margin-left: auto; margin-right: auto;'>
	<strong class ="blink"><i class="fa fa-bell"></i>&nbsp; L'alerte du jour : <span id="nb_alert_att_1"></span>
		<span id="showcontent_tt" style='float:right;cursor:pointer;' class='min_' data-toggle="tooltip" data-original-title="Afficher l'alerte" data-placement="left"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;</span>
	</strong>	
</div>
<div id='allcontent_tt' class="alert alert-danger" style='display:none; width: 70% !important;margin-left: auto; margin-right: auto;'>
	<strong class ="blink"><i class="fa fa-bell"></i>&nbsp; L'alerte du jour : <span id="nb_alert_att_2"></span>
		<span id="alert_content_tt" style='float:right;cursor:pointer;' class='min_' data-toggle="tooltip" data-original-title="Masquer l'alerte" data-placement="left"><i class="fa fa-minus-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;</span>
		
		
	</strong>
			<span id="info_alerte_tt">
			</span>
</div> 	
<!-- end alerte-->

    	
<!-- CONTENT -->
<div class="row menu_ds">
	<div class="col-md-6">
		<?php
		if(!empty($categories)){
		?>
			<div class="cat2">
				<a href="<?php echo site_url('front/accueil_processus/'.$categories[2]->fte_categories_id); ?>">
					<?php echo ascii_to_entities($categories[2]->libelle_categories); ?>
				</a>
			</div>
			<div class="cat1">
				<a href="<?php echo site_url('front/accueil_processus/'.$categories[1]->fte_categories_id); ?>">
					<?php echo ascii_to_entities($categories[1]->libelle_categories); ?>
				</a>
			</div>
			<div class="cat0">
				<a href="<?php echo site_url('front/accueil_processus/'.$categories[0]->fte_categories_id); ?>">
					<?php echo ascii_to_entities($categories[0]->libelle_categories); ?>
				</a>
			</div>
		<?php
		}
		?>
	</div>
	<div class="col-md-6">
		<?php
		if(!empty($categories)){
		?>
			<div class="cat3">
				<a href="<?php echo site_url('front/accueil_processus/'.$categories[4]->fte_categories_id); ?>">
					<?php echo ascii_to_entities($categories[4]->libelle_categories); ?>
				</a>
			</div>
			<div class="cat4">
				<a href="<?php echo site_url('front/accueil_processus/'.$categories[3]->fte_categories_id); ?>">
					<?php echo ascii_to_entities($categories[3]->libelle_categories); ?>
				</a>
			</div>
		<?php
		}
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-2 bike">
		<img src="<?php echo img_url('biker.png'); ?>">
	</div>	
	<div class="col-md-5 boule">
		<div class="menu_arrondi1 columns1">
			<span class="tm_bout_fleche1"></span>
			<p><b>Restaurant</b></p>
		</div>
	</div>
	<div class="col-md-5 boule">
		<div class="menu_arrondi2 columns1">
			<span class="tm_bout_fleche2"></span>
			<p><b>Customer</b></p>
			<span class="tm_bout_fleche3"></span>
		</div>
	</div>
<!-- 	<div class="col-lg-1">
	</div>	
	<div class="col-lg-10">	
		<div class="row">
			<div class="col-md-1">
			</div>
			<?php 
				if(!empty($categories)){
					foreach ($categories as $val_cat) {
					
			?>
				<div class="col-md-2 columns">
					<div class="titre_contenu">
						<?php echo ascii_to_entities($val_cat->libelle_categories); ?>
					</div>
					<div class="button2">
						<a href="<?php echo site_url('front/accueil_processus/'.$val_cat->fte_categories_id) ?>" class="titre_bouton"><?php echo ascii_to_entities($val_cat->contenu_categorie);?></a>
					</div>	   
				</div>
			<?php 
					}
				}
			?>
			<div class="col-md-1">
			</div>
			
		</div>
	</div>
	<div class="col-lg-1">
	</div> -->
</div>
<span class="tm_fleche"><hr /></span>

<div id="notification">
</div>
<!-- END CONTENT -->
		
		