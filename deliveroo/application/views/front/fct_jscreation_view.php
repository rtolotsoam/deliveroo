<script>
	<?php 
		$s_script = "";
		foreach ($infos_js_action as $val_info) {			
			$s_script .= "function fctjs_".$val_info->fte_action_id."() {";
			$s_script .= " try { ";		
			$s_script .= $val_info->action_js;
			$s_script .= " } catch(e) {}";		
			$s_script .= " }";		
		}
		echo $s_script;
	?>
</script>