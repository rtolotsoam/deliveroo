function ajout_user()
{
	var matricule = document.getElementById('matricule').value;
	var prenom = document.getElementById('prenom').value;
	var mail = document.getElementById('mail').value;
	var pass = document.getElementById('pass').value;
	var confpass = document.getElementById('confpass').value;

	var level = document.getElementById('level').value;
	var statut = document.getElementById('statut').value;
	var access_1 = document.getElementById('access_1').value;
	var access_2 = document.getElementById('access_2').value;
	var access_3 = document.getElementById('access_3').value;
	var access_4 = document.getElementById('access_4').value;

	var gestion_u = document.getElementById('gestion_u').value;
	var gestion_g = document.getElementById('gestion_g').value;

	if((typeof matricule != null && matricule != '') && (typeof prenom != null && prenom != '') && (typeof mail != null && mail != '') && (typeof pass != null && pass != '') && (typeof confpass != null && confpass != '')){
		
		if(pass == confpass){

			if(level== 'admin' && gestion_u == '0' && gestion_g == '0'){
				
				$('#gestion_ug').html('<div class="alert alert-danger" align="center">Veuillez mettre "oui", l\'un des accès de gestion ci-dessous !</div>');

			}else{

			
				// DONNEES DU FORMULAIRE AJOUT UTILISATEUR
				var form_data = {

					matricule : matricule,
					prenom : prenom,
					mail : mail,
					pass : pass,
					confpass : confpass,
					level : level,
					statut : statut,
					access_1 : access_1,
					access_2 : access_2,
					access_3 : access_3,
					access_4 : access_4,
					gestion_u : gestion_u,
					gestion_g : gestion_g,
					ajax : '1'
				};
				
				// TRAITEMENT AJAX DU FORMULAIRE AJOUT UTILISATEUR
				$.ajax({
					url: url_ajout_user,
					type: 'POST',
					data: form_data,
					success: function(data) {

						
						// TRAITEMENT DES ERREURS
						if(data == 'erreur'){
							
							$('#message_error').html('<div class="alert alert-danger" align="center">Veillez réessayer ulterieurement !</div>');
							
						}else if(data == 'erreur-mail'){

							$('#message_error').html('');


							$('#matricule_error').html('');
							$('#prenom_error').html('');
							$('#mail_error').html('<div class="alert alert-danger" align="center">Veuillez vérifier l"adresse e-mail !</div>');
							$('#pass_error').html('');
							$('#pass_error').html('');


						}else if(data == 'success'){

							window.location.href = url_ajout_user_ok;
						
						}else{

							var str = data;
							var res = str.split(";");

							$('#matricule_error').html(res[0]);
							$('#prenom_error').html(res[1]);
							$('#mail_error').html(res[2]);
							$('#pass_error').html(res[3]);
							$('#pass_error').html(res[4]);

							$('#message_error').html('');
				
						}


					}
				});

				return true;
			}


		}else{
			$('#pass_error').html('<div class="alert alert-danger" align="center">Le mot de passe et son confirmation ne correspond pas !</div>');		
		}
		
	}else{
		$('#message_error').html('<div class="alert alert-danger" align="center">Les champs sont obligatoires !</div>');		
	}
}


function supprimer_user(id){

	var btn_data = {
		id_user : id
	};

	$.ajax({
		url: url_suppr_user,
		type: 'POST',
		data: btn_data,
		success: function(data) {
			window.location.href = data;
		}
	});
	
	return true;

}


function modifier_user(id){

	var matricule = document.getElementById('matricule_'+id).value;
	var prenom = document.getElementById('prenom_'+id).value;
	var mail = document.getElementById('mail_'+id).value;
	var pass = document.getElementById('pass_'+id).value;

	var level = document.getElementById('level_'+id).value;
	var statut = document.getElementById('statut_'+id).value;
	var access_1 = document.getElementById('access_1_'+id).value;
	var access_2 = document.getElementById('access_2_'+id).value;
	var access_3 = document.getElementById('access_3_'+id).value;
	var access_4 = document.getElementById('access_4_'+id).value;

	var gestion_u = document.getElementById('gestion_u_'+id).value;
	var gestion_g = document.getElementById('gestion_g_'+id).value;

	if((typeof matricule != null && matricule != '') && (typeof prenom != null && prenom != '') && (typeof mail != null && mail != '') && (typeof pass != null && pass != '')){
		
			
			if(level== 'admin' && gestion_u == '0' && gestion_g == '0'){
				
				$('#gestion_ug_'+id).html('<div class="alert alert-danger" align="center">Veuillez mettre "oui", l\'un des accès de gestion ci-dessous !</div>');

			}else{

				// DONNEES DU FORMULAIRE AJOUT UTILISATEUR
				var form_data = {

					matricule : matricule,
					prenom : prenom,
					mail : mail,
					pass : pass,
					level : level,
					statut : statut,
					access_1 : access_1,
					access_2 : access_2,
					access_3 : access_3,
					access_4 : access_4,
					gestion_u : gestion_u,
					gestion_g : gestion_g,
					id_user : id,
					ajax : '1'
				};
				
				// TRAITEMENT AJAX DU FORMULAIRE AJOUT UTILISATEUR
				$.ajax({
					url: url_modif_user,
					type: 'POST',
					data: form_data,
					success: function(data) {

						
						// TRAITEMENT DES ERREURS
						if(data == 'erreur'){
							
							$('#message_error_'+id).html('<div class="alert alert-danger" align="center">Veillez réessayer ulterieurement !</div>');
							

						}else if(data == 'success'){

							window.location.href = url_ajout_user_ok;
						
						}else{

							var str = data;
							var res = str.split(";");

							$('#matricule_error_'+id).html(res[0]);
							$('#prenom_error_'+id).html(res[1]);
							$('#mail_error_'+id).html(res[2]);
							$('#pass_error_'+id).html(res[3]);
				
						}


					}
				});

				return true;
			}

		
	}else{
		$('#message_error_'+id).html('<div class="alert alert-danger" align="center">Les champs sont obligatoires !</div>');		
	}
}