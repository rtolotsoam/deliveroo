function notification(id) {

	console.log(id);

			var form_data = {
				id_not : id,
				ajax : '1'
			};



			$.ajax({
				url: url_acc_notification,
				type: 'POST',
				data: form_data,
				success: function(data) {
					
					//TRAITEMENT DES ERREURS
					if(data == 'erreur'){
						
						$('#msg_error').click();

					}else{
	
						$("#notification").html(data);
						$("#affiche-not-"+id).modal();

					}

				}

			});
	
}