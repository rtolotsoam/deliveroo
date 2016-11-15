
<div id="content"><h1 class="content-heading bg-white border-bottom hidden">PROCESSUS</h1> 
<div class="innerAll spacing-x2">

    	
<!-- CONTENT -->    
<div class="row">
	
	<div class="col-md-12">
		<div class="widget widget-inverse" >
			<div class="widget-head">
				<h4 class="heading">
					<?php

					if(!empty($titre_wiget)){ 
						echo "<strong>".strtoupper($titre_wiget)."</strong>"; 
					}
					?>
				</h4>
			</div>
			<div class="widget-body">
				
				

						
						<?php
							if(!empty($lst_cats)){ 
							foreach ($lst_cats as $val_cat) {
								if(!empty($lst_traits)){
								$lst_traits_cats = $lst_traits[$val_cat->fte_categories_id];
									if(!empty($lst_traits_cats)){

									foreach ($lst_traits_cats as $val_traits) {
										
									$deb_proc  =  $first_proc[$val_traits->fte_traitement_id];

									foreach ($deb_proc as $val_deb) {
								
						?>

						
							<ul>		
								<li class="style_li"><button class="btn btn-block btn-warning" onclick="traiter(<?php echo $val_traits->fte_traitement_id; ?> , <?php  echo $val_deb->fte_process_id; ?>)"><?php echo ascii_to_entities($val_traits->info_traitement); ?></button></li><br>
							</ul> 

						

						<?php
											}
										}
									}
								}
							}
						}
						?>
						
				
				
			</div>	
		</div>		
	</div>
	
</div>
<!-- END CONTENT -->


	
		
		
		