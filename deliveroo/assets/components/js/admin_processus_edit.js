function editer(idtraitement){
	
	var pont_data = {
			id_traitement : idtraitement,
			ajax : '1'
	};


	$.ajax({
		url: pont_editer,
		type: 'POST',
		data: pont_data,
		success: function(data) {
			window.location.href = data;	
		}
	});

	return true;
}    

function insert_nouveau_bouton(){
	libelle_in = document.getElementById("libelle_traits").value;
	redir_in = document.getElementById("proccs").value;
	var btn_data = {
		"txt_libelle" : libelle_in
		,"procid" : idbout_processus
		,"procred" : redir_in
	};

	$.ajax({
		url: url_add_btn,
		type: 'POST',
		data: btn_data,
		success: function(data) {
			window.location.href = data;	
		}
	});

	return true;
} 

function nouveau_bouton(ibtnp) {
	idbout_processus = ibtnp;
}      


function modif_bouton(id_act){

	var libelle_modif = document.getElementById('libelle_modif_'+id_act).value;
	var redirect_proc = document.getElementById('redirect_proc_'+id_act).value;

	
	var btn_data = {
		txt_libelle : libelle_modif
		,procid : id_act
		,procred : redirect_proc
	};

	$.ajax({
		url: url_modif_btn,
		type: 'POST',
		data: btn_data,
		success: function(data) {
			window.location.href = data;
		}
	});
	
	return true;

}


function suppr_bouton(id_act){

	var btn_data = {
		procid : id_act
	};

	$.ajax({
		url: url_suppr_btn,
		type: 'POST',
		data: btn_data,
		success: function(data) {
			window.location.href = data;
		}
	});
	
	return true;

}


function suppr_proccess(id_pro){

	var btn_data = {
		procid : id_pro
	};

	$.ajax({
		url: url_suppr_proc,
		type: 'POST',
		data: btn_data,
		success: function(data) {
			window.location.href = data;
		}
	});
	
	return true;

}


function suppr_categorie(id_cat){

	var btn_data = {
		catid : id_cat
	};

	$.ajax({
		url: url_suppr_cat,
		type: 'POST',
		data: btn_data,
		success: function(data) {
			
			window.location.href = data;
		}
	});
	
	return true;

}



function suppr_trait_cat(id_cat){

	var btn_data = {
		cat_trait_id : id_cat
	};

	$.ajax({
		url: url_suppr_cat_trait,
		type: 'POST',
		data: btn_data,
		success: function(data) {
			
			window.location.href = data;
		}
	});
	
	return true;

}


