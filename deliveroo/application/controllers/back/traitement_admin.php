<?php


class Traitement_admin extends CI_Controller
{


    
    public function __construct()
    {
        //  Obligatoire
        parent::__construct();

        $this->load->model('fte_traitement','traits');
        $this->load->model('fte_processus','procs');
        $this->load->model('fte_categories','cats');
        $this->load->model('fte_notification','not');

        $this->load->library('form_validation');

    }

    

    public function index()
    {

        $this->traitement_admin();

    }

    // INSERTION D'UN TRAITEMENT ET D'UN PREMIER PROCESSUS p1
    public function traitement_admin()
    {
        $level = $this->session->userdata('level');
        if($this->session->userdata('loggin') && $level == 'admin' && $this->input->post('ajax') == '1'){

            
            // VALIDATION DU CHAMPS DU FORMULAIRE (Libelle traitement)
            $this->form_validation->set_rules('libelle_traits', 'Libelle traitement', 'trim|required|xss_clean|htmlspecialchars');

            


            // PERSONNALISATION DES MESSAGES D'ERREUR
            $this->form_validation->set_message('required', 'Le champs est obligatoire');
            $this->form_validation->set_message('htmlspecialchars', 'Caractères invalide');
            $this->form_validation->set_message('xss_clean', 'Caractères invalide');

            // TRAITEMENT DU FORMULAIRE
            if($this->form_validation->run()) {
                

                // POUR NOUVEAU SOUS CATEGORIE
                if($this->input->post('ajout_trait') == '1'){

                    $libelle = $this->input->post('libelle_traits');  
                    $sous_cat_traits = (int) $this->input->post('sous_cat_traits');

                
                    
                    $data = array(
                        'info_traitement' => $libelle,
                        'source_info' => $sous_cat_traits,
                        'flag' => 1,
                        'flag_processus' => 0,
                        'flag_action' => 0
                    );



                    $id_traitement = (int) $this->traits->ajouter_traitement($data);

                    if($id_traitement){

                        $id_sous_cat = (int)  $sous_cat_traits;

                        $data2 = array(
                            'libelle_categories' => $libelle,
                            'niveau' => 3,
                            'parent_id' => $id_sous_cat,
                            'traitement_id' => $id_traitement
                        );

                        $id_nouveu_sous_cat = $this->cats->ajouter_sous_categories($data2);

                        $data1 = array(
                            'parent_id' => 0,
                            'campagne_id' => $id_traitement,
                            'image_id' => 0,
                            'commentaire_id' => 0,
                            'ordre' => 1,
                            'alias' => 'P1'
                        );

                        $id_processus = $this->procs->ajouter_processus($data1);
                            
                            if($id_nouveu_sous_cat && $id_processus){

                                $today = date('Y-m-d H:i:s');

                                $hierars = $this->cats->hierarchie((int)$id_processus);

                                $chemin = "";
                                foreach ($hierars as $hier) {
                                    $chemin = $chemin.''.$hier->libelle_categories.'§§§';
                                }

                                $libelle_sous_cat = $this->cats->liste_categories_by_id((int) $id_sous_cat);

                                $data_notification = array(
                                        'description'       => $chemin,
                                        'objet'             => "Ajout d'un traitement par ".ucfirst($this->session->userdata('prenom')).' (Mle : '.$this->session->userdata('mle').')',
                                        'matricule_modif'   => $this->session->userdata('mle'),
                                        'commentaires'      =>"<ul class='etape'>
                                            <li> <b> Libelle catégorie : </b>".$libelle_sous_cat[0]->libelle_categories."</li>
                                            <li> <b> Libelle traitement </b> : ".$libelle."</li>
                                            </ul>",
                                        'datetime_modif'    => $today
                                );

                                $this->not->ajouter_notification($data_notification);



                                echo "success";
                            }else{
                                echo "erreur";
                            }
                            
                    }else{
                        echo "erreur";
                    }
                    

                }

                // POUR NOUVEAU CATEGORIES
                if($this->input->post('ajout_trait') == '2'){


                    $libelle_trait = $this->input->post('libelle_traits');
                    $libelle_sous_cat = $this->input->post('libelle_sous_cat');
                    $cont_cat_trait = $this->input->post('cont_cat_trait');

                    
                    $data = array(
                        'info_traitement' => $libelle_trait,
                        'flag' => 1,
                        'flag_processus' => 0,
                        'flag_action' => 0
                    );

                    $id_traitement = (int) $this->traits->ajouter_traitement($data);

                    if($id_traitement){

                        $id_cat = (int) $this->session->userdata('id_categories');

                        $data3 = array(
                            'libelle_categories' => $libelle_sous_cat,
                            'niveau' => 2,
                            'parent_id' => $id_cat,
                            'contenu_categorie' => $cont_cat_trait
                        );

                        $id_sous_cat = (int) $this->cats->ajouter_sous_categories($data3);

                        $data2 = array(
                            'libelle_categories' => $libelle_trait,
                            'niveau' => 3,
                            'parent_id' => $id_sous_cat,
                            'traitement_id' => $id_traitement
                        );

                        $id_nouveu_sous_cat = $this->cats->ajouter_sous_categories($data2);

                        $data1 = array(
                            'parent_id' => 0,
                            'campagne_id' => $id_traitement,
                            'image_id' => 0,
                            'commentaire_id' => 0,
                            'ordre' => 1,
                            'alias' => 'P1'
                        );

                        $id_processus = $this->procs->ajouter_processus($data1);
                            
                            if($id_nouveu_sous_cat && $id_processus){


                                $today = date('Y-m-d H:i:s');

                                $hierars = $this->cats->hierarchie((int)$id_processus);

                                $chemin = "";
                                foreach ($hierars as $hier) {
                                    $chemin = $chemin.''.$hier->libelle_categories.'§§§';
                                }
                                
                                $data_notification = array(
                                        'description'       => $chemin,
                                        'objet'             => "Ajout d'un traitement et d'une nouveau catégorie par ".ucfirst($this->session->userdata('prenom')).' (Mle : '.$this->session->userdata('mle').')',
                                        'matricule_modif'   => $this->session->userdata('mle'),
                                        'commentaires'      => "<ul class='etape'>
                                                        <li> <b> Libelle traitement : </b>".$libelle_trait."</li>
                                                        <li> <b> Libelle catégorie : </b>".$libelle_sous_cat."</li>
                                                        <li><b> Contenu catégorie : </b> ".$cont_cat_trait."</li>
                                                    </ul>",
                                        'datetime_modif'    => $today
                                );

                                $this->not->ajouter_notification($data_notification);


                                echo "success";
                            }else{
                                echo "erreur";
                            }
                            
                    }else{
                        echo "erreur";
                    }
                    
                }
                

            }else{
                echo form_error('libelle_traits' ,'<div class="alert alert-danger" align="center">' ,'</div>');
            }

            
        }else{
            redirect('login');
        }

    }




    // POUR METTRE LE FLAG DU TRAITEMENT 0
    public function supprimer_traitement($id){

        $level = $this->session->userdata('level');

        
        if($this->session->userdata('loggin') && $level == 'admin'){
            
            $id_traitement = (int) $id;
            
            $data = array('flag' => 0);

            $this->traits->supprimer_traitement($id_traitement, $data);

            redirect('front/accueil');

        }else{
            redirect('login');
        }    
        
    }



    // POUR MODIFIER LE TRAITEMENT
    public function modifier_traitement(){
        $level = $this->session->userdata('level');
        if($this->session->userdata('loggin') && $level == 'admin' && $this->input->post('ajax') == '1'){
            
            // VALIDATION DU CHAMPS DU FORMULAIRE (Libelle traitement)
            $this->form_validation->set_rules('libelle_traits_modif', 'Libelle traitement', 'trim|required|xss_clean|htmlspecialchars');

            // PERSONNALISATION DES MESSAGES D'ERREUR
            $this->form_validation->set_message('required', 'Le champs est obligatoire');
            $this->form_validation->set_message('htmlspecialchars', 'Caractères invalide');
            $this->form_validation->set_message('xss_clean', 'Caractères invalide');

            // TRAITEMENT DU FORMULAIRE
            if($this->form_validation->run()) {
                
                $libelle = $this->input->post('libelle_traits_modif');  
                $source = $this->input->post('source_traits_modif');
                $id_traitement = $this->input->post('id_traitement_modif');  
                $flag = $this->input->post('flag_traits_modif');

               $data = array(
                        'info_traitement' => $libelle,
                        'source_info' => $source,
                        'flag' => $flag,
                        'flag_processus' => 0,
                        'flag_action' => 0
                    );


                if($this->traits->modifier_traitement($id_traitement, $data)){
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
    


}