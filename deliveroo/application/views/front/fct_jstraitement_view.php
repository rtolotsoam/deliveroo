<script>
	<?php 
		$s_script = "";
		foreach ($infos_js_traitement as $val_info) {			
			$s_script .= " ". $val_info->text_js;
		}
		echo $s_script;
	?>
</script>