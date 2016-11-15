<?php


class Traitement extends CI_Controller
{


    
    public function __construct()
    {
        //  Obligatoire
        parent::__construct();

        $this->load->model('fte_processus','procs');
        $this->load->model('fte_action','acts');
        $this->load->model('fte_consigne','cons');
        $this->load->model('fte_historique','hist');
        $this->load->model('fte_traitement','trtm');
        $this->load->model('fte_categories','cats');
    }

    

    public function index()
    {

        $this->traitement();

    }


    public function traitement()
    {
        
        if($this->session->userdata('loggin')  && $this->session->userdata('traitement_id')){

            //var_dump($this->agent->referrer());
			
            //** CODE **
            $level = $this->session->userdata('level');
            $id_traitement = $this->session->userdata('traitement_id');

            $sous_cat = $this->cats->liste_categories_by_traitement_id($id_traitement);

            if(!empty($sous_cat)){
                foreach ($sous_cat as $val_scat) {
                    $id_cat = (int) $val_scat->parent_id;
                }

                $categs = $this->cats->liste_categories_by_id($id_cat);

                foreach ($categs as $val_cat) {
                    $sous_cat_fin = $val_cat->libelle_categories;
                }

            }

            $donnes_menu = $this->trtm->liste_traitement_by_id($id_traitement);

            foreach ($donnes_menu as $val_menu) {
                $menu = $val_menu->info_traitement;
            }

			$bind_processus = $this->procs->liste_processus($id_traitement);
			$act = array();

            $var_js = "var tp= [];";
           // $var_fct_js = "";
            $deb = True;

            if(!empty($bind_processus)){
    			foreach ($bind_processus as $proc) {
                    
                    if ($deb) {
                        $deb = False;
                        $var_js .= "var first_proc = $proc->fte_process_id;";
                        $deb_proc = $proc->fte_process_id;
                    }

    				$temp = $this->acts->liste_action($proc->fte_process_id);
                    $ascii = ascii_to_entities($proc->libelle);
                    $var_js .= "tp[$proc->fte_process_id] = \"$ascii\";";
                    //$var_fct_js .= "fct_".$proc->fte_process_id."();";
    				$act[$proc->fte_process_id] = $temp;

                    $temp2 = $this->cons->liste_consigne($proc->fte_process_id);
                    $consigne[$proc->fte_process_id] = $temp2;
    			}
            
            }



            $var_js_control = "var s_url_acc = "."\"".site_url("front/historique")."\";";


            // FONCTION JS DANS LES TABLES
            $temp_js_action = $this->acts->liste_js_action($id_traitement);
            $temp_js_trait = $this->trtm->liste_js($this->session->userdata('traitement_id'));
            //** END CODE **


           //var_dump($consigne);

            //** PARAMETRE VUE **
			$data['titre'] = 'TRAITEMENT';
            $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global');
            $data['js'] = array('js/global.js','js/back.js','js/convertir.js','js/traitement_proccess.js');
            $data['level'] = $level;

            if(!empty($menu)){
                $data['menu'] = $menu;
            }

            if(!empty($bind_processus)){
                $data['lst_proc'] = $bind_processus;
                $data['lst_act'] = $act;
                $data['lst_cons'] = $consigne;
                $data['deb_proc'] = $deb_proc;
                $data['js_info'] = array($var_js, $var_js_control);
            }

            if (gettype($temp_js_action)!="boolean") {
                $data['infos_js_action'] = $temp_js_action;
            }

            if (gettype($temp_js_trait)!="boolean") {
                $data_tr["infos_js_traitement"] = $temp_js_trait;
            }


            if(!empty($sous_cat)){
                $data['sous_cat'] = $sous_cat_fin;
            }
            //** END PARAMETRE VUE **
            
            //** APPEL VUE **
            $this->load->view('includes/header_traitement.php', $data);
            $this->load->view('includes/menu_vertical_traitement.php', $data);
            $this->load->view('includes/menu_horizental.php', $data);
            $this->load->view('front/traitement_view.php', $data);
            $this->load->view('includes/footer.php');
            
            if (gettype($temp_js_action)!="boolean") {
                
                $this->load->view('front/fct_js_view.php',$data);
                $this->load->view('front/fct_jscreation_view.php',$data);
            }
            
            if (gettype($temp_js_trait)!="boolean") {
                $this->load->view('front/fct_jstraitement_view.php',$data_tr);
            }
                        
            $this->load->view('includes/js.php');

            //** END APPEL VUE **
        }else{
            redirect('login');
        }

    }

    public function deviation()
    {
        if($this->session->userdata('loggin')  && $this->session->userdata('traitement_id') && $this->session->userdata('connection_id')){
            
            $rq = $this->hist->ajouter_historique(0, $this->session->userdata('connection_id'), -2, $this->session->userdata('mle'));
            
            if($rq != false){
                $this->session->unset_userdata('connection_id');
                $this->session->unset_userdata('traitement_id');
            }

            $level = $this->session->userdata('level');

            if($level == "admin"){
                redirect('back/accueil_admin/normal');
            }else{
                redirect('front/accueil_traitement/normal');
            }

        }else{
            redirect('login');
        }
    }

} 