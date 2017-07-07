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

    public function search_normal()
    {

        if($this->session->userdata('loggin')){

            if($this->input->post('ajax') == '1'){

                $search_text = $this->input->post('search_text');
                $id_traitement = (int) $this->input->post('id_traitement');

                $resultats = $this->cats->search($id_traitement, $search_text);
				
				// var_dump($resultats);

                if($resultats){
                    $this->session->unset_userdata('result_search');
                    $this->session->set_userdata('result_search', $resultats);
                }else{
                    echo 'erreur';
                }

            }else{

                echo 'erreur';
            }

        }else{
            redirect('login');
        }
    }

    public function normal()
    {

        if($this->session->userdata('loggin')){
        
            //** CODE **
            $level = $this->session->userdata('level');

            // if(!empty($this->resultsearch)){
            
            if($this->input->post('search_text') && $this->input->post('id_traitement')){     
                $search_text = $this->input->post('search_text');
                $id_traitement = (int) $this->input->post('id_traitement');


                $this->session->unset_userdata('id_search');
                $this->session->unset_userdata('text_search');

                $this->session->set_userdata('id_search', $id_traitement);
                $this->session->set_userdata('text_search', $search_text);
            }
                // if($this->session->userdata('id_search') && $this->session->userdata('text_search')){

                //     $this->session->unset_userdata('id_search');
                //     $this->session->unset_userdata('text_search');

                //     $this->session->set_userdata('id_search', $id_traitement);
                //     $this->session->set_userdata('text_search', $id_traitement);

                // }else{

                // }

            // var_dump($this->session->userdata('id_search')."==============".$this->session->userdata('text_search'));

                    $process = $this->cats->search($this->session->userdata('id_search'), $this->session->userdata('text_search'));
                    
                     //var_dump($process);

                    if(!empty($process)){

                        foreach ($process as $val_pro) {
                            $id_parent = $val_pro->parent_id;
                            $id_traitement = $val_pro->traitement_id;

                            $temp = $this->cats->liste_categories_by_id($id_parent);

                            $traits[$id_parent] = $temp; 

                            $temp2 = $this->procs->liste_processus_first($id_traitement);
                            $first_proc[$id_traitement] = $temp2;

                        }

                        $var_js_pont = "var pont = "."\"".site_url("front/pont")."\";";

                        //** PARAMETRE VUE **
                        $data['titre'] = 'ACCUEIL PROCCESSUS';
                        $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global','admin/module.admin.page.pricing_tables.min','admin/style_jstree');
                        if(!empty($process)){
                            $data['process'] = $process;
                            $data['nb_process'] = count($process);
                        }
                        if(!empty($traits)){
                            $data['traitement'] = $traits;
                        }
                        if(!empty($first_proc)){
                            $data['first_proc'] = $first_proc;
                        }
                        $data['level'] = $level;
                        $data['js'] = array('js/back.js', 'js/debut.js');
                        $data['js_info'] = array($var_js_pont);
                        //** END PARAMETRE VUE **
                    
                        //** APPEL VUE **
                        $this->load->view('includes/header.php', $data);
                        $this->load->view('includes/menu_vertical.php', $data);
                        //$this->load->view('includes/menu_horizental.php');
                        $this->load->view('front/accueil_search_view.php', $data);
                        $this->load->view('includes/footer.php');
                        $this->load->view('includes/js.php');
                        //** END APPEL VUE **        

                    }else{

                        echo "erreur";

                    }

                    

                //** END CODE **
                //var_dump($traits);

                // foreach ($traits as $val_trait) {
                //   foreach ($val_trait as $val) {
                //         echo $val->libelle_categories;
                //         foreach ($process as $val_pro) {
                //             if($val->fte_categories_id == $val_pro->parent_id){
                //                 echo $val_pro->libelle_categories;
                //                 $deb = $first_proc[$val_pro->traitement_id];

                //                 foreach ($deb as $val_deb) {
                //                     echo $val_deb->fte_process_id;
                //                 }

                //             }
                //         }
                //     }  
                // }

                


            // }else{
            //  redirect('front/accueil_traitement/normal');
            // }

        }else{
            redirect('login');
        }
    }

}