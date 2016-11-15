<div id="content"><h1 class="content-heading bg-white border-bottom"><?php if(!empty($menu) && !empty($sous_cat)){ echo ascii_to_entities($sous_cat)."&nbsp;&nbsp;<i class=\"fa fa-chevron-circle-right\"></i>&nbsp;&nbsp;".ascii_to_entities($menu);} ?></h1> 
<div class="innerAll spacing-x2">

    	
<!-- CONTENT -->
<div class="wizard" style="margin-top: 50px;">

    <div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row row-merge widget-tabs-gray">
    		
        <!-- ETAPES PROCESSUS -->
        <div id="rootwizard" class="wizard">

        	<!-- NBRE ETAPES PROCESSUS -->
        	<div class="wizard-head hidden">
        		<ul>					
						<?php
							$i_tab = 0;
							foreach ($lst_proc as $val_proc) {
								$i_tab += 1;
								$pr_act = $lst_act[$val_proc->fte_process_id];
						?>
							<li><a href="#tab<?php echo $val_proc->fte_process_id; ?>" data-toggle="tab" id="lien<?php echo $val_proc->fte_process_id; ?>"><?php echo $i_tab;?></a></li>
						<?php 
							}
						?>
					
        		</ul>
        	</div>
        	<!-- END NBRE ETAPES PROCESSUS -->
        	
        	<div class="widget">
        	
        		
				<!-- Wizard Progress bar -->
				
        		<!--<div class="widget-head progress" id="bar">
        			<div class="progress-bar progress-bar-primary"><strong class="step-current">1</strong> à <strong class="steps-total"><?php  echo $i_tab; ?></strong> - <strong class="steps-percent">100%</strong></div>
        		</div>-->

        		<!-- // Wizard Progress bar END -->
        		
        		<div class="widget-body">
        			<div class="tab-content">
        			
						<?php
						if(isset($lst_proc) && isset($lst_act) && isset($lst_cons)){
							foreach ($lst_proc as $val_proc) {
								$pr_act = $lst_act[$val_proc->fte_process_id];
						?>

        				<div class="tab-pane" id="tab<?php echo $val_proc->fte_process_id;?>">
        					<div class="row slim-scroll">
        						<div class="col-md-12 etape-contenu"> 
										<?php echo ascii_to_entities($val_proc->text_html); ?>
        						</div>

								<!--<div class="col-md-3">
									consigne ou image 	
								</div>-->

							</div>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<!--<ul>-->							
											<?php
											if(!empty($pr_act)){ 
												foreach ($pr_act as $val_act) {
													if($val_act->process_redirect_id != "0"){
											?>
											<!--<li>--><a href="#tab<?php echo $val_act->process_redirect_id; ?>" data-toggle="tab" class="btn btn-info pull-right action-btn"   onclick="click_tab(<?php echo $val_act->process_redirect_id; ?>, <?php echo $val_act->fte_action_id; ?>)"   <?php if(!is_null($val_act->id_html) ){ echo "id=\"".$val_act->id_html."\""; }?>><?php echo ascii_to_entities($val_act->libelle); ?></a><!--</li>-->
														
											<?php	
													}else{

													?>
														<a href="<?php echo site_url('front/pont/terminer'); ?>" class="btn btn-info pull-right action-btn" <?php if(!is_null($val_act->id_html) ){ echo "id=\"".$val_act->id_html."\""; }?>><?php echo ascii_to_entities($val_act->libelle); ?></a><!--</li>-->
														
													<?php							
													}
												}
											}
											?>
										<!--</ul>-->
													<?php 
														if(isset($deb_proc)){  
															if($deb_proc == $val_proc->fte_process_id ){
													?>
																
													<?php 
															}else{
													?>
																<button class="btn btn-primary pull-left" onclick="abhis()"><i class="fa fa-lg fa-arrow-left"></i> ACTION PRECEDENTE</button>
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

        			<!-- MODAL -->
					<div class="modal fade" id="modal-accueil">
						<div class="modal-dialog">
							<div class="modal-content">

								<!-- MODAL HEADER -->
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3 class="modal-title">Attention</h3>
								</div>
								<!-- END MODAL HEADER -->

								<!-- MODAL BODY -->
								<div class="modal-body">
									<p class="astuce"><img src="<?php echo img_url('attention.png'); ?>" alt="logo_attention" />&nbsp;Voulez-vous vraiment revenir à l'accueil, sans terminer le processus ?</p>
								</div>
								<!--  END MODAL BODY -->

								<!-- MODAL FOOTER -->
								<div class="modal-footer">
									<a href="<?php echo site_url('front/traitement/deviation'); ?>" class="btn btn-block btn-danger"> Oui</a>
								</div>
								<!--  END MODAL FOOTER -->
							
							</div>
						</div> 
					</div>
					<!-- END MODAL -->
        			
        		</div>
        	</div>
        </div>
        <!-- END ETAPES PROCESSUS -->

    </div>	

    <span id="gritter-add-primary" class="btn btn-primary btn-block hidden">DA terminer</span>
    

</div>
<!-- END CONTENT -->


	
		
		
		