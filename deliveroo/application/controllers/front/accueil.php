<?php


class Accueil extends CI_Controller
{


    
    public function __construct()
    {
        //  Obligatoire
        parent::__construct();

        $this->load->model('fte_traitement','traits');
        $this->load->model('fte_processus','procs');

    }

    

    public function index()
    {

        $this->accueil();

    }


    public function accueil()
    {
        if($this->session->userdata('loggin')){

            //** CODE **
            $level = $this->session->userdata('level');
            
            $sources = $this->traits->liste_source();

            if( $level == "admin"){
                $info_trait = $this->traits->liste_traitement_admin();
            }else if($level == "user"){
                $info_trait = $this->traits->liste_traitement();
            }


            $proc = array();

            foreach ($info_trait as $val_traitement) {
                $temp = $this->procs->liste_processus_first($val_traitement->fte_traitement_id);
                $proc[$val_traitement->fte_traitement_id] = $temp;
            }

            $var_js_pont = "var pont = "."\"".site_url("front/pont")."\";";
            $var_url_js = "var url_js_traits ="."\"".site_url("back/traitement_admin")."\";";
            $var_url_js_modif = "var url_js_modif_traits ="."\"".site_url("back/traitement_admin/modifier_traitement")."\";";
            $var_url_direct = "var url_acc_traits ="."\"".site_url("front/accueil")."\";";
            $var_js_pont_editer = "var pont_editer = "."\"".site_url("front/pont/editer")."\";";
            //** END CODE **
			
            //** PARAMETRE VUE **
			$data['titre'] = 'ACCUEIL';
            $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global');
            $data['info_trait'] = $info_trait;
            $data['level'] = $level;
            $data['first_proc'] = $proc;
            $data['sources'] = $sources;
            $data['js_info'] = array($var_js_pont, $var_url_js, $var_url_direct, $var_url_js_modif, $var_js_pont_editer);
            $data['js'] = array('js/back.js','js/debut.js','js/ajout_traits.js','js/modif_traits.js','js/admin_processus_edit.js');
            //** END PARAMETRE VUE **
		
            //** APPEL VUE **
            $this->load->view('includes/header.php', $data);
            $this->load->view('includes/menu_vertical.php', $data);
            //$this->load->view('includes/menu_horizental.php');
            $this->load->view('front/accueil_view.php', $data);
            $this->load->view('includes/footer.php');
            $this->load->view('includes/js.php');
            //** END APPEL VUE **

            
        }else{
            redirect('login');
        }

    }

}