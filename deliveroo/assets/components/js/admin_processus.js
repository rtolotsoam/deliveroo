function get_data_tab(idpane) {
	var data_libelle ,data_html;
	var obj_libelle = "txt_libelle_"+idpane;
	var obj_html = String("area_html_"+idpane);  

	data_libelle = document.getElementById(obj_libelle).value;
	data_html = CKEDITOR.instances[obj_html].getData();


	var libelle_vrai; 

	if(typeof data_libelle != null && typeof data_libelle != undefined && data_libelle != ''){
			libelle_vrai = data_libelle; 
	}else{
			libelle_vrai="";
	}
	
	
	url_edition = url_upd_proc;
	var pont_editer = {
			"area_html" : data_html
			,"txt_libelle" : libelle_vrai
			,"procid" : idpane
	};

	$.ajax({
		url: url_edition,
		type: 'POST',
		data: pont_editer,
		success: function(data) {
			document.getElementById('edition_valid').click();
		}
	});

	return true;
	
}


function ajout_procs(id_traits, ordre){
	var str;
	url_ajouter = url_ajout_proc;
	var pont_ajout = {
			"id_camp" : id_traits
			,"ordre" : ordre
	};

	$.ajax({
		url: url_ajouter,
		type: 'POST',
		data: pont_ajout,
		success: function(data) {
			window.location.href = data;
		}
	});

	return true;
}
         

function click_lien(tab){
	var tb =  "lien" + tab;

	try {
		document.getElementById(tb).click();
	}
	catch(e) {}
		
}