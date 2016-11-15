<div class="wizard-head hidden">
	<ul>					
		<?php
							$i_tab = 0;
							foreach ($lst_proc as $val_proc) {
								$i_tab += 1;
						?>
							<li><a href="#tab<?php echo $val_proc->fte_process_id; ?>" data-toggle="tab" id="lien<?php echo $val_proc->fte_process_id; ?>"><?php echo $val_proc->alias;?></a></li>
						<?php 
							}
						?>		
	</ul>
</div>


        	<div class="widget">
        		<div class="widget-body">
        			<div class="tab-content">