<!-- MENU ACTION -->
<div id="menu" class="hidden-print hidden-xs">
	<div class="sidebar sidebar-inverse">
		<div class="user-profile media innerAll">
			<div class="media-body">
				<p style='color:white;'><?php echo ascii_to_entities($traitement); ?></p>
			</div>
		</div>
		<div class="sidebarMenuWrapper">
			<ul class="list-unstyled">
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
	</div>
</div>
<!-- END MENU ACTION -->