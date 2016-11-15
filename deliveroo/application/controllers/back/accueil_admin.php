<?php


class Accueil_admin extends CI_Controller
{


    
    public function __construct()
    {
        //  Obligatoire
        parent::__construct();

        $this->load->model('fte_categories','cats');
        $this->load->model('fte_traitement','traits');
        $this->load->model('fte_processus','procs');

        $this->load->library('form_validation');

    }

    

    public function index()
    {

        $this->accueil_admin(); 

    }


    public function accueil_admin()
    {
        $level = $this->session->userdata('level');

        if($this->session->userdata('loggin') && $level =="admin"){

            //** CODE **
            $id_categories = 1;

            $this->session->set_userdata('id_categories', $id_categories);

            $data['id_cat'] = $id_categories;

            $categories = $this->cats->liste_categories_by_parent($id_categories);

            
            $liste_cat = $this->cats->liste_categories_by_niveau($id_categories);

            $liste_sous_cat = $this->cats->liste_categories_by_parent($id_categories);


            if(!empty($categories)){
                foreach ($categories as $val_cat) {
                    $id_cat = (int) $val_cat->fte_categories_id;
                             
                    $temp = $this->cats->liste_categories_by_parent($id_cat);

                    $trait[$val_cat->fte_categories_id] = $temp;   
   
                }



                foreach ($trait as $val_traits) {

                    if(is_array($val_traits)){
                        foreach ($val_traits as $val_trait) {
                            $id_trait = (int) $val_trait->traitement_id;

                            $temp2 = $this->procs->liste_processus_first($id_trait);

                            $proc[$val_trait->fte_categories_id] = $temp2;
                        }
                    }
                }

            }

            //var_dump($trait);

            $var_js_cat = "var acc_cat = "."\"".site_url("back/accueil_admin/routage")."\";";
            $var_url_js = "var url_js_traits ="."\"".site_url("back/traitement_admin")."\";";
            $var_url_direct = "var url_acc_traits ="."\"".site_url("back/accueil_admin/normal")."\";";
            $var_js_pont = "var pont = "."\"".site_url("front/pont")."\";";
            $var_js_pont_editer = "var pont_editer = "."\"".site_url("front/pont/editer")."\";";
            $var_js_supr_cat_trait = "url_suppr_cat_trait = "."\"".site_url("back/accueil_admin/supprimer_cat_traitement")."\";";
            $var_js_editer_cat = "var url_suppr_cat = "."\"".site_url("back/accueil_admin/supprimer_categories")."\";";
            $var_js_modif_cat = "var url_js_modif_cats = "."\"".site_url("back/accueil_admin/modif_categories")."\";";
            $var_js_modif_cat_trait = "var url_js_modif_cat_trait = "."\"".site_url("back/accueil_admin/modif_cat_traitement")."\";";
            $var_url_modif_cat = "var url_acc_cats = "."\"".site_url("back/accueil_admin/normal")."\";";
            //** END CODE **

    		
            //** PARAMETRE VUE **
    		$data['titre'] = 'ACCUEIL';
            $data['level'] = $level;
            $data['gest_g'] = $this->session->userdata('ges_g');
            $data['gest_u'] = $this->session->userdata('ges_u');
            if(!empty($liste_cat)){

                $data['liste_cat'] = $liste_cat;
            }

            if(!empty($categories)){
                $data['categories'] = $categories;


                $data['lst_cat'] = $trait;
            }

            if(!empty($proc)){

                $data['deb_proc'] = $proc;
            }

            if(!empty($liste_sous_cat)){
                $data['sous_categories'] = $liste_sous_cat;
            }
            $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global');
            $data['js'] = array('js/global.js', 'js/ajout_traits.js', 'js/debut.js', 'js/admin_processus_edit.js', 'js/modif_traits.js');
            $data['js_info'] = array($var_js_cat, $var_url_js, $var_url_direct, $var_js_pont, $var_js_pont_editer, $var_js_editer_cat, $var_js_modif_cat, $var_url_modif_cat, $var_js_supr_cat_trait, $var_js_modif_cat_trait);
            //** END PARAMETRE VUE **
    	
            //** APPEL VUE **
            $this->load->view('includes/header.php', $data);
            $this->load->view('includes/menu_vertical.php', $data);
            $this->load->view('back/accueil_admin_view.php', $data);
            $this->load->view('back/ajouter_traitement_view.php', $data);


            if(!empty($categories)){
                
                foreach ($trait as $val_traits) {
                    

                    if(is_array($val_traits)){

                        foreach ($val_traits as $val_trait) {

                            $id_cat = (int) $val_trait->fte_categories_id;

                            $libelle_cat = $val_trait->libelle_categories;
                            $parent_cat = $val_trait->parent_id;
                            $flag_cat = $val_trait->flag;
                            $id_cat_trait = $val_trait->traitement_id;


                            $data_cat['id_cat'] = $id_cat;
                            $data_cat['libelle_cat'] = $libelle_cat;
                            $data_cat['parent_cat'] = $parent_cat;
                            $data_cat['flag_cat'] = $flag_cat;
                            $data_cat['id_cat_trait'] = $id_cat_trait;
                            $data_cat['lst_cat'] = $liste_sous_cat;


                            $this->load->view('back/processus_popup_suppr_categorie_view.php', $data_cat);
                            $this->load->view('back/modifier_traitement_view.php', $data_cat);


                        }
                    }
                    
                }
               
            }


            if(!empty($categories)){
                foreach ($categories as $val_cat) {
                    $id_cat = (int) $val_cat->fte_categories_id;
                    $data_cat_trait['id_cat_trait'] = $id_cat; 
                    $data_cat_trait['libelle_cat_trait'] = $val_cat->libelle_categories;
                    $data_cat_trait['cont_cat_trait'] = $val_cat->contenu_categorie; 
                    $data_cat_trait['flag_cat_trait'] = $val_cat->flag; 

                    $this->load->view('back/supprimer_traitement_view.php', $data_cat_trait);
                    $this->load->view('back/modifier_cat_traitement_view.php', $data_cat_trait);             
                }
            }


            $this->load->view('includes/footer.php');
            $this->load->view('includes/js.php');
            //** END APPEL VUE **

            
        }else{
            redirect('login');
        }

    }


    public function normal()
    {

        $level = $this->session->userdata('level');        

       if($this->session->userdata('loggin') && $level =="admin"){

            $id_categories = $this->session->userdata('id_categories');

            $data['id_cat'] = $id_categories;

            $categories = $this->cats->liste_categories_by_parent($id_categories);

            
            $liste_cat = $this->cats->liste_categories_by_niveau(1);

            $liste_sous_cat = $this->cats->liste_categories_by_parent($id_categories);


            if(!empty($categories)){
                foreach ($categories as $val_cat) {
                    $id_cat = (int) $val_cat->fte_categories_id;

                             
                    $temp = $this->cats->liste_categories_by_parent($id_cat);

                    $trait[$val_cat->fte_categories_id] = $temp;           
                }

               

                foreach ($trait as $val_traits) {

                    if(is_array($val_traits)){
                        foreach ($val_traits as $val_trait) {
                            $id_trait = (int) $val_trait->traitement_id;

                            $temp2 = $this->procs->liste_processus_first($id_trait);

                            $proc[$val_trait->fte_categories_id] = $temp2;
                        }
                    }
                    
                }
               
            }

            //var_dump($trait);

            

            $var_js_cat = "var acc_cat = "."\"".site_url("back/accueil_admin/routage")."\";";
            $var_url_js = "var url_js_traits ="."\"".site_url("back/traitement_admin")."\";";
            $var_url_direct = "var url_acc_traits ="."\"".site_url("back/accueil_admin/normal")."\";";
            $var_js_pont = "var pont = "."\"".site_url("front/pont")."\";";
            $var_js_pont_editer = "var pont_editer = "."\"".site_url("front/pont/editer")."\";";
            $var_js_editer_cat = "var url_suppr_cat = "."\"".site_url("back/accueil_admin/supprimer_categories")."\";";
            $var_js_supr_cat_trait = "url_suppr_cat_trait = "."\"".site_url("back/accueil_admin/supprimer_cat_traitement")."\";";
            $var_js_modif_cat = "var url_js_modif_cats = "."\"".site_url("back/accueil_admin/modif_categories")."\";";
            $var_js_modif_cat_trait = "var url_js_modif_cat_trait = "."\"".site_url("back/accueil_admin/modif_cat_traitement")."\";";
            $var_url_modif_cat = "var url_acc_cats = "."\"".site_url("back/accueil_admin/normal")."\";";
            //** END CODE **

            
            //** PARAMETRE VUE **
            $data['titre'] = 'ACCUEIL';
            $data['level'] = $level;
            
            $data['gest_g'] = $this->session->userdata('ges_g');
            $data['gest_u'] = $this->session->userdata('ges_u');
            if(!empty($liste_cat)){

                $data['liste_cat'] = $liste_cat;
            }

            if(!empty($categories)){
                $data['categories'] = $categories;


                $data['lst_cat'] = $trait;

            }

            if(!empty($proc)){

                $data['deb_proc'] = $proc;
            }

            if(!empty($liste_sous_cat)){
                $data['sous_categories'] = $liste_sous_cat;
            }

            $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global');
            $data['js'] = array('js/global.js', 'js/ajout_traits.js', 'js/debut.js', 'js/admin_processus_edit.js', 'js/modif_traits.js');
            $data['js_info'] = array($var_js_cat, $var_url_js, $var_url_direct, $var_js_pont, $var_js_pont_editer, $var_js_editer_cat, $var_js_modif_cat, $var_url_modif_cat, $var_js_supr_cat_trait, $var_js_modif_cat_trait);
            //** END PARAMETRE VUE **
        
            //** APPEL VUE **
            $this->load->view('includes/header.php', $data);
            $this->load->view('includes/menu_vertical.php', $data);
            $this->load->view('back/accueil_admin_view.php', $data);
            $this->load->view('back/ajouter_traitement_view.php', $data);

            if(!empty($categories)){
                
                foreach ($trait as $val_traits) {

                    if(is_array($val_traits)){
                        foreach ($val_traits as $val_trait) {

                            $id_cat = (int) $val_trait->fte_categories_id;

                            $libelle_cat = $val_trait->libelle_categories;
                            $parent_cat = $val_trait->parent_id;
                            $flag_cat = $val_trait->flag;
                            $id_cat_trait = $val_trait->traitement_id;


                            $data_cat['id_cat'] = $id_cat;
                            $data_cat['libelle_cat'] = $libelle_cat;
                            $data_cat['parent_cat'] = $parent_cat;
                            $data_cat['flag_cat'] = $flag_cat;
                            $data_cat['id_cat_trait'] = $id_cat_trait;
                            $data_cat['lst_cat'] = $liste_sous_cat;

                            $this->load->view('back/processus_popup_suppr_categorie_view.php', $data_cat);
                            $this->load->view('back/modifier_traitement_view.php', $data_cat);
                        }
                    }
                    
                }
               
            }

            if(!empty($categories)){
                foreach ($categories as $val_cat) {
                    $id_cat = (int) $val_cat->fte_categories_id;
                    $data_cat_trait['id_cat_trait'] = $id_cat; 
                    $data_cat_trait['libelle_cat_trait'] = $val_cat->libelle_categories;
                    $data_cat_trait['cont_cat_trait'] = $val_cat->contenu_categorie; 
                    $data_cat_trait['flag_cat_trait'] = $val_cat->flag; 

                    $this->load->view('back/supprimer_traitement_view.php', $data_cat_trait); 
                    $this->load->view('back/modifier_cat_traitement_view.php', $data_cat_trait);            
                }
            }


            $this->load->view('includes/footer.php');
            $this->load->view('includes/js.php');
            //** END APPEL VUE **

            
        }else{
            redirect('login');
        }

    }


    public function routage()
    {
        $level = $this->session->userdata('level');        

        if($this->session->userdata('loggin') && $level =="admin"){

            if($this->input->post('id_categories') && $this->input->post('ajax') =="1"){    

                $this->session->unset_userdata('id_categories');

                $this->session->set_userdata('id_categories', $this->input->post('id_categories'));

                echo site_url('back/accueil_admin/normal');
            }else{

                echo site_url('back/accueil_admin');
            }

        }else{
            redirect('login');
        }

    }


    public function supprimer_categories(){
        
        $level = $this->session->userdata('level');        

        if($this->session->userdata('loggin') && $level =="admin"){

            $catid = $this->input->post('catid');
            
            
            
            $data = array(
                'flag' => 0    
            );
            
            $ret = $this->cats->editer_categories($catid, $data);
            echo site_url('back/accueil_admin/normal');
               
        }else{
            redirect('login');
        }
    }


    public function supprimer_cat_traitement(){
        
        $level = $this->session->userdata('level');        

        if($this->session->userdata('loggin') && $level =="admin"){

            $catid = $this->input->post('cat_trait_id');
            
            
            
            $data = array(
                'flag' => 0    
            );
            
            $ret = $this->cats->editer_categories($catid, $data);
            echo site_url('back/accueil_admin/normal');
               
        }else{
            redirect('login');
        }
    }



    // POUR MODIFIER LE TRAITEMENT
    public function modif_categories(){
        
        $level = $this->session->userdata('level');
        
        if($this->session->userdata('loggin') && $level == 'admin' && $this->input->post('ajax') == '1')
        {
            
            // VALIDATION DU CHAMPS DU FORMULAIRE (Libelle traitement)
            $this->form_validation->set_rules('libelle_cat_modif', 'Libelle traitement', 'trim|required|xss_clean|htmlspecialchars');

            // PERSONNALISATION DES MESSAGES D'ERREUR
            $this->form_validation->set_message('required', 'Le champs est obligatoire');
            $this->form_validation->set_message('htmlspecialchars', 'Caractères invalide');
            $this->form_validation->set_message('xss_clean', 'Caractères invalide');

            // TRAITEMENT DU FORMULAIRE
            if($this->form_validation->run()) {
                
                $libelle_cat = $this->input->post('libelle_cat_modif');  
                $sous_cat = $this->input->post('sous_cat_modif');
                $id_cat = $this->input->post('id_cat_modif');  
                $flag_cat = $this->input->post('flag_cat_modif');
                $id_cat_trait = $this->input->post('id_cat_trait');

               $data = array(
                        'libelle_categories' => $libelle_cat,
                        'parent_id' => $sous_cat,
                        'flag' => $flag_cat
                    );

               $data1 = array(
                        'info_traitement' => $libelle_cat   
                    );


                if($this->cats->editer_categories($id_cat, $data) && $this->traits->modifier_traitement($id_cat_trait, $data1)){
                    echo "success";                            
                }else{
                    echo "erreur";
                }

            }else{
                echo form_error('libelle_traits_modif' ,'<div class="alert alert-danger" align="center">' ,'</div>');
            }



        }else{
            redirect('login');
        }
    }

    public function modif_cat_traitement(){
        $level = $this->session->userdata('level');
        
        if($this->session->userdata('loggin') && $level == 'admin' && $this->input->post('ajax') == '1')
        {
            
            // VALIDATION DU CHAMPS DU FORMULAIRE (Libelle traitement)
            $this->form_validation->set_rules('libelle_cat_trait_modif', 'Libelle Catégorie', 'trim|required|xss_clean|htmlspecialchars');
            $this->form_validation->set_rules('cont_cat_trait_modif', 'Contenu Catégorie', 'trim|required|xss_clean|htmlspecialchars');

            // PERSONNALISATION DES MESSAGES D'ERREUR
            $this->form_validation->set_message('required', 'Le champs est obligatoire');
            $this->form_validation->set_message('htmlspecialchars', 'Caractères invalide');
            $this->form_validation->set_message('xss_clean', 'Caractères invalide');

            // TRAITEMENT DU FORMULAIRE
            if($this->form_validation->run()) {
                
                $libelle_cat_trait_modif = $this->input->post('libelle_cat_trait_modif');  
                $cont_cat_trait_modif = $this->input->post('cont_cat_trait_modif');
                $flag_cat_trait_modif = $this->input->post('flag_cat_trait_modif');
                $id_cat_modif = (int) $this->input->post('id_cat_modif');


               $data = array(
                        'libelle_categories' => $libelle_cat_trait_modif,
                        'contenu_categorie' => $cont_cat_trait_modif,
                        'flag' => $flag_cat_trait_modif
                    );

               $data1 = array(
                        'info_traitement' => $libelle_cat_trait_modif   
                    );


                if($this->cats->editer_categories($id_cat_modif, $data) && $this->traits->modifier_traitement($id_cat_modif, $data1)){
                    echo "success";                            
                }else{
                    echo "erreur";
                }
                
            }else{
                echo form_error('libelle_cat_trait_modif' ,'<div class="alert alert-danger" align="center">' ,'</div>')." ; ".form_error('cont_cat_trait_modif' ,'<div class="alert alert-danger" align="center">' ,'</div>');
            }



        }else{
            redirect('login');
        }

    }

}