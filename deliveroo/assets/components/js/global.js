function click_tab(tab, btn_id){
	var tb =  "lien" + tab;

	if (!(typeof(click_tab_supplement) =="undefined")) {
			click_tab_supplement(tab, btn_id);
	}
	try {
		document.getElementById(tb).click();
	}
	catch(e) {}
		
	add_activity(tp[tab],1);
	his(tab);
}	

function his(itab) {	
	sUrlSav = s_url_acc + "/hstaj/"+itab;
	$.ajax({
		url: sUrlSav                
	});
}

function abhis() {	

	if ($('#fin_session_prcs49').hasClass('hidden')){
        fin_session_prcs49.classList.remove('hidden');
		fin_session_prcs49.classList.add("btn");
		fin_session_prcs49.classList.add("btn-info");
		fin_session_prcs49.classList.add("pull-right");
    }

    if ($('#suite_session_prcs49').hasClass('hidden')){
        suite_session_prcs49.classList.remove('hidden');
		suite_session_prcs49.classList.add("btn");
		suite_session_prcs49.classList.add("btn-info");
		suite_session_prcs49.classList.add("pull-right");
    }

    if ($('#suite_session_prcs8').hasClass('hidden')){
        suite_session_prcs8.classList.remove('hidden');
		suite_session_prcs8.classList.add("btn");
		suite_session_prcs8.classList.add("btn-info");
		suite_session_prcs8.classList.add("pull-right");
    }

    if ($('#fin_session_prcs8').hasClass('hidden')){
        fin_session_prcs8.classList.remove('hidden');
		fin_session_prcs8.classList.add("btn");
		fin_session_prcs8.classList.add("btn-info");
		fin_session_prcs8.classList.add("pull-right");
    }

	sUrlSav = s_url_acc + "/hstab";
	$.ajax({
		url: sUrlSav
		,"dataType" : "json"
		,success : function (data) {
			if (data.last_process>0) {
				id_tab = "lien" + data.last_process;
				try {
					document.getElementById(id_tab).click();
					abort_activity();
				}
				catch(e) {}
			}
			else {
				id_tab = "lien" + first_proc;
				try {
					document.getElementById(id_tab).click();
					abort_activity();
				}
				catch(e) {}
			}
		}
	});
}
	

function debut_load() {	

	sUrlDeb = s_url_acc + "/last_action";
	$.ajax({
		url: sUrlDeb
		,"dataType" : "json"
		,success : function (data) {
			id_tab = "lien" + data.last_id;
			enchainement = data.enchainement;
			statut = data.etat;
			tbe = enchainement.split(";");
			tbs = statut.split(";");
			document.getElementById(id_tab).click();

			for (var i=0;i<tbe.length -1;i++) {
				add_activity(tp[tbe[i]], tbs[i]);
			}
		}
	});
	

}

function add_activity(activity_text,stat) {	
	default_stat = "action-ok";
	default_style = "";
	if (stat==0) {default_stat = "action-ab"; default_style=" style=\"color:red;\"";}
	s_pattern = "<li class=\"" + default_stat + "\"><a><i class=\" fa fa-caret-square-o-right\"></i><span "+ default_style + ">" + activity_text + "</span></a></li>";
	$("#activities").append(s_pattern);
}

function abort_activity () {
	lst = document.querySelectorAll("ul#activities li.action-ok");
	if (lst.length>0) {
		lst[lst.length-1].querySelector("a span").style.color = "#FF0000";
		lst[lst.length-1].className =  "action-ab";
	}
}


function charge_categories(){

	source = document.getElementById("source-cat").value;

	var btn_data = {
		id_categories : source,
		ajax : '1'
	};
    $("#spin").show();
	$.ajax({
		url: acc_cat,
		type: 'POST',
		data: btn_data,
		success: function(data) {
			$("#spin").hide();
			window.location.href = data;	
		}
	});
	return true;
}

