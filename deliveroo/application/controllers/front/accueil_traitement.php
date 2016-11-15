<?php


class Accueil_traitement extends CI_Controller
{


    
    public function __construct()
    {
        //  Obligatoire
        parent::__construct();

        $this->load->model('fte_categories','cats');
        $this->load->model('fte_traitement','traits');

    }

    

    public function index($id)
    {
        $this->accueil_traitement($id);

    }

    public function accueil_traitement($id)
    {
        if($this->session->userdata('loggin')){


            $id_traits = (int) $id;
            
            if($id_traits){
                $this->session->set_userdata('process_redirect', $id_traits);
                $categories = $this->cats->liste_categories_by_parent($id_traits);

                $donnes_menu = $this->cats->liste_categories_by_id($id_traits);

                foreach ($donnes_menu as $val_menu) {
                    $menu = $val_menu->libelle_categories;
                }

            }else{
                $process_redirect = $this->session->userdata('process_redirect');                
                $categories = $this->cats->liste_categories_by_parent($process_redirect);
            }


            //** CODE **
            $level = $this->session->userdata('level');
            //** END CODE **
            
            //** PARAMETRE VUE **
            $data['titre'] = 'ACCUEIL TRAITEMENT';
            $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global','admin/module.admin.page.pricing_tables.min');
            $data['categories'] = $categories;

            if(!empty($menu)){
                $data['menu'] = $menu;
            }

            $data['level'] = $level;
            $data['js'] = array('js/back.js');
            //** END PARAMETRE VUE **
        
            //** APPEL VUE **
            $this->load->view('includes/header.php', $data);
            $this->load->view('includes/menu_vertical.php', $data);
            //$this->load->view('includes/menu_horizental.php');
            $this->load->view('front/accueil_traitement_view.php', $data);
            $this->load->view('includes/footer.php');
            $this->load->view('includes/js.php');
            //** END APPEL VUE **

            
        }else{
            redirect('login');
        }

    }


    public function normal()
    {
        if($this->session->userdata('loggin')){

                $process_redirect = $this->session->userdata('process_redirect');                
                $categories = $this->cats->liste_categories_by_parent($process_redirect);
                $donnes_menu = $this->cats->liste_categories_by_id($process_redirect);

                foreach ($donnes_menu as $val_menu) {
                    $menu = $val_menu->libelle_categories;
                }


            //** CODE **
            $level = $this->session->userdata('level');
            //** END CODE **
            
            //** PARAMETRE VUE **
            $data['titre'] = 'ACCUEIL TRAITEMENT';
            $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global','admin/module.admin.page.pricing_tables.min');
            $data['categories'] = $categories;
            $data['level'] = $level;

            if(!empty($menu)){
                $data['menu'] = $menu;
            }
            //** END PARAMETRE VUE **
        
            //** APPEL VUE **
            $this->load->view('includes/header.php', $data);
            $this->load->view('includes/menu_vertical.php', $data);
            //$this->load->view('includes/menu_horizental.php');
            $this->load->view('front/accueil_traitement_view.php', $data);
            $this->load->view('includes/footer.php');
            $this->load->view('includes/js.php');
            //** END APPEL VUE **

            
        }else{
            redirect('login');
        }

    }

}