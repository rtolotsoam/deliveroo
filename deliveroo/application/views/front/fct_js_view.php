
<script>
	function click_tab_supplement(tab, btn_id) {	
		switch (parseInt(btn_id)) {
				<?php 
					$s_script = "";
					foreach ($infos_js_action as $val_info) {			
						$s_script .= "case ".$val_info->fte_action_id." : ";
						$s_script .= "fctjs_".$val_info->fte_action_id."();return true;break;";
					}
					echo $s_script;
				?>			
			default : return true;
		}
		return true;
	}

	
</script>
