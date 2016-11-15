<?php


class Accueil_processus extends CI_Controller
{


    
    public function __construct()
    {
        //  Obligatoire
        parent::__construct();

        $this->load->model('fte_categories','cats');
        $this->load->model('fte_traitement','traits');
        $this->load->model('fte_processus','procs');

    }

    

    public function index($id)
    {
        $this->accueil_processus($id);

    }

    public function accueil_processus($id)
    {
        if($this->session->userdata('loggin')){

            $id_process = (int) $id;


            //** CODE **
            $categories = $this->cats->liste_categories_by_parent($id_process);
            $level = $this->session->userdata('level');

            $titres = $this->cats->liste_categories_by_id($id_process);

            if(!empty($titres)){
            foreach ($titres as $titre) {
                 $titre_wiget = $titre->libelle_categories;
            }
            }

            if(!empty($categories)){
            foreach ($categories as $val_cat) {
                
                $id_traitement = $val_cat->traitement_id;
                $temp = $this->traits->liste_traitement_by_id($id_traitement);

                $traits[$val_cat->fte_categories_id] = $temp;

                $temp2 = $this->procs->liste_processus_first($id_traitement);
                $proc[$id_traitement] = $temp2;
            } 
            }
            

            $var_js_pont_editer = "var pont_editer = "."\"".site_url("front/pont/editer")."\";";
            $var_js_pont = "var pont = "."\"".site_url("front/pont")."\";";
            //** END CODE **
            
        

            $data['titre'] = 'ACCUEIL TRAITEMENT';
            $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global','admin/module.admin.page.pricing_tables.min');
            $data['categories'] = $categories;
            $data['level'] = $level;
            if(!empty($proc)){
            $data['first_proc'] = $proc;
            }
            $data['js_info'] = array($var_js_pont_editer, $var_js_pont);
            $data['js'] = array('js/back.js','js/debut.js');

            if(!empty($categories)){
            $data['titre_wiget'] = $titre_wiget;
            $data['lst_traits'] = $traits;
            $data['lst_cats'] = $categories;
            }
            //** END PARAMETRE VUE **
        
            //** APPEL VUE **
            $this->load->view('includes/header.php', $data);
            $this->load->view('includes/menu_vertical.php', $data);
            //$this->load->view('includes/menu_horizental.php');
            $this->load->view('front/accueil_processus_view.php', $data);
            $this->load->view('includes/footer.php');
            $this->load->view('includes/js.php');
            //** END APPEL VUE **

            
        }else{
            redirect('login');
        }

    }

}