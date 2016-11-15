<!-- AJAX POUR LOGIN-->
<script type="application/javascript">
$(document).ready(function() {
		
	$('#submit').click(function() {

		// DONNEES DU FORMULAIRE
		var form_data = {
			matricule : $('#matricule').val(),
			pass : $('#pass').val(),
			ajax : '1'
		};
		
		// TRAITEMENT AJAX DU FORMULAIRE
		$.ajax({
			url: "<?php echo site_url('front/authentification'); ?>",
			type: 'POST',
			data: form_data,
			success: function(data) {

				// TRAITEMENT DES ERREURS
				if(data == 'erreur'){
					
					$('#message').html('<div class="alert alert-danger" align="center">Votre matricule ou mot de passe sont érronèes !</div>');
					$('#error_matricule').html('');
					$('#error_pass').html('');

				}else if(data == 'success_user'){
					window.location.href = "<?php echo site_url('front/accueil_categories'); ?>";
				}else if(data == 'success_admin_PU'){
					window.location.href = "<?php echo site_url('back/accueil_admin'); ?>";	
				}else if(data == 'success_admin_P'){
					window.location.href = "<?php echo site_url('back/accueil_admin'); ?>";	
				}else if(data == 'success_admin_U'){
					window.location.href = "<?php echo site_url('back/utilisateur'); ?>";		
				}else{

					var str = data;
					var res = str.split("1");

					$('#error_matricule').html(res[0]);
					$('#error_pass').html(res[1]);
					$('#message').html('');
				} 
			}
		});
		
		return false;
	});

});
</script>
<!-- END AJAX POUR LOGIN-->
</head>